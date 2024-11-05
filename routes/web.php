<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeOrDislikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionConroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;

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
Route::get('/batafsil/{id}', [PostController::class, 'batafsil'])->name('batafsil');
Route::get('/showpost/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/comments/{id}',[CommentController::class,'comment'])->name('post.comments');
Route::get('/like/{id}',[LikeOrDislikeController::class,'like'])->name('post.like');

Route::get('/question',[QuestionConroller::class,'question']);
Route::post('/createquestion',[QuestionConroller::class,'create']);
Route::post('/updatequestion{id}',[QuestionConroller::class,'update'])->name('updatequestion');
Route::get('deletequestion{id}',[QuestionConroller::class,'delete'])->name('deletequestion');
Route::post('createvariant{id}',[QuestionConroller::class,'createvariant'])->name('createvariant');