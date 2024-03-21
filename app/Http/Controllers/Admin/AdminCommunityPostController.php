<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityPost;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminCommunityPostController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.community_posts');
        $viewData['delete'] = trans('admin.community.are_you_sure');
        $viewData['posts'] = CommunityPost::all();

        return view('admin.communitypost.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $post = CommunityPost::with('reviews.user')->findOrFail($id);

        $viewData = [];
        $viewData['title'] = "{$post->getTitle()} - Temporal Adventures";
        $viewData['post'] = $post;

        return view('admin.communitypost.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = trans('admin.titles.create_post');
        $viewData['categories'] = CategoryEnum::cases();

        return view('admin.communitypost.create')->with('viewData', $viewData);
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

        return redirect()->route('admin.communitypost.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            CommunityPost::destroy($id);

            return redirect()->route('admin.communitypost.index');
        } catch (Exception $e) {
            return redirect()->route('admin.communitypost.index');
        }
    }

    public function edit(string $id): View
    {
        $post = CommunityPost::findOrFail($id);
        $viewData = [];
        $viewData['title'] = trans('admin.titles.edit_community_post');
        $viewData['post'] = $post;
        $viewData['categories'] = CategoryEnum::cases();

        return view('admin.communitypost.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $post = CommunityPost::findOrFail($id);
        CommunityPost::validate($request);

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('public/community', $filename);
            $imagePath = '/storage/community/' . $filename;
        } else {
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

        return redirect()->route('admin.communitypost.index');
    }
}