<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <div class="container my-5">
    <a href="{{ route('admin.communitypost.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
    <h1>@lang('admin.community.edit_post')</h1>
    <form action="{{ route('admin.communitypost.update', $viewData['communityPost']->getId()) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">@lang('admin.community.title')</label>
        <input type="text" class="form-control" id="title" name="title"
          value="{{ $viewData['communityPost']->getTitle() }}" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">@lang('admin.community.description')</label>
        <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required>{{ $viewData['communityPost']->getDescription() }}</textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">@lang('admin.community.post_image')</label>
        <div class="mb-2">
          <img class="image-preview" src="{{ $viewData['communityPost']->getImage() }}" alt="Current Image img-edit">
        </div>
        <input type="file" class="form-control" id="image" name="image">
        <div class="form-text">@lang('admin.community.change_post_image')</div>
      </div>

      <div class="mb-3">
        <label for="date_of_event" class="form-label">@lang('admin.community.date_of_event')</label>
        <input type="date" class="form-control" id="date_of_event" name="date_of_event"
          value="{{ $viewData['communityPost']->getDateOfEvent() }}" required>
      </div>

      <div class="mb-3">
        <label for="place_of_event" class="form-label">@lang('admin.community.place_of_event')</label>
        <input type="text" class="form-control" id="place_of_event" name="place_of_event"
          value="{{ $viewData['communityPost']->getPlaceOfEvent() }}" required>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">@lang('admin.community.category')</label>
        <select class="form-select" id="category" name="category">
          @foreach ($viewData['categories'] as $category)
            <option value="{{ $category->value }}"
              {{ $viewData['communityPost']->getCategory() === $category->value ? 'selected' : '' }}>
              {{ $category->value }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">@lang('admin.community.update_post')</button>
    </form>
  </div>
@endsection
