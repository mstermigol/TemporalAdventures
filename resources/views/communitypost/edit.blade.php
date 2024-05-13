<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <div class="container mx-5 mb-5">
    <h1>@lang('app.edit_post.edit_post')</h1>
    <form action="{{ route('communitypost.update', $viewData['post']->getId()) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">@lang('app.edit_post.title')</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $viewData['post']->getTitle() }}"
          required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">@lang('app.edit_post.description')</label>
        <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required>{{ $viewData['post']->getDescription() }}</textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">@lang('app.edit_post.post_image')</label>
        <div class="mb-2">
          <img src="{{ $viewData['post']->getImage() }}" alt="Current Image img-edit">
        </div>
        <input type="file" class="form-control" id="image" name="image">
        <div class="form-text">@lang('app.edit_post.change_post_image')</div>
      </div>

      <div class="mb-3">
        <label for="date_of_event" class="form-label">@lang('app.edit_post.date_of_event')</label>
        <input type="date" class="form-control" id="date_of_event" name="date_of_event"
          value="{{ $viewData['post']->getDateOfEvent() }}" required>
      </div>

      <div class="mb-3">
        <label for="place_of_event" class="form-label">@lang('app.edit_post.place_of_event')</label>
        <input type="text" class="form-control" id="place_of_event" name="place_of_event"
          value="{{ $viewData['post']->getPlaceOfEvent() }}" required>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">@lang('app.edit_post.category')</label>
        <select class="form-select" id="category" name="category">
          @foreach ($viewData['categories'] as $category)
            <option value="{{ $category->value }}"
              {{ $viewData['post']->getCategory() === $category->value ? 'selected' : '' }}>
              {{ $category->value }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">@lang('app.edit_post.update_post')</button>
    </form>
  </div>
@endsection
