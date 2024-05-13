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
        $breadcrumbs = [
            ['name' => trans('app.breadcrumbs.home'), 'url' => route('home.index')],
            ['name' => trans('app.content_travels.travels'), 'url' => route('travel.index')],
        ];

        $viewData = [];
        $viewData['title'] = trans('app.titles.travels');
        $viewData['travels'] = Travel::all();
        $viewData['topThree'] = Travel::getTopThreePopular();
        $viewData['breadcrumbs'] = $breadcrumbs;

        return view('travel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $travel = Travel::with('reviews.user')->findOrFail($id);
        $breadcrumbs = [
            ['name' => trans('app.breadcrumbs.home'), 'url' => route('home.index')],
            ['name' => trans('app.content_travels.travels'), 'url' => route('travel.index')],
            ['name' => $travel->getTitle(), 'url' => route('travel.show', $id)],

        ];

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['delete'] = trans('app.content_travels.are_you_sure');
        $viewData['travel'] = $travel;
        $viewData['breadcrumbs'] = $breadcrumbs;

        return view('travel.show')->with('viewData', $viewData);
    }

    public function random(): RedirectResponse
    {
        $travel = Travel::inRandomOrder()->first();

        return redirect()->route('travel.show', ['id' => $travel->getId()]);
    }
}
