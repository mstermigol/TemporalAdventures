<?php

/*
    Author: David Fonseca
*/

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Models\CommunityPost;
use App\Models\Review;
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
        $post = CommunityPost::with('reviews.user')->findOrFail($id); // Eager load the reviews and associated user

        $viewData = [];
        $viewData['title'] = "{$post->getTitle()} - Temporal Adventures";
        $viewData['post'] = $post;

        return view('communitypost.show')->with('viewData', $viewData);
    }

    public function save(Request $request, $communityPostId)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review();
        $review->title = $request->title;
        $review->description = $request->description;
        $review->rating = $request->rating;
        $review->user_id = auth()->id();
        $review->community_post_id = $communityPostId;
        $review->save();

        return redirect()->route('communityposts.show', $communityPostId)->with('success', 'Review agregada con éxito.');
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);

        // Asegúrate de que el usuario autenticado puede eliminar la review
        if ($review->user_id === auth()->id()) {
            $review->delete();
            return back()->with('success', 'Review eliminada con éxito.');
        }

        return back()->with('error', 'No tienes permiso para eliminar esta review.');
    }

    public function new()
    {
        $viewData = [];
        $viewData['title'] = "Create New Community Post";
        $viewData['categories'] = CategoryEnum::cases();

        return view('communitypost.new')->with('viewData', $viewData);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'date_of_event' => 'required|date',
            'place_of_event' => 'required|string',
            'category' => 'required|in:' . implode(',', CategoryEnum::values()),
        ]);

        if ($request->hasFile('image')) {
            // Generar un nombre único para la imagen
            $filename = uniqid() . '.' . $request->file('image')->extension();

            // Guardar la imagen en el disco public en la carpeta community
            $imagePath = $request->file('image')->storeAs('public/community', $filename);

            // La ruta que se guarda en la base de datos debería ser la ruta pública
            $imagePath = '/storage/community/' . $filename; // Esto será algo como '/community/5f5d3f8ab28b8.jpeg'
        } else {
            $imagePath = null;
        }

        $post = new CommunityPost();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imagePath;
        $post->date_of_event = $request->date_of_event;
        $post->place_of_event = $request->place_of_event;
        $post->category = $request->category;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('communityposts.index')->with('success', 'Community post created successfully.');
    }

    public function destroy($id)
    {
        $post = CommunityPost::findOrFail($id);

        // Asegúrate de que el usuario autenticado puede eliminar el post
        if ($post->user_id === auth()->id()) {
            $post->delete();
            return redirect()->route('communityposts.index')->with('success', 'Post eliminado con éxito.');
        }

        return back()->with('error', 'No tienes permiso para eliminar este post.');
    }

}
