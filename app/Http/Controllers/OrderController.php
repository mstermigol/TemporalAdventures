<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Contracts\View\View as ViewPDF;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function downloadPDF(string $id): Response
    {
        $order = Order::findOrFail($id);

        $viewData = ['order' => $order];

        $pdfContent = $this->generatePDF('myaccount.download', $viewData);

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="order_'.$order->getId().'.pdf"');
    }

    private function generatePDF(string $view, array $data): string
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = View::make($view, $data)->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->output();
    }

    public function orders(): ViewPDF
    {
        $viewData = [];
        $viewData['orders'] = Order::where('user_id', Auth::getUser()->getId())->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
