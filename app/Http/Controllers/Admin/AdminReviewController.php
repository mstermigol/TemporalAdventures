<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityPost;
use App\Models\Review;
use App\Models\Travel;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $collection = collect(Review::all());
        $itemsPerPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedReviews = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedReviews = new LengthAwarePaginator(
            $pagedReviews,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('admin.review.index')]

        );

        $viewData = [];
        $viewData['title'] = trans('admin.titles.reviews');
        $viewData['delete'] = trans('admin.community.are_you_sure');
        $viewData['reviews'] = $paginatedReviews;

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $review = Review::find($id);

            $userName = $review->getUser()->getName();

            if ($review->getTravelId() !== null) {
                $travelTitle = $review->getTravel()->getTitle();
                $viewData = [];
                $viewData['title'] = $travelTitle.' - Temporal Adventures';
                $viewData['review'] = $review;
                $viewData['reviewOfTitle'] = $travelTitle;
                $viewData['userName'] = $userName;

                return view('admin.review.show')->with('viewData', $viewData);

            } elseif ($review->getCommunityPostId() !== null) {
                $communityPostTitle = $review->getCommunityPost()->getTitle();
                $viewData = [];
                $viewData['title'] = $communityPostTitle.' - Temporal Adventures';
                $viewData['review'] = $review;
                $viewData['reviewOfTitle'] = $communityPostTitle;
                $viewData['userName'] = $userName;

                return view('admin.review.show')->with('viewData', $viewData);

            }

            return redirect()->route('admin.review.index');
        } catch (Exception $e) {
            return redirect()->route('admin.review.index');
        }
    }

    public function createTravel(): View
    {
        $travels = Travel::all();
        $viewData = [];
        $viewData['title'] = trans('admin.titles.create_review_travel');
        $viewData['travels'] = $travels;

        return view('admin.review.createTravel')->with('viewData', $viewData);
    }

    public function createCommunityPost(): View
    {
        $communityPosts = CommunityPost::all();
        $viewData = [];
        $viewData['title'] = trans('admin.titles.create_review_community');
        $viewData['communityPosts'] = $communityPosts;

        return view('admin.review.createCommunityPost')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);

        $view = $request->input('view');

        $review = new Review();
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));
        $review->setUserId(Auth::user()->getId());
        $reviewOfId = $request->input('reviewOfId');

        if ($view == 'community') {
            $review->setCommunityPostId($reviewOfId);
        } elseif ($view == 'travel') {
            $review->setTravelId($reviewOfId);
        }

        $review->save();

        return redirect()->route('admin.review.index');
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {
            $review = Review::find($id);
            $viewData = [];
            $viewData['title'] = trans('admin.titles.edit_review');
            $viewData['review'] = $review;

            return view('admin.review.edit')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.review.index');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Review::validate($request);

        $review = Review::find($id);
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));

        $review->save();

        return redirect()->route('admin.review.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            Review::destroy($id);

            return redirect()->route('admin.review.index');
        } catch (Exception $e) {
            return redirect()->route('admin.review.index');
        }
    }
}
