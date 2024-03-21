<?php

/*
    Author: Sergio Córdoba and David Fonseca
*/

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{

    public function save(Request $request, string $reviewOfId): RedirectResponse
    {
        Review::validate($request);

        $view = $request->input('view');

        $review = new Review();
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));

        $review->setUserId($request->input('id'));

        if ($view == 'community') {
            $review->setCommunityPostId($reviewOfId);
        } elseif ($view == 'travel') {
            $review->setTravelId($reviewOfId);
        }

        $review->save();

        if ($view == 'community') {
            return redirect()->route('communitypost.show', $reviewOfId);
        } elseif ($view == 'travel') {
            return redirect()->route('travel.show', $reviewOfId);
        }

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);

        if ($review->getUser()->getId() === Auth::getUser()->getId()) {
            $review->delete();
        }

        return back();
    }

    public function edit(string $id) : View
    {
        $review = Review::findOrFail($id);
        $viewData = [];
        $viewData['title'] = trans('app.titles.edit_review');
        $viewData['review'] = $review;
        return view('review.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id) : RedirectResponse
    {
        $review = Review::findOrFail($id);
        Review::validate($request);

        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));
        $review->save();

        if ($review->getCommunityPostId()) {
            return redirect()->route('communitypost.show', $review->getCommunityPostId());
        } else if ($review->getTravelId()) {
            return redirect()->route('travel.show', $review->getTravelId());
        }

        return back();
    }
}
