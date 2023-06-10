<?php

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


Route::get('/', function () {
    return view('menu', [
        // 'cart' => [
        //     [
        //         'CartID' => 1,
        //         'UserID' => 1,
        //         'MenuID' => 1,
        //         'Quantity' => 3,
        //         'PaymentStatus' => false,
        //         'PaymentID' => null,
        //     ],
        //     [
        //         'CartID' => 2,
        //         'UserID' => 1,
        //         'MenuID' => 2,
        //         'Quantity' => 3,
        //         'PaymentStatus' => true,
        //         'PaymentID' => 1,
        //     ],
        //     [
        //         'CartID' => 3,
        //         'UserID' => 1,
        //         'MenuID' => 4,
        //         'Quantity' => 2,
        //         'PaymentStatus' => true,
        //         'PaymentID' => 1,
        //     ]
        // ]
        
        'menuList' => [
            [
                'MenuID' => 1,
                'CafeID' => 1,
                'MenuName' => 'Nasi Goreng',
                'Price' => 30000,
            ],
            [
                'MenuID' => 2,
                'CafeID' => 1,
                'MenuName' => 'Ayam Bakar',
                'Price' => 35000,
            ],
            [
                'MenuID' => 2,
                'CafeID' => 1,
                'MenuName' => 'Ayam Bakar',
                'Price' => 35000,
            ],
            [
                'MenuID' => 2,
                'CafeID' => 1,
                'MenuName' => 'Ayam Bakar',
                'Price' => 35000,
            ],
            [
                'MenuID' => 3,
                'CafeID' => 2,
                'MenuName' => 'Es Teh Manis',
                'Price' => 10000,
            ]
        ]
    ]);
});
