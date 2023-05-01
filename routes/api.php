<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
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



Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('product',[ProductsController::class,'index'])->middleware('auth:sanctum');
Route::post('product/search',[ProductsController::class,'search'])->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum','admin']], function(){
    Route::resource('products',ProductsController::class);

});

Route::group(['middleware' => 'auth:sanctum'],function (){
Route::get('cart', [CartController::class,'index']);
Route::post('cart/add', [CartController::class,'store']);
Route::post('checkout', [OrderController::class,'checkout']);
});