<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\OrderDownload;
use App\Util\OrderDownloadPNG;
use App\Util\OrderDownloadPDF;

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
