<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $view_data['title'])
@section('content')
    <section class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ url("/images{$view_data["travel"]->getImage()}") }}" class="img-fluid rounded-3">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $view_data["travel"]->getTitle() }}
                    </h4>
                    <p class="card-text">
                        @lang('travel.content_travels.description'): {{ $view_data["travel"]->getDescription() }}<br>
                        @lang('travel.content_travels.start'): {{ $view_data["travel"]->getStartDate() }}<br>
                        @lang('travel.content_travels.end'): {{ $view_data["travel"]->getEndDate() }}<br>
                        <b>@lang('travel.content_travels.category'):</b> {{ $view_data["travel"]->getCategory() }}<br>
                        @lang('travel.content_travels.price'): <b>{{ $view_data["travel"]->getPrice() }}$</b>
                    </p>
                    <a href="#" class="btn btn-primary">@lang('travel.content_travels.add_to_cart')</a>
                </div>
            </div>
        </div>
    </section>
@endsection
