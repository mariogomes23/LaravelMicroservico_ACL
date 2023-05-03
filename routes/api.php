<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\{
    UserController,

};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;

Route::middleware("auth:sanctum")->group(function(){

    Route::apiResource("user",UserController::class);
    Route::post("/logout",[LoginController::class,"Logout"]);
    Route::post("/perfil",[LoginController::class,"Perfil"]);


});

Route::post("/register",[RegisterController::class,"store"]);
Route::post("/login",[LoginController::class,"store"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


