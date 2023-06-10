<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('login', ['customerList' => $customer]);
    }

}
