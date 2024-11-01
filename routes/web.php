<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CategoryController::class,'index']);
Route::get('/category',[CategoryController::class,'category'])->middleware('auth');
Route::post('/createcategory',[CategoryController::class,'create']);
Route::get('/isactive/{id}',[CategoryController::class,'isactive']);
Route::get('/inactive/{id}',[CategoryController::class,'inactive']);
Route::get('/deletecategory/{id}',[CategoryController::class,'delete']);
Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');


Route::get('/login',[LoginController::class,'loginpage']);
Route::get('/register',[LoginController::class,'registerpage']);
Route::post('/register',[LoginController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/admin',[PostController::class,'admin'])->middleware('auth');
Route::post('/createpost',[PostController::class,'create']);
Route::post('updatepost{id}',[PostController::class,'update'])->name('updatepost');
Route::get('/deletepost/{id}',[PostController::class,'delete']);