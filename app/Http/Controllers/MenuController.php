<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('user')) {
            $customerID = $request->input('user');
        } else {
            return Redirect::action([LoginController::class, 'index']);
        }
        // dd($customerID);
        
        $menu = Menu::all();
        // dd($menu);
        
        return view('menu', ['menuList' => $menu, 'customerID' => $customerID]);
    }
}
