<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\http\Request;
use Illuminate\View\View;
use App\Models\Travel;

class TravelController extends Controller{

    public function index(): View {
        $view_data = [];
        $view_data['title'] = 'Travels';
        $view_data['travels'] = Travel::all();
        return view('travel.index')->with('view_data', $view_data);
    }

    public function show(string $id): View{
        $travel = Travel::findOrFail($id);

        $view_data = [];
        $view_data['title'] = "{$travel->getTitle()}";
        $view_data['travels'] = $travel;

        return view('travel.show')->with('view_data', $view_data);
    }
}
