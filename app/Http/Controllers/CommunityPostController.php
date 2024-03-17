<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\CommunityPost;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('app.titles.community_posts');
        $viewData['posts'] = CommunityPost::all();

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

    public function save(Request $request, string $communityPostId): RedirectResponse
    {
        Review::validate($request);

        $review = new Review();
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setRating($request->input('rating'));
        $review->setUserId(auth()->id());
        $review->setCommunityPostId($communityPostId);
        $review->save();

        return redirect()->route('communitypost.show', $communityPostId)->with('success', 'Review added successfully.');
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);

        if ($review->getUser()->getId()  === auth()->getUser()->getId()) {
            $review->delete();
            return back();
        }
        return back();
    }

    public function new(): View
    {
        $viewData = [];
        $viewData['title'] = "Create New Community Post";
        $viewData['categories'] = CategoryEnum::cases();

        return view('communitypost.new')->with('viewData', $viewData);
    }

    public function create(Request $request): RedirectResponse
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

    public function destroy(string $id): RedirectResponse
    {
        $post = CommunityPost::findOrFail($id);

        if ($post->getUser()->getId() === auth()->getUser()->getId()) {
            $post->delete();
            return redirect()->route('communitypost.index');
        }

        return back();
    }

}
