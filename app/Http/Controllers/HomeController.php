<?php

/*
    Authors: David Fonseca and Sergio Córdoba
*/

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
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

        $moviesResponse = Http::get('http://34.29.226.153/api/movies');
        $moviesData = $moviesResponse->json();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $moviesPerPage = 4;
        $currentItems = array_slice($moviesData, ($currentPage - 1) * $moviesPerPage, $moviesPerPage);

        $moviesPaginated = new LengthAwarePaginator($currentItems, count($moviesData), $moviesPerPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $viewData = [];
        $viewData['title'] = trans('app.titles.welcome');
        $viewData['weatherData'] = $weatherData;
        $viewData['moviesData'] = $moviesPaginated;

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
