<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View as ViewPDF;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\OrderDownload;


class OrderController extends Controller
{
    public function download(string $id, string $format): Response
    {
        $order = Order::findOrFail($id);

        $viewData = ['order' => $order];

        $orderDownloadInterface = app(OrderDownload::class, ['format' => $format]);
        return $orderDownloadInterface->download($viewData, $id);

    }

    public function orders(): ViewPDF
    {
        $breadcrumbs = [
            ['name' => trans('app.breadcrumbs.home'), 'url' => route('home.index')],
            ['name' => trans('app.breadcrumbs.orders'), 'url' => route('myaccount.orders')],
        ];
        $viewData = [];
        $viewData['title'] = trans('app.titles.order');
        $ordersPerPage = 2;
        $viewData['orders'] = Order::where('user_id', Auth::getUser()->getId())->paginate($ordersPerPage);
        $viewData['breadcrumbs'] = $breadcrumbs;

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
