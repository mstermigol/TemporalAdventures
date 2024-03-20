<!-- Authors: David Fonseca and Sergio Córdoba-->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="container my-5">
    <div class="row">
        <div class="col-12 mb-4 w-75 mx-auto">
            <!-- Post -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $viewData["post"]->getUser()->getName() }}</h4>
                </div>
                @if($viewData["post"]->getImage())
                    <img src="{{ url("{$viewData["post"]->getImage()}") }}" class="card-img rounded-0 border-bottom mx-auto">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $viewData["post"]->getTitle() }}</h5>
                    <p class="card-text">{!! $viewData["post"]->getDescription() !!}</p>
                </div>
                <div class="card-footer text-muted">
                    @lang('app.content_community.posted_on') {{ $viewData["post"]->getCreatedAt() }}
                </div>
            </div>

            <!-- Add review section -->
            @if(Auth::check())
            <div class="card my-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('communitypost.review.save', ['reviewOfId'=> $viewData["post"]->getId()]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::getUser()->getId() }}">
                        <input type="hidden" name="view" value="community">
                        <div class="form-group">
                            <label for="reviewTitle">@lang('app.content_community.title')</label>
                            <input type="text" class="form-control" id="reviewTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="reviewDescription">@lang('app.content_community.description')</label>
                            <textarea class="form-control" id="reviewDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reviewRating">@lang('app.content_community.rating')</label>
                            <select class="form-control" id="reviewRating" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">@lang('app.content_community.submit')</button>
                    </form>
                </div>
            </div>
            @endif

            <!-- Reviews section -->
            <div class="reviews mt-4">
                <h5>{{ $viewData["post"]->getReviews()->count() }} @lang('app.content_community.reviews')</h5>
                @foreach ($viewData["post"]->getReviews() as $review)
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-subtitle mb-2 text-muted">{{ $review->getUser()->getName() }}</h5>
                                <h6 class="card-text">{{ $review->getTitle() }}</h6>
                                <p class="card-text">{{ $review->getDescription()}}</p>
                                <div class="text-muted">@lang('app.content_community.rating'): {{ $review->getRating() }}/5</div>
                            </div>

                            <!-- Delete review button -->
                            @if(Auth::check() && Auth::getUser()->getId() === $review->getUserId())
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('communitypost.review.delete', $review->getId()) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-2" title="@lang('app.content_community.delete_review')" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <form method="GET" action="{{ route('review.edit', $review->getId()) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm ms-2" title="@lang('app.content_community.edit_review')">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
