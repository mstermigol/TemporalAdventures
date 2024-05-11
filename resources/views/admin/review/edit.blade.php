@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <a href="{{ route('admin.review.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
  <div class="card mb-4">
    <div class="card-header">
      @lang('admin.review.edit_review')
    </div>
    <div class="card-body">
      @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
          @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <form method="POST" action="{{ route('admin.review.update', ['id' => $viewData['review']->getId()]) }}">
        @csrf
        @method('PUT')

        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.review.title'):</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="title" value="{{ $viewData['review']->getTitle() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.review.description'):</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="description" value="{{ $viewData['review']->getDescription() }}" type="text"
                class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.review.rating'):</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <select name="rating" id="rating" class="form-control">
                <option value="1" @if ($viewData['review']->getRating() == 1) selected @endif>1</option>
                <option value="2" @if ($viewData['review']->getRating() == 2) selected @endif>2</option>
                <option value="3" @if ($viewData['review']->getRating() == 3) selected @endif>3</option>
                <option value="4" @if ($viewData['review']->getRating() == 4) selected @endif>4</option>
                <option value="5" @if ($viewData['review']->getRating() == 5) selected @endif>5</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">@lang('admin.review.edit')</button>
      </form>
    </div>
  </div>
@endsection
