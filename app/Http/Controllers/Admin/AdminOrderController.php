<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $collection = collect(Order::with('user')->get());
        $itemsPerPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedOrders = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedOrders = new LengthAwarePaginator(
            $pagedOrders,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('admin.order.index')]
        );

        $viewData = [];
        $viewData['title'] = trans('admin.titles.orders');
        $viewData['delete'] = trans('admin.community.are_you_sure');
        $viewData['orders'] = $paginatedOrders;

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
