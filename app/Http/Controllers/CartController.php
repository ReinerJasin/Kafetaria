<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{
    // public function index(){
    //     $cart = Cart::all();
    //     return view ('cart', ['cartList' => $cart]);
    // }

    public function history()
    {
        $history = Cart::whereNotNull('PaymentDate')
            ->where('CustomerID', 1)// where user='reiner'
            ->orderBy('PaymentDate','desc')->get();
        return view('history', ['historyList' => $history]);
    }

    public function cart()
    {
        $cart = Cart::whereNull('PaymentDate')
        ->where('CustomerID', 1)// where user='reiner'
        ->orderBy('PaymentDate','desc')->get();
        return view('cart', ['cartList' => $cart]);
    }
    public function store($customerID, $menuID)
    {
        $cart = new Cart;
        $cart->CustomerID = $customerID;
        $cart->MenuID = $menuID;
        $cart->PaymentID = null;
        $cart->PaymentDate = null;
        $cart->Quantity = 1;
        $cart->Status = 1;
        // $cart->created_at = Carbon::now();
        // $cart->updated_at = Carbon::now();
        $cart->save();

        // return;
        return Redirect::action([MenuController::class, 'index']);
    }
}
