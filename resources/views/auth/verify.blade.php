<!-- Author: Miguel Jaramillo -->

@extends('layouts.app')
@section('title', trans('app.titles.verify'))
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">@lang('app.verify.verify_email_address')</div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                @lang('app.verify.fresh_verification')
              </div>
            @endif

            @lang('app.verify.before_proceeding')
            @lang('app.verify.not_receive_email'),
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('app.verify.click_request_another')</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
