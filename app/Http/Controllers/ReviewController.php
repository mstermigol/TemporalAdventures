<?php

/*
    Author: Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function save(Request $request, string $fromReviewId): RedirectResponse
    {
        Review::validate($request);

        $view = $request->input('view');

        $review = new Review();
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));
        $review->setUserId(auth()->id());

        if ($view == 'community') {
            $review->setCommunityPostId($fromReviewId);
        } elseif ($view == 'travel') {
            $review->setTravelId($fromReviewId);
        }

        $review->save();

        if ($view == 'community') {
            return redirect()->route('communitypost.show', $fromReviewId);
        } elseif ($view == 'travel') {
            return redirect()->route('travel.show', $fromReviewId);
        }

        return back();
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);

        if ($review->getUser()->getId() === Auth::user()->getId()) {
            $review->delete();

            return back();
        }

        return back();
    }
}
