<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Order;
use Illuminate\Support\Facades\View;


class OrderController extends Controller
{
    public function downloadPDF($id)
    {
        // Fetch order data based on $orderId
        $order = Order::findOrFail($id);

        // Load the view with order data
        $viewData = ['order' => $order];

        // Generate the PDF
        $pdfContent = $this->generatePDF('myaccount.download', $viewData);

        // Send PDF content to the browser for download
        return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="order_' . $order->getId() . '.pdf"');
    }

    private function generatePDF($view, $data)
    {
        // Create PDF options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Instantiate Dompdf with options
        $dompdf = new Dompdf($options);

        // Load HTML content (view) to be converted to PDF
        $html = View::make($view, $data)->render();

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (generate the PDF)
        $dompdf->render();

        // Output PDF as string
        return $dompdf->output();
    }
}