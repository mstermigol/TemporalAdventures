<?php

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
            'hourly' => 'temperature_2m'
        ]);

        $weatherData = $weatherResponse->json();

        $viewData = [];
        $viewData['title'] = trans('app.titles.welcome');
        $viewData['weatherData'] = $weatherData;

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
