<?php

/*
    Authors: David Fonseca, Sergio Córdoba and Miguel Jaramillo
*/

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class TravelController extends Controller
{
    public function index(): View
    {
        $collection = collect(Travel::all());
        $itemsPerPage = 3;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedOrders = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedOrders = new LengthAwarePaginator(
            $pagedOrders,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('travel.index')]
        );

        $viewData = [];
        $viewData['title'] = trans('app.titles.travels');
        $viewData['travels'] = $paginatedOrders;
        $viewData['topThree'] = Travel::getTopThreePopular();

        return view('travel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $travel = Travel::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['delete'] = trans('app.content_travels.are_you_sure');
        $viewData['travel'] = $travel;

        return view('travel.show')->with('viewData', $viewData);
    }

    public function random(): RedirectResponse
    {
        $travel = Travel::inRandomOrder()->first();

        return redirect()->route('travel.show', ['id' => $travel->getId()]);
    }
}
