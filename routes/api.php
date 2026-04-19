<?php

use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/customer', function (Request $request) {
    return $request->customer();
})->middleware('auth:sanctum');

Route::apiResource("users",UserController::class) ;
Route::apiResource("customer",CustomerController::class) ;
// Route::get('/users', [UserController::class, 'index']);    // Afficher tous les utilisateurs
// Route::post('/users', [UserController::class, 'store']);   // Créer un utilisateur
// Route::get('/users/{user}', [UserController::class, 'show']);  // Afficher un utilisateur spécifique
// Route::put('/users/{user}', [UserController::class, 'update']);  // Mettre à jour un utilisateur spécifique
// Route::delete('/users/{user}', [UserController::class, 'destroy']);  // Supprimer un utilisateur spécifique
