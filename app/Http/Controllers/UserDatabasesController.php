<?php

namespace App\Http\Controllers;

use App\Enums\DBDrivers;
use App\Models\Projects;
use App\Models\User;
use App\Models\UserDatabases;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            "name" => ["required", "max:20", "unique:user_databases,name"],
            "driver" => [Rule::enum(DBDrivers::class)]
        ]);

        UserDatabases::create([
            "name" => request("name"),
            "driver" => request("driver"),
            "projects_id" => $project->id
        ]);

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
