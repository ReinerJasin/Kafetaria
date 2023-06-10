<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);

Route::get('/cart', [CartController::class, 'cart']);
Route::get('/cart-add/{CustomerID}/{MenuID}', [CartController::class, 'store']);
Route::put('/cart-update/{CustomerID}', [CartController::class, 'update']);
Route::get('/cart-delete/{OrderID}', [CartController::class, 'delete']);

Route::get('/history', [CartController::class, 'history']);

Route::get('/payment', [CartController::class, 'payment']);