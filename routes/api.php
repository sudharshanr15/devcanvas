<?php

use App\Http\Controllers\Api\V1\CollectionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::prefix("/api")->group(function(){
//     Route::get("/{project}/databases/{database}/collections/{collection}/documents", [ApiCollectionsController::class, "show"]);
// });

Route::group(["prefix" => "v1", "namespace" => "App\Http\Controllers\Api\V1"], function(){
    Route::apiResource('projects/{project}/databases/{database}/collections/{collection}/documents', CollectionsController::class);
});