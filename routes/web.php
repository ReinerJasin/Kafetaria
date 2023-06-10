<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('menu');
// });


Route::get('/menu', [MenuController::class, 'index']);
Route::get('/cart-add/{CustomerID}/{MenuID}', [CartController::class, 'store']);
Route::get('/history', [CartController::class, 'history']);
Route::get('/cart', [CartController::class, 'cart']);