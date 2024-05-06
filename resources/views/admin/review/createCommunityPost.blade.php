<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <a href="{{ route('admin.review.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>

  <div class="card my-4">

    <div class="card-body">
      @if ($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <form method="POST" action="{{ route('admin.review.save') }}">
        @csrf
        <input type="hidden" name="view" value="community">
        <div class="form-group">
          <label for="reviewTitle">@lang('admin.review.title')</label>
          <input type="text" class="form-control" id="reviewTitle" name="title" required>
        </div>
        <div class="form-group">
          <label for="reviewDescription">@lang('admin.review.description')</label>
          <textarea class="form-control" id="reviewDescription" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="reviewRating">@lang('admin.review.rating')</label>
          <select class="form-control" id="reviewRating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <div class="form-group">
          <label for="reviewOfId">@lang('admin.review.community_post')</label>
          <select class="form-control" id="reviewOfId" name="reviewOfId">
            @foreach ($viewData['communityPosts'] as $communityPost)
              <option value="{{ $communityPost->getId() }}">{{ $communityPost->getTitle() }}</option>
            @endforeach
          </select>
        </div>

        @if (!empty($viewData['travels']))
          <button type="submit" class="btn btn-success mt-2">@lang('admin.review.submit')</button>
        @endif
      </form>
    </div>
  </div>

@endsection
