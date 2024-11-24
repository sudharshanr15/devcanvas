<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CollectionsResource;
use App\Models\Collections;
use App\Models\Connection;
use App\Models\Projects;
use App\Models\UserDatabases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Projects $project, UserDatabases $database, Collections $collection)
    {
        Connection::getDynamicConnection($database);
        $response = DB::connection($database->database)->table($collection->name)->get();

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $project, UserDatabases $database, Collections $collection, string $id)
    {
        $primaryKey = $this->getPrimaryKey($database, $collection);
        $response = DB::connection($database->database)->table($collection->name)->where($primaryKey, $id)->get();
        // return CollectionsResource::collection($response->toArray());
        return new CollectionsResource($response);
    }

    public function getPrimaryKey(UserDatabases $database, Collections $collection){
        Connection::getDynamicConnection($database);
        $primaryKey = DB::connection($database->database)->table('information_schema.COLUMNS')
            ->where('TABLE_SCHEMA', $database->database)
            ->where('TABLE_NAME', $collection->name)
            ->where('COLUMN_KEY', 'PRI')
            ->value('COLUMN_NAME');

        return $primaryKey;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collections $collections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collections $collections)
    {
        //
    }
}
