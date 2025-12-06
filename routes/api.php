<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post("/register", [AuthController::class,'register']);
Route::post("/login", [AuthController::class,'login']);


// Route::apiResource('/users',UserController::class);

Route::middleware("auth:sanctum")->group(function(){

    Route::post("/logout",[AuthController::class,'logout']);

    Route::get("/users", [UserController::class,'index']);
    Route::post('/users', [UserController::class,'store']);
    Route::get("/users/{id}", [UserController::class,'show']);
    Route::put("/users/{id}", [UserController::class,'update']);
    Route::delete("/users/{id}", [UserController::class,'destroy']);

});