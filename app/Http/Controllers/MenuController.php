<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            $customerID = $request->input('user');
        } catch (\Exception $e) {
            // $customerID = $sentCustomerID;
        }
        // dd($customerID);
        $menu = Menu::all();
        // dd($menu);
        return view('menu', ['menuList' => $menu, 'customerID' => $customerID]);
    }
}
