<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
  <section class="text-white text-center p-5 background-image pagina-principal">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-1 font-weight-bold text-shadow courgette-regular">Temporal<br>Adventures</h1>
          <p class="lead my-5 text-shadow">@lang('app.adventure.intro')</p>
          <a href="{{ route('travel.index') }}" class="btn btn-primary btn-lg mb-5">@lang('app.adventure.start_shopping')</a>
        </div>
      </div>
    </div>
  </section>
  <section class="background-user text-center py-5">
    <h1 class="text-white">@lang('app.time_travel.weather_title') (@lang('app.time_travel.today') Medellín)</h1>
    <p class="mx-5 lead text-white">@lang('app.time_travel.weather')</p>
    <div class="d-flex justify-content-center">
      <canvas class="mx-wh-800 mx-5" id="temperatureChart" width="400" height="200"></canvas>
    </div>
  </section>
  <section class="text-center py-5">
    <div class="container">
      <h2 class="mb-4">@lang('app.time_travel.discover')</h2>
      <p class="lead mb-5">@lang('app.time_travel.description')</p>
      <div class="row">
        <div class="col-md-4 mb-5">
          <i class="bi bi-clock-history fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.support_24_7')</h5>
          <p>@lang('app.time_travel.support_description')</p>
        </div>
        <div class="col-md-4 mb-5">
          <i class="bi bi-arrow-return-left fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.risk_free_journeys')</h5>
          <p>@lang('app.time_travel.risk_free_description')</p>
        </div>
        <div class="col-md-4 mb-5">
          <i class="bi bi-badge-ad fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.exclusive_access')</h5>
          <p>@lang('app.time_travel.exclusive_access_description')</p>
        </div>
        <div class="col-md-4 mb-5">
          <i class="bi bi-hourglass-split fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.time_saving_travel')</h5>
          <p>@lang('app.time_travel.time_saving_description')</p>
        </div>
        <div class="col-md-4 mb-5">
          <i class="bi bi-map fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.epoch_selection')</h5>
          <p>@lang('app.time_travel.epoch_selection_description')</p>
        </div>
        <div class="col-md-4 mb-5">
          <i class="bi bi-shield-lock fs-1"></i>
          <h5 class="mt-2">@lang('app.time_travel.secure_payments')</h5>
          <p>@lang('app.time_travel.payments_description')</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 background-user">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center text-white">
          <h2 class="mb-4">@lang('app.adventures_gallery.header')</h2>
          <p class="mb-4 pb-2 mb-md-5 pb-md-0">@lang('app.adventures_gallery.description')</p>
        </div>
      </div>
      <div id="homeTravelCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#homeTravelCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ url('/images/tokyo.webp') }}" class="d-block w-100 border" alt="">
          </div>
          <div class="carousel-item">
            <img src="{{ url('/images/dubai.webp') }}" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="{{ url('/images/medellin.webp') }}" class="d-block w-100" alt="">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeTravelCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeTravelCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
      </div>
    </div>
  </section>
  <section class="py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
          <h2 class="mb-4">@lang('app.testimonials.header')</h2>
        </div>
      </div>
      <div class="row text-center d-flex align-items-stretch">
        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">@lang('app.testimonials.maria_samantha.name')</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>
                @lang('app.testimonials.maria_samantha.testimonial')
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">@lang('app.testimonials.lisa_cudrow.name')</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>
                @lang('app.testimonials.lisa_cudrow.testimonial')
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-0 d-flex align-items-stretch">
          <div class="card testimonial-card">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">@lang('app.testimonials.john_smith.name')</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                <i class="fas fa-quote-left pe-2"></i>
                @lang('app.testimonials.john_smith.testimonial')
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bsb-cta-2 py-5 background-user">
    <div class="container">
      <div class="card border-0 rounded-3 overflow-hidden text-center bg-transparent">
        <div class="card-body">
          <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-10">
              <span class="h5 mb-4 text-white text-uppercase">@lang('app.discover_adventure.header')</span>
              <h2 class="display-5 text-white mb-5 mt-3">@lang('app.discover_adventure.description')</h2>
              <a href="{{ route('travel.index') }}"
                class="btn btn-primary btn-lg rounded mb-0 text-nowrap">@lang('app.discover_adventure.start_your_adventure')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script id="weatherData" type="application/json">@json($viewData['weatherData'])</script>
  <script src="{{ asset('/js/home.js') }}"></script>
@endsection
