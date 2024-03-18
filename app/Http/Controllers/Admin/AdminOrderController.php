<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.orders');
        $viewData['orders'] = Order::with('user')->get();

        return view('admin.order.index')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            Order::destroy($id);

            return redirect()->route('admin.order.index');
        } catch (Exception $e) {
            return redirect()->route('admin.order.index');
        }
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $order = Order::findOrFail($id);
            $viewData = [];
            $viewData['title'] = trans('admin.order.order')."#{$order->getId()} - Temporal Adventures";
            $viewData['order'] = $order;

            return view('admin.order.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.order.index');
        }
    }
}
