<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): view
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.travels');
        return view('home.index')->with('viewData', $viewData);
    }
}
