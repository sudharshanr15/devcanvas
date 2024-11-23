<?php

namespace App\Http\Controllers;

use App\Enums\DBDrivers;
use App\Models\Connection;
use App\Models\Projects;
use App\Models\User;
use App\Models\UserDatabases;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserDatabasesController extends Controller
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
    public function store(Request $request, User $user, Projects $project)
    {
        $request->validate([
            "driver" => [Rule::enum(DBDrivers::class)],
            "database" => ["required", "max:50", "unique:user_databases,database", 'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/'],
            "host" => ["required"],
            "port" => ["required"],
            // "username" => ['required'],
            // "password" => ["required"],
        ]);

        $attributes = [
            "database" => request("database"),
            "driver" => request("driver"),
            "host" => request("host"),
            "port" => request("port"),
            "projects_id" => $project->id,

            # TODO: try to make username and password dynamic fields

            "username" => "root",
            "password" => "first",
        ];

        $database_info = new UserDatabases([...$attributes, "database" => ""]);

        $db = Connection::getDynamicConnection($database_info);

        try{
            $db->getPdo();
            $db->statement("CREATE DATABASE " . request("database"));
            UserDatabases::create($attributes);
        }catch(Exception $e){
            $db->statement("DROP DATABASE " . request("database"));

            throw ValidationException::withMessages([
                "database" => $e->getMessage()
            ]);
        }

        return redirect(route("project.databases", ["user" => $user, "project" => $project]));
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDatabases $userDatabases, User $user, Projects $project)
    {
        return view("project.databases.dashboard", [
            "userDatabases" => $userDatabases->all(),
            "user" => $user,
            "project" => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDatabases $userDatabases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDatabases $userDatabases)
    {
        //
    }
}
