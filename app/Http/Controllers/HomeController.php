<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): view
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.welcome');

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
