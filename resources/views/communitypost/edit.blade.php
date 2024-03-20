<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container my-5">
    <h1>Edit Post</h1>
    <form action="{{ route('communitypost.update', $viewData['post']->getId()) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $viewData['post']->getTitle() }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required>{{ $viewData['post']->getDescription() }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <div class="mb-2">
                <img src="{{ $viewData['post']->getImage() }}" alt="Current Image" style="max-width: 100%; height: auto;">
            </div>
            <input type="file" class="form-control" id="image" name="image">
            <div class="form-text">If you want to change the post image, choose a new one.</div>
        </div>

        <div class="mb-3">
            <label for="date_of_event" class="form-label">Date of Event</label>
            <input type="date" class="form-control" id="date_of_event" name="date_of_event" value="{{ $viewData['post']->getDateOfEvent()}}" required>
        </div>

        <div class="mb-3">
            <label for="place_of_event" class="form-label">Place of Event</label>
            <input type="text" class="form-control" id="place_of_event" name="place_of_event" value="{{ $viewData['post']->getPlaceOfEvent() }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category">
                @foreach ($viewData['categories'] as $category)
                    <option value="{{ $category->value }}" {{ $viewData['post']->getCategory() === $category->value ? 'selected' : '' }}>
                        {{ $category->value }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
