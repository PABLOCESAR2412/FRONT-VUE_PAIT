<?php

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

Route::get('products',[App\Http\Controllers\ProductController::class, 'products']);

Route::get('get_product/{id}',[App\Http\Controllers\ProductController::class, 'getProduct']);

Route::post('save_product',[App\Http\Controllers\ProductController::class, 'saveProduct']);

Route::delete('delete_product/{id}',[App\Http\Controllers\ProductController::class, 'deleteProduct']);