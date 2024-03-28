<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrafterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
//    Route::get('/user', [UserController::class,'me']);
    Route::get('/users', [UserController::class,'index']);
    Route::get('/user/{id}', [UserController::class,'show']);

    Route::patch('/product/{product}',[ProductController::class,'update']);
    Route::delete('/product/{id}',[ProductController::class,'destroy']);
    Route::post('/product',[ProductController::class,'store']);

    Route::post('/category',[CategoryController::class,'store']);
    Route::patch('/category/{id}',[CategoryController::class,'update']);
    Route::delete('/category/{id}',[CategoryController::class,'destroy']);

    Route::get('orders',[OrderController::class,'index']);
    Route::get('/order/{id}', [OrderController::class,'show']);
    Route::post('/order',[OrderController::class,'store']);
    Route::patch('/order/{id}',[OrderController::class,'update']);
    Route::delete('/order/{id}',[OrderController::class,'destroy']);

    Route::post('/crafter', [CrafterController::class,'store']);
    Route::patch('/crafter/{crafter}',[CrafterController::class,'update']);
    Route::delete('/crafter/{crafter}', [CrafterController::class, 'destroy']);
});


//route define by apiResource
//Route::apiResource('products', ProductController::class);


Route::post('/register',[RegisteredUserController::class,'store']);
Route::get('/products', [ProductController::class,'index']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::get('/crafters', [CrafterController::class,'index']);
Route::get('/crafter/{crafter}', [CrafterController::class,'show']);
Route::get('/products/category/{id}',[ProductController::class,'productsByCategory']);
Route::get('categories',[CategoryController::class,'index']);
Route::get('/category/{id}', [CategoryController::class,'show']);







// Route::get('/post', [PostController::class,'show']);
// Route::get('/post/{id}', [PostController::class,'showId']);
// Route::get('/posts', [PostController::class,'index']);
