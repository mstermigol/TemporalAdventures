<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;
 
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders(): View
    {
        $viewData = [];
        $viewData["orders"] = Order::where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}