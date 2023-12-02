<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\Api\ProductController;
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
Route::get('/products',[ProductController::class,'allProducts']);
Route::get('/product/{id}',[ProductController::class,'product']);
Route::get('/orders/{product_id}',[ProductController::class,'orders']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
