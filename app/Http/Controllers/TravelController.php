<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\View\View;

class TravelController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.travels');
        $viewData['travels'] = Travel::all();

        return view('travel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $travel = Travel::findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['travel'] = $travel;

        return view('travel.show')->with('viewData', $viewData);
    }
}
