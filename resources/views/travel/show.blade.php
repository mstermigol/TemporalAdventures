<!-- Authors: David Fonseca and Sergio Córdoba-->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <section class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ url("/images{$viewData["travel"]->getImage()}") }}" class="img-fluid rounded-3">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <!-- Travel -->
                    <h4 class="card-title">
                        {{ $viewData["travel"]->getTitle() }}
                    </h4>
                    <p class="card-text">
                        <b>@lang('app.content_travels.description'):</b> {{ $viewData["travel"]->getDescription() }}<br>
                        <b>@lang('app.content_travels.start'):</b> {{ $viewData["travel"]->getStartDate() }}<br>
                        <b>@lang('app.content_travels.end'):</b> {{ $viewData["travel"]->getEndDate() }}<br>
                        <b>@lang('app.content_travels.category'):</b> {{ $viewData["travel"]->getCategory() }}<br>
                        <b>@lang('app.content_travels.price'):</b> {{ $viewData["travel"]->getPrice() }}$
                    </p>
                    <!--Button to add to the cart -->
                    <form method="POST" action="{{ route('cart.add', ['id' => $viewData['travel']->getId()]) }}">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                <div class="input-group-text">@lang('app.content_travels.quantity')</div>
                                <input type="number" min="1" class="form-control quantity-input" name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn bg-primary text-white" type="submit">@lang('app.content_travels.add_to_cart')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Section to add a review -->
            @if(Auth::check())
            <div>
                <div class="card my-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('travel.review.save', ['reviewOfId' => $viewData['travel']->getId()]) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::getUser()->getId() }}">
                                <input type="hidden" name="view" value="travel">
                            <div class="form-group">
                                <label for="reviewTitle">@lang('app.content_travels.title')</label>
                                <input type="text" class="form-control" id="reviewTitle" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="reviewDescription">@lang('app.content_travels.description')</label>
                                <textarea class="form-control" id="reviewDescription" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="reviewRating">@lang('app.content_travels.rating')</label>
                                <select class="form-control" id="reviewRating" name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">@lang('app.content_travels.submit')</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <!-- Reviews section -->
            <div class="reviews mt-4">
                <h5>{{ $viewData['travel']->getReviews()->count() }} @lang('app.content_travels.reviews')</h5>
                @foreach ($viewData['travel']->getReviews() as $review)
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-subtitle mb-2 text-muted">{{ $review->getUser()->getName() }}</h5>
                                <h6 class="card-text">{{ $review->getTitle() }}</h6>
                                <p class="card-text">{{ $review->getDescription() }}</p>
                                <div class="text-muted">@lang('app.content_travels.rating'): {{ $review->getRating() }}/5</div>
                            </div>

                            <!-- Delete and edit review button -->
                            @if(Auth::check() && Auth::getUser()->getId() === $review->getUserId())
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('travel.review.delete', $review->getId()) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete review" onclick="return confirm('{{$viewData['delete']}}')">
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
    </section>
@endsection
