<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $travelsInCart = [];

        $travelsInSession = $request->session()->get('travels');
        if($travelsInSession){
            $travelsInCart = Travel::findMany(array_keys($travelsInSession));
            $total = Travel::sumPricesByQuantities($travelsInCart, $travelsInSession);
        }

        $viewData = [];
        $viewData['total'] = $total;
        $viewData['travels'] = $travelsInCart;
        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id): RedirectResponse
    {
        $travels = $request->session()->get('travels');
        $travels[$id] = $request->input('quantity');
        $request->session()->put('travels', $travels);
        return redirect()->route('travel.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->session()->forget('travels');
        return back();
    }

}