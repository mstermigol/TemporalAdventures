<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\JsonResponse;

class TravelApiController extends Controller
{
    public function index(): JsonResponse
    {
        $travels = TravelResource::collection(Travel::all());

        return response()->json($travels, 200);
    }
}
