<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($user){
        $projects = Projects::where("user_id", Auth::user()->id)->get();

        return view("projects.dashboard", ["user" => $user, "projects" => $projects]);
    }

    public function store($user){
        request()->validate([
            "name" => ["required", "unique:projects,name"]
        ]);

        Projects::create([
            'name' => request("name"),
            "user_id" => Auth::user()->id
        ]);

        return redirect(route("user.dashboard", ['user' => $user]));
    }
}
