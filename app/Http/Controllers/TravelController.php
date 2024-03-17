<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Travel;
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
        $travel = Travel::with('reviews.user')->findOrFail($id); // Eager load the reviews and associated user

        $viewData = [];
        $viewData['title'] = "{$travel->getTitle()} - Temporal Adventures";
        $viewData['travel'] = $travel;

        return view('travel.show')->with('viewData', $viewData);
    }

    public function save(Request $request, $travelId)
    {
        Travel::validateSave($request);

        $review = new Review();
        $review->title = $request->title;
        $review->description = $request->description;
        $review->rating = $request->rating;
        $review->user_id = auth()->id();
        $review->travel_id = $travelId;
        $review->save();

        return redirect()->route('travel.show', $travelId)->with('success', 'Review agregada con éxito.');
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id === auth()->id()) {
            $review->delete();
            return back()->with('success', 'Review eliminada con éxito.');
        }

        return back()->with('error', 'No tienes permiso para eliminar esta review.');
    }
}
