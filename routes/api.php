<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{
    RegisterController,
    LoginController
};
use App\Http\Controllers\Api\{
    PermissionController,
    PermissionUserController,
    RecursoController,
    UserController,

};

Route::middleware("auth:sanctum")->group(function(){

    Route::apiResource("user",UserController::class);
    Route::apiResource("recurso",RecursoController::class);
    Route::apiResource("permissao",PermissionController::class);
    Route::post("/logout",[LoginController::class,"Logout"]);
    Route::post("/perfil",[LoginController::class,"Perfil"]);
    Route::post("/UserPermission",[PermissionUserController::class,"UserPermission"]);
    Route::get("/UserPermission/{id}",[PermissionUserController::class,"UserPermission"]);
    Route::post("/addPermissionUser",[PermissionUserController::class,"addPermissionUser"]);

    Route::get("/verificarPermissao/{id}",[PermissionUserController::class,"verificarPermissao"]);


});

Route::post("/register",[RegisterController::class,"store"]);
Route::post("/login",[LoginController::class,"store"]);



