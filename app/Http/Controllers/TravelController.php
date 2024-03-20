<?php

/*
    Authors: David Fonseca, Sergio Córdoba and Miguel Jaramillo
*/

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TravelController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.travels');
        $viewData['travels'] = Travel::all();
        $viewData['topThree'] = Travel::getTopThreePopular();

        return view('travel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $travel = Travel::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['travel'] = $travel;

        return view('travel.show')->with('viewData', $viewData);
    }

    public function random(): RedirectResponse
    {
        $travel = Travel::inRandomOrder()->first();

        return redirect()->route('travel.show', ['id' => $travel->getId()]);
    }
}
