<?php

use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDatabasesController;

Route::get('/', function () {
    return view('dashboard');
})->middleware("auth");

Route::middleware("auth")->prefix("/dashboard/{user}")->group(function(){
    Route::get("/", [UserController::class, "show"])->name("user.dashboard");
    Route::post("/", [UserController::class, "store"]);


    Route::prefix("/{project}")->group(function(){
        Route::get("/", [ProjectsController::class, "show"])->name("project.dashboard");

        Route::get("/databases", [UserDatabasesController::class, "show"])->name("project.databases");
        Route::post("/databases", [UserDatabasesController::class, "store"]);

        Route::get("/databases/{database}", [CollectionsController::class, "show"])->name("databases.database");
        Route::post("/databases/{database}", [CollectionsController::class, "store"]);
    });
    // Route::get("/{project}/api_request", function(string $user, string $project){
    //     return [$user, $project, "api_request"];
    // });
    // Route::get("/{project}/file_storage", function(string $user, string $project){
    //     return [$user, $project, "file_storage"];
    // });
    // Route::get("/{project}/auth", function(string $user, string $project){
    //     return [$user, $project, "auth"];
    // });
});

Route::get("/register", [RegisteredUserController::class, "create"])->name('register');
Route::post("/register", [RegisteredUserController::class, "store"]);

Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);

Route::post("/logout", [SessionController::class, "destroy"])->name("logout");