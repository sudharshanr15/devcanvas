<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use App\Models\Connection;
use App\Models\Projects;
use App\Models\User;
use App\Models\UserDatabases;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user, Projects $project, UserDatabases $database)
    {
        // echo "<pre>";
        // var_dump($request->all());
        // echo "</pre>";
        // exit();
        $validated = $request->validate([
            "name" => ["required", "max:50", "unique:user_databases,database", 'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/'],
            "columns" => ["required", "array", "min:1"],
            "columns.*.name" => ["required", "max:50", "unique:user_databases,database", 'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/'],
            "columns.*.type" => ["required", "in:string,integer,text,boolean,float,date,datetime"],
            "columns.*.nullable" => ["nullable", "in:true,false"],
            "columns.*.default" => ["nullable"],
            "columns.*.unique" => ["nullable", "in:true,false"],
            "columns.*.primary_key" => ["nullable", "in:true,false"],
            'columns.*.auto_increment' => [
                'nullable', "in:true,false",
                function ($attribute, $value, $fail) use ($request) {
                    if ($value && (!isset($request->columns[array_key_first($request->columns)]['primary_key']) ||
                        !$request->columns[array_key_first($request->columns)]['primary_key'])) {
                        $fail('Auto increment is only allowed on primary keys.');
                    }
                },
            ],
            // 'columns.*.foreign_key.references' => ['nullable', 'string', 'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/', 'max:64'],
            // 'columns.*.foreign_key.on' => ['nullable', 'string', 'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/', 'max:64'],
            // 'columns.*.foreign_key.on_delete' => ['nullable', 'in:cascade,set null'],
        ]);

        $attributes = [
            "name" => request("name"),
            "schema" => json_encode($validated),
            "user_databases_id" => $database->id
        ];

        $isCreated = self::createTableFromJson($attributes['schema'], $database);
        if($isCreated['status'] == true){
            Collections::create($attributes);
        }else{
            throw ValidationException::withMessages([
                "database" => $isCreated['message']
            ]);
        }

        return redirect(route("databases.database", ["user" => $user, "project" => $project, "database" => $database]));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Projects $project, UserDatabases $database)
    {
        $collections = Collections::all()->where("user_databases_id", $database->id);

        return view("project.databases.collection.dashboard", [
            "user" => $user,
            "project" => $project,
            "collections" => $collections
        ]);
    }

    public function createTableFromJson($json, UserDatabases $database){
        $data = json_decode($json, true);
        $tableName = $data['name'];
        $columns = $data['columns'];

        $connection = Connection::getDynamicConnection($database);

        if (Schema::connection($database->database)->hasTable($tableName)) {
            return [
                'status' => false,
                'message' => "Table '{$tableName}' already exists."
            ];
        }

        try{
            Schema::connection($database->database)->create($tableName, function (Blueprint $table) use ($columns) {
                foreach ($columns as $column) {
                    // Define column type
                    $columnType = $column['type'];
                    $columnName = $column['name'];

                    // Initialize the column
                    $col = match ($columnType) {
                        'string' => $table->string($columnName),
                        'integer' => $table->integer($columnName),
                        'text' => $table->text($columnName),
                        'boolean' => $table->boolean($columnName),
                        'float' => $table->float($columnName),
                        'date' => $table->date($columnName),
                        'datetime' => $table->dateTime($columnName),
                        default => null,
                    };

                    // Apply additional properties
                    if (isset($column['nullable']) && $column['nullable']) {
                        $col->nullable();
                    }

                    if (isset($column['default'])) {
                        $col->default($column['default']);
                    }

                    if (isset($column['unique']) && $column['unique']) {
                        $table->unique($columnName);
                    }

                    if (isset($column['primary_key']) && $column['primary_key']) {
                        $table->primary($columnName);
                    }

                    if (isset($column['auto_increment']) && $column['auto_increment']) {
                        $col->autoIncrement();
                    }
                }
            });
        }catch(Exception $e){
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }

        return [
            'status' => true,
            'message' => "Table '{$tableName}' created successfully."
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
