<?php

/*
    Authors: David Fonseca and Sergio Córdoba
*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): view
    {
        $weatherResponse = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => 52.52,
            'longitude' => 13.41,
            'hourly' => 'temperature_2m',
        ]);

        $weatherData = $weatherResponse->json();

        $team8Response = '{
            "id": "1",
            "name": "Momia",
            "description": "Katherine",
            "category": "Medicamentos",
            "price": "1000",
            "stock": "10",
            "image": "1.jpg",
            "user_id": null,
            "created_at": "2024-05-17T01:18:16.000000Z",
            "updated_at": "2024-05-17T01:18:42.000000Z"
        }';

        $team8Data = json_decode($team8Response, true);

        $viewData = [];
        $viewData['title'] = trans('app.titles.welcome');
        $viewData['weatherData'] = $weatherData;
        $viewData['team8Data'] = $team8Data;

        return view('home.index')->with('viewData', $viewData);
    }

    public static function about(): view
    {
        $breadcrumbs = [
            ['name' => trans('app.breadcrumbs.home'), 'url' => route('home.index')],
            ['name' => trans('app.breadcrumbs.about_us'), 'url' => route('home.about')],
        ];

        $viewData = [];
        $viewData['title'] = trans('app.titles.about');
        $viewData['breadcrumbs'] = $breadcrumbs;

        return view('home.about')->with('viewData', $viewData);
    }
}
