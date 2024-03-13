<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Item;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $travelsInCart = [];

        $travelsInSession = $request->session()->get('travels');
        if ($travelsInSession) {
            $travelsInCart = Travel::findMany(array_keys($travelsInSession));
            $total = Travel::sumPricesByQuantities($travelsInCart, $travelsInSession);
        }

        $viewData = [];
        $viewData['total'] = $total;
        $viewData['travels'] = $travelsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, string $id): RedirectResponse
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

    public function purchase(Request $request): View | RedirectResponse
    {
        $travelsInSession = $request->session()->get('travels');
        if($travelsInSession){
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $travelsInCart = Travel::findMany(array_keys($travelsInSession));
            foreach($travelsInCart as $travel){
                $quantity = $travelsInSession[$travel->getId()];
                $item = new Item();
                $item->setName($travel->getTitle());
                $item->setQuantity($quantity);
                $item->setPrice($travel->getPrice());
                $item->setTravelId($travel->getId());
                $item->setOrderId($order->getId());
                $item->setSubTotal(0);
                $item->save();
                $total = $total + ($travel->getPrice()*$quantity);
            }

            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('travels');

            $viewData = [];
            $viewData['order'] = $order;
            return view('cart.purchase')->with('viewData', $viewData);
        } else{
            return redirect()->route('cart.index');
        }
    }
}
