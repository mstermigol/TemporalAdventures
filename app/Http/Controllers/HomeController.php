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
        $viewData = [];
        $viewData['title'] = trans('app.titles.about');
        return view('home.about')->with('viewData', $viewData);
    }
}
