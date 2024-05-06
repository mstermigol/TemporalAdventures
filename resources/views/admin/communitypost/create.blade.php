<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <section class="container my-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <a href="{{ route('admin.communitypost.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
        <h2>@lang('admin.community.create_post')</h2>
        <form method="POST" action="{{ route('admin.communitypost.save') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3">
            <label for="title">@lang('admin.community.title')</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="form-group mb-3">
            <label for="description">@lang('admin.community.description')</label>
            <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="form-group mb-3">
            <label for="image">@lang('admin.community.image')</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="form-group mb-3">
            <label for="date_of_event">@lang('admin.community.date_of_event')</label>
            <input type="date" class="form-control" id="date_of_event" name="date_of_event" required>
          </div>
          <div class="form-group mb-3">
            <label for="place_of_event">@lang('admin.community.place_of_event')</label>
            <input type="text" class="form-control" id="place_of_event" name="place_of_event" required>
          </div>
          <div class="form-group mb-4">
            <label for="category">@lang('admin.community.category')</label>
            <select class="form-control" id="category" name="category">
              @foreach ($viewData['categories'] as $category)
                <option value="{{ $category->value }}">{{ $category->value }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success">@lang('admin.community.submit')</button>
        </form>
      </div>
    </div>
  </section>
@endsection
