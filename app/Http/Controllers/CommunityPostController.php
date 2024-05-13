<?php

/*
    Authors: David Fonseca, Sergio Córdoba and Miguel Jaramillo
*/

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\CommunityPost;
use App\Util\ImageLocalStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommunityPostController extends Controller
{
    public function index(): View
    {
        $arrayTopThreePosts = CommunityPost::getTopThreeRated();

        $collection = collect(CommunityPost::with('user')->get());
        $itemsPerPage = 3;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedCommunityPosts = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedCommunityPosts = new LengthAwarePaginator(
            $pagedCommunityPosts,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('communitypost.index')]
        );

        $viewData = [];
        $viewData['title'] = trans('app.titles.community_posts');
        $viewData['posts'] = $paginatedCommunityPosts;
        $viewData['delete'] = trans('app.content_community.are_you_sure');
        $viewData['topThree'] = collect($arrayTopThreePosts)->keys()->map(function ($id) {
            return CommunityPost::find($id);
        });

        return view('communitypost.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $post = CommunityPost::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$post->getTitle()} - Temporal Adventures";
        $viewData['delete'] = trans('app.content_community.are_you_sure');
        $viewData['post'] = $post;

        return view('communitypost.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.create_community_post');
        $viewData['categories'] = CategoryEnum::cases();

        return view('communitypost.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        CommunityPost::validate($request);

        $imagePath = new ImageLocalStorage();
        $imagePath = $imagePath->storeAndGetPath($request, 'community');

        $post = new CommunityPost();
        $post->setTitle($request->get('title'));
        $post->setDescription($request->get('description'));
        $post->setImage($imagePath);
        $post->setDateOfEvent($request->get('date_of_event'));
        $post->setPlaceOfEvent($request->get('place_of_event'));
        $categoryEnum = CategoryEnum::fromValue($request->get('category'));
        $post->setCategory($categoryEnum);
        $post->setUserId(Auth::getUser()->getId());
        $post->save();

        return redirect()->route('communitypost.index');
    }

    public function delete(string $id): RedirectResponse
    {
        $post = CommunityPost::findOrFail($id);

        if ($post->getUser()->getId() === Auth::getUser()->getId()) {
            $post->delete();

            return redirect()->route('communitypost.index');
        }

        return back();
    }

    public function edit(string $id): View
    {
        $post = CommunityPost::findOrFail($id);
        $viewData = [];
        $viewData['title'] = trans('app.titles.edit_community_post');
        $viewData['post'] = $post;
        $viewData['categories'] = CategoryEnum::cases();

        return view('communitypost.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $post = CommunityPost::findOrFail($id);
        CommunityPost::validate($request);

        $imagePath = new ImageLocalStorage();
        $imagePath = $imagePath->storeAndGetPath($request, 'community');

        if (! $imagePath) {
            $imagePath = $post->getImage();
        }

        $post->setTitle($request->get('title'));
        $post->setDescription($request->get('description'));
        $post->setImage($imagePath);
        $post->setDateOfEvent($request->get('date_of_event'));
        $post->setPlaceOfEvent($request->get('place_of_event'));
        $categoryEnum = CategoryEnum::fromValue($request->get('category'));
        $post->setCategory($categoryEnum);
        $post->save();

        return redirect()->route('communitypost.index');
    }
}
