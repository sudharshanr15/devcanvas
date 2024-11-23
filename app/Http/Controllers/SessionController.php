<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view("auth.login");
    }

    public function store(){
        echo "<pre>";
        var_dump(request()->all());
        echo "</pre>";
        exit();
    }
}
