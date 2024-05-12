<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <section class="background-user">
    <div class="container col-xxl-8 px-4 py-5 text-white">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="{{ url('/images/michelin.webp') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
            width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">@lang('app.user.greeting')</h1>
          <p class="lead">@lang('app.user.thank_you')</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="https://youtu.be/fSlqTX39CMM" class="btn btn-primary btn-lg px-4 me-md-2">@lang('app.user.thanks')</a>
            <a href="{{ route('home.index') }}" class="btn btn-outline btn-lg px-4 text-white">@lang('app.user.back')</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
          <h3 class="mb-4">@lang('app.user.team_acknowledgment')</h3>
        </div>
      </div>

      <div class="row text-center d-flex align-items-stretch">
        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card border">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="{{ url('/images/checho.jpg') }}" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Sergio</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                @lang('app.feedback.introduction') "eso es todooo"
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
          <div class="card testimonial-card border">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="{{ url('/images/fonsek.jpg') }}" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Fonsek</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                @lang('app.feedback.introduction') "uy como así que para mañana!?"
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-0 d-flex align-items-stretch">
          <div class="card testimonial-card border">
            <div class="card-up background-user"></div>
            <div class="avatar mx-auto bg-white">
              <img src="{{ url('/images/miguel.jpg') }}" class="rounded-circle img-fluid" />
            </div>
            <div class="card-body">
              <h4 class="mb-4">Miguel</h4>
              <hr />
              <p class="dark-grey-text mt-4">
                @lang('app.feedback.introduction') "don't use styles in html. Use the css.app with the
                !important"
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="background-user">
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start text-white">
          <h1 class="display-4 fw-bold lh-1 mb-3">@lang('app.contact.header')</h1>
          <p class="col-lg-10 fs-4">@lang('app.contact.message')</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form class="p-4 p-md-5 border rounded-3 bg-light">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingInput" placeholder="@lang('app.contact.subject')"
                name="subject">
              <label for="floatingInput">@lang('app.contact.subject')</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control my-form-control" id="floatingMessage" name="message" placeholder="@lang('app.contact.body')"></textarea>
              <label for="floatingMessage">@lang('app.contact.body')</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">@lang('app.contact.send')</button>
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection
