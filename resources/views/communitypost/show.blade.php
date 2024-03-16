<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="container my-5">
    <div class="row">
        <div class="col-12 mb-4 w-75 mx-auto">
            <!-- Post -->
            <div class="card">
                <h4 class="card-title border-bottom ps-3 pt-2 pb-2">{{ $viewData["post"]->getUser()->name }}</h4>
                @if($viewData["post"]->getImage())
                    <img src="{{ url("{$viewData["post"]->getImage()}") }}" class="card-img w-75 mx-auto">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $viewData["post"]->getTitle() }}</h5>
                    <p class="card-text">{!! $viewData["post"]->getDescription() !!}</p>
                </div>
                <div class="card-footer text-muted">
                    @lang('app.content_community.posted_on') {{ $viewData["post"]->getCreatedAt() }}
                </div>
            </div>

            <!-- Sección para agregar una review -->
            <div class="card my-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('communityposts.reviews.save', $viewData['post']->getId()) }}">
                        @csrf
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
                        <button type="submit" class="btn btn-success mt-2">Enviar Review</button>
                    </form>
                </div>
            </div>

            <!-- Sección de Reviews -->
            <div class="reviews mt-4">
                <h5>{{ $viewData["post"]->reviews->count() }} @lang('app.content_community.reviews')</h5>
                @foreach ($viewData["post"]->reviews as $review)
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-subtitle mb-2 text-muted">{{ $review->user->name }}</h5>
                                <h6 class="card-text">{{ $review->title }}</h6>
                                <p class="card-text">{{ $review->description }}</p>
                                <div class="text-muted">@lang('app.content_community.rating'): {{ $review->rating }}/5</div>
                            </div>

                            <!-- Botón de eliminar review -->
                            @if(auth()->check() && auth()->id() === $review->user_id)
                                <form method="POST" action="{{ route('communityposts.reviews.delete', $review->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
