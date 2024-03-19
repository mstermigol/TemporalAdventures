<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public static function index() {
        $viewData = [];
        $viewData['title'] = trans('app.titles.about');
        return view('about')->with('viewData', $viewData);
    }
}
