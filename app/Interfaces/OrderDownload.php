<?php

namespace App\Interfaces;
use Illuminate\Http\Response;

interface OrderDownload {
    public function download(array $viewData, string $orderId): Response;
}
