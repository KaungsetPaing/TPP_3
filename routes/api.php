<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CategoryController;

use App\Http\Controllers\Api\ProudctController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [LoginController::class, 'login']);

Route::get('categorylist',[CategoryController::class,'index']);
Route::post('categoryStore',[CategoryController::class,'store']);
Route::get('categoryShow/{id}',[CategoryController::class,'show']);
Route::post('categoryUpdate/{id}',[CategoryController::class,'update']);
Route::delete('categoryDelete/{id}',[CategoryController::class,'delete']);

Route::apiResource('/products',ProudctController::class);