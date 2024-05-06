<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
  <div class="container my-5">
    <h1>@lang('app.edit_review.edit_review')</h1>
    <form action="{{ route('review.update', $viewData['review']->getId()) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title">@lang('app.edit_review.title')</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $viewData['review']->getTitle() }}"
          required>
      </div>

      <div class="mb-3">
        <label for="description">@lang('app.edit_review.description')</label>
        <textarea class="form-control" id="description" name="description" required>{{ $viewData['review']->getDescription() }}</textarea>
      </div>

      <div class="mb-3">
        <label for="rating">@lang('app.edit_review.rating')</label>
        <select class="form-control" id="rating" name="rating">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">@lang('app.edit_review.update_review')</button>
    </form>
  </div>
@endsection
