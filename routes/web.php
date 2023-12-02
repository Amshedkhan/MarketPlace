<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthController;
use App\Http\controllers\ProductController;
use App\Http\controllers\BuyerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class,'index'])->name('login.index');
Route::post('/login', [AuthController::class,'login'])->name('login.post');
Route::get('/register', [AuthController::class,'showRegister'])->name('user.register');
Route::post('/register', [AuthController::class,'store'])->name('register.store');


Route::middleware(['auth','can:isSeller'])->group(function () {
  Route::resource('/product',ProductController::class);
});
Route::middleware(['auth','can:isBuyer'])->group(function () {
   Route::get('/buy-product',[BuyerController::class,'showAllProducts'])->name('buyer.product');
   Route::post('/order/{product_id}',[BuyerController::class,'orderStore'])->name('order.store');
   Route::get('/orders',[BuyerController::class,'myOrders'])->name('order.all');
});
Route::middleware(['auth','can:is-Both'])->group(function () {
    Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');
});
