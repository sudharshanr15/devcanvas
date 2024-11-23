<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
})->middleware("auth");

Route::middleware("auth")->prefix("/dashboard/{user}")->group(function(){
    Route::get("/", [UserController::class, "show"])->name("user.dashboard");
    Route::post("/", [UserController::class, "store"]);

    Route::get("/{project}", [ProjectsController::class, "show"])->name("project.dashboard");

    Route::get("/{project}/databases", function(string $user, string $project){
        return [$user, $project, "databases"];
    });

    Route::get("/{project}/databases/{collection}", function(string $user, string $project, string $collection){
        return [$user, $project, 'databases', "collections"];
    });
});

Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);

Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);

Route::post("/logout", [SessionController::class, "destroy"]);