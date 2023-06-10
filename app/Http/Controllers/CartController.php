<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{

    public function history(Request $request)
    {
        // dd($request);
        $history = Cart::whereNotNull('PaymentDate')
            ->where('CustomerID', $request->user) // where user='reiner'
            ->orderBy('PaymentDate', 'desc')->get();
        return view('history', ['historyList' => $history, 'customerID' => $request->user]);
    }

    public function cart(Request $request)
    {
        $cart = Cart::whereNull('PaymentDate')
            ->where('CustomerID', $request->user) // where user='reiner'
            ->orderBy('PaymentDate', 'desc')->get();
        return view('cart', ['cartList' => $cart, 'customerID' => $request->user]);
    }
    public function store($customerID, $menuID)
    {
        // dd($customerID);
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

        return Redirect::action([MenuController::class, 'index'], ['user' => $customerID]);
    }

    public function delete($orderID, Request $request)
    {
        $customerID = $request->input('user');
        $cart = Cart::findOrFail($orderID);
        $cart->delete();

        return Redirect::action([CartController::class, 'cart'], ['user' => $customerID]);
    }

    public function payment(Request $request)
    {
        $cart = Cart::whereNull('PaymentDate')
            ->where('CustomerID', $request->user)
            ->orderBy('PaymentDate', 'desc')->get();

        $combinedCart = $cart->groupBy('MenuID')->map(function ($items) {
            $firstItem = $items->first();
            $firstItem->Quantity = $items->sum('Quantity');
            return $firstItem;
        });

        $totalBelanjaan = 0;

        foreach ($combinedCart as $item) {
            $totalBelanjaan += ($item->Quantity) * $item->menuRelation['Price'];
        }

        return view('payment', ['cartList' => $combinedCart, 'customerID' => $request->user, 'totalBelanjaan' => $totalBelanjaan]);
    }
}
