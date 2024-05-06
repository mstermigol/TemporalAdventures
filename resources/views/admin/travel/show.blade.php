<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <a href="{{ route('admin.travel.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>

  <div class="row">
    <div class="col-md-3">
      <img src="{{ url("{$viewData['travel']->getImage()}") }}" class="img-fluid rounded-3">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <!-- Travel -->
        <h4 class="card-title">
          {{ $viewData['travel']->getTitle() }}
        </h4>
        <p class="card-text">
          <b>@lang('admin.travel.description'):</b> {{ $viewData['travel']->getDescription() }}<br>
          <b>@lang('admin.travel.start_date'):</b> {{ $viewData['travel']->getStartDate() }}<br>
          <b>@lang('admin.travel.end_date'):</b> {{ $viewData['travel']->getEndDate() }}<br>
          <b>@lang('admin.travel.category'):</b> {{ $viewData['travel']->getCategory() }}<br>
          <b>@lang('admin.travel.price'):</b> {{ $viewData['travel']->getPrice() }}$
        </p>
      </div>
    </div>
  </div>
@endsection
