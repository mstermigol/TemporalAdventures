<!-- Authors: David Fonseca and Miguel Jaramillo-->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
 
    <section class="container my-5">
    <h2>@lang('app.content_travels.top_three')</h2>
        <ul class="row list-unstyled align-items-stretch">
            @foreach ($viewData["topThree"] as $travel)
                <li class="col-md-4 col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ url("/images{$travel->getImage()}") }}" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$travel->getTitle()}}</h5>
                            <p class="card-text">{{$travel->getDescription()}}</p>
                            <a href="{{ route('travel.show', ['id' => $travel->getId()]) }}"
                               class="btn btn-primary mt-auto d-inline travel-button">
                               @lang('app.content_travels.see_more')
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="container my-5">
    <div class="row justify-content-between d-flex">
    <h2 class="col-sm-6">@lang('app.content_travels.all')</h2> 
    <div>
    <button href="{{ route('travel.show', ['id' => $viewData['travels']->random()->getId()]) }}" class="btn btn-primary col-sm-6">
        @lang('app.content_travels.random')
</button>
    </div>
</div>
        <ul class="row list-unstyled align-items-stretch">
            <!-- Title section-->
            <div class="p-3 mx-auto d-flex justify-content-between align-items-center">
                <h1 class="text-uppercase">@lang('app.content_travels.travels')</h1>
            </div>
            @foreach ($viewData["travels"] as $travel)
                <li class="col-md-4 col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ url("/images{$travel->getImage()}") }}" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$travel->getTitle()}}</h5>
                            <p class="card-text">{{$travel->getDescription()}}</p>
                            <a href="{{ route('travel.show', ['id' => $travel->getId()]) }}"
                               class="btn btn-primary mt-auto d-inline travel-button">
                               @lang('app.content_travels.see_more')
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
