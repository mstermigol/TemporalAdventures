<?php

/*
    Authors: David Fonseca and Sergio Córdoba
*/

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\CommunityPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    public function index(): View
    {
        $arrayTopThreePosts = CommunityPost::getTopThreeRated();

        $viewData = [];
        $viewData['title'] = trans('app.titles.community_posts');
        $viewData['posts'] = CommunityPost::all();
        $viewData['topThreePosts'] = collect($arrayTopThreePosts)->keys()->map(function ($id) {
        return CommunityPost::find($id);
        });
        return view('communitypost.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $post = CommunityPost::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$post->getTitle()} - Temporal Adventures";
        $viewData['post'] = $post;

        return view('communitypost.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = "Create New Community Post";
        $viewData['categories'] = CategoryEnum::cases();

        return view('communitypost.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        CommunityPost::validate($request);

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('public/community', $filename);
            $imagePath = '/storage/community/' . $filename;
        } else {
            $imagePath = null;
        }

        $post = new CommunityPost();
        $post->setTitle($request->get('title'));
        $post->setDescription($request->get('description'));
        $post->setImage($imagePath);
        $post->setDateOfEvent($request->get('date_of_event'));
        $post->setPlaceOfEvent($request->get('place_of_event'));
        $categoryEnum = CategoryEnum::fromValue($request->get('category'));
        $post->setCategory($categoryEnum);
        $post->setUserId(Auth::id());
        $post->save();


        return redirect()->route('communitypost.index');
    }

    public function delete(string $id): RedirectResponse
    {
        $post = CommunityPost::findOrFail($id);

        if ($post->getUser()->getId() === auth()->getUser()->getId()) {
            $post->delete();
            return redirect()->route('communitypost.index');
        }

        return back();
    }

}
