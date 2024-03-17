<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Travel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $travel = Travel::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['travel'] = $travel;

        return view('travel.show')->with('viewData', $viewData);
    }

    public function save(Request $request, string $travelId): RedirectResponse
    {
        Travel::validate($request);

        $review = new Review();
        $review->setTitle($request->title);
        $review->setDescription($request->description);
        $review->setRating($request->rating);
        $review->setUserId(auth()->id());
        $review->setTravelId($travelId);
        $review->save();

        return redirect()->route('travel.show', $travelId);
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);

        if ($review->getUser()->getId() === auth()->getUser()->getId() ) {
            $review->delete();
            return back();
        }

        return back();
    }
}
