<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Util;

use App\Interfaces\OrderDownload;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class OrderDownloadPDF implements OrderDownload
{
    public function download(array $viewData, string $orderId): Response
    {

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = View::make('myaccount.download', $viewData)->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $contentPDF = $dompdf->output();

        return response($contentPDF)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="order_'.$orderId.'.pdf"');

    }
}
