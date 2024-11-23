<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function show(User $user, Projects $project){
        return view("project.dashboard", [
            "user" => $user,
            "project" => $project
        ]);
    }
}
