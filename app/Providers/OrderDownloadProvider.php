<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Providers;

use App\Interfaces\OrderDownload;
use App\Util\OrderDownloadPDF;
use App\Util\OrderDownloadPNG;
use Illuminate\Support\ServiceProvider;

class OrderDownloadProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(OrderDownload::class, function ($app, $parameters) {
            if ($parameters['format'] === 'png') {
                return new OrderDownloadPNG();
            }

            return new OrderDownloadPDF();
        });
    }
}
