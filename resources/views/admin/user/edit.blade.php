<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
  <div class="card mb-4">
    <div class="card-header">
      @lang('admin.user.edit_user')
    </div>
    <div class="card-body">
      @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
          @foreach ($errors->all() as $error)
            <li>- {{ $error }}</li>
          @endforeach
        </ul>
      @endif
      <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.name'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="name" value="{{ $viewData['user']->getName() }}" type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.email'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="email" value="{{ $viewData['user']->getEmail() }}" type="email" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.password'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="password" type="password" class="form-control">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.balance'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="balance" value="{{ $viewData['user']->getBalance() }}" type="number" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.phone_number'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="phone_number" value="{{ $viewData['user']->getPhoneNumber() }}" type="tel"
                  class="form-control">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('admin.user.role'):</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <select name="is_staff" id="is_staff" class="form-control">
                  <option value="0" @if ($viewData['user']->getIsStaff() == 0) selected @endif>@lang('admin.user.regular')</option>
                  <option value="1" @if ($viewData['user']->getIsStaff() == 1) selected @endif>@lang('admin.user.admin')</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">@lang('admin.user.edit')</button>
      </form>
    </div>
  </div>
@endsection
