<!-- Authors: David Fonseca and Miguel Jaramillo-->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <section class="container">
    <h2>@lang('app.content_travels.top_three')</h2>
    <ul class="row list-unstyled align-items-stretch">
      @foreach ($viewData['topThree'] as $travel)
        <li class="col-md-4 col-lg-4 mb-4">
          <div class="card h-100">
            <img src="{{ url("{$travel->getImage()}") }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $travel->getTitle() }}</h5>
              <p class="card-text">{{ $travel->getDescription() }}</p>
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
    <div class="container d-flex justify-content-between mb-2">
      <h2>@lang('app.content_travels.all')</h2>
      <button onclick="location.href='{{ route('travel.random') }}'" class="btn btn-primary">@lang('app.content_travels.random')</button>
    </div>
    <ul class="row list-unstyled align-items-stretch">
      @foreach ($viewData['travels'] as $travel)
        <li class="col-md-4 col-lg-4 mb-4">
          <div class="card h-100">
            <img src="{{ url("{$travel->getImage()}") }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $travel->getTitle() }}</h5>
              <p class="card-text">{{ $travel->getDescription() }}</p>
              <a href="{{ route('travel.show', ['id' => $travel->getId()]) }}"
                class="btn btn-primary mt-auto d-inline travel-button">
                @lang('app.content_travels.see_more')
              </a>
            </div>
          </div>
        </li>
      @endforeach
    </ul>
    <div class="p-3 w-75 mx-auto">
      {{ $viewData['travels']->onEachSide(1)->links() }}
    </div>
  </section>
@endsection
