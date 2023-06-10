<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // public function index(){
    //     $cart = Cart::all();
    //     return view ('cart', ['cartList' => $cart]);
    // }

    public function history()
    {
        $history = Cart::whereNotNull('PaymentDate')
            ->where('CustomerID', 1)->get();
        return view('history', ['historyList' => $history]);
    }

    public function cart()
    {
        $cart = Cart::whereNull('PaymentDate')->get();
        return view('cart', ['cartList' => $cart]);
    }
}
