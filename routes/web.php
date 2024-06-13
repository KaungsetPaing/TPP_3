<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// '/' => home

//Route::get('/', function () {
//    return view('welcome');
//});

// -----------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/startup', function () {
    return 'Hello startup';
});

//Route::get('/category', function () {
//    return view('categories.index'); // ----------
//});

Route::get('category', [CategoryController::class,'index'])->name('categoryIndex');
//Route::get('result', [CategoryController::class,'result']);

Route::get('category/create', [CategoryController::class,'create'])->name('categoryCreate');
Route::post('category/store', [CategoryController::class,'store'])->name('categoryStore');
Route::get('category/{id}', [CategoryController::class,'edit'])->name('categoryEdit');
Route::post('category/update{id}', [CategoryController::class,'update'])->name('categoryUpdate');
Route::delete('category/delete', [CategoryController::class,'delete'])->name('categoryDelete');

Route::get('product', [ProductController::class,'index'])->name('productIndex');
Route::get('product/create', [ProductController::class,'create'])->name('productCreate');
Route::post('product/store', [ProductController::class,'store'])->name('productStore');
Route::get('product/{id}', [ProductController::class,'edit'])->name('productEdit');
Route::post('product/update{id}', [ProductController::class,'update'])->name('productUpdate');


// -----------------------------------------

