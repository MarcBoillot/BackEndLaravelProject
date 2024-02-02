<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class,'index']);
Route::get('/products', [ProductController::class,'index']);
Route::get('/user/{id}', [UserController::class,'show']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::post('/product',[ProductController::class,'store']);
Route::patch('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'destroy']);
// Route::get('/post', [PostController::class,'show']);
// Route::get('/post/{id}', [PostController::class,'showId']);
// Route::get('/posts', [PostController::class,'index']);
