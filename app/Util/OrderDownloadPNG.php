<?php

namespace App\Util;

use App\Interfaces\OrderDownload;
use Illuminate\Http\Response;
use Spatie\Browsershot\Browsershot;

class OrderDownloadPNG implements OrderDownload
{
    public function download(array $viewData, string $orderId): Response
    {
        $html = view('myaccount.download', $viewData)->render();

        $imageData = Browsershot::html($html)
            ->setNodeModulePath(base_path('node_modules'))
            ->noSandbox()
            ->waitUntilNetworkIdle()
            ->screenshot();

        return response($imageData)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="order_'.$orderId.'.png"');

    }
}
