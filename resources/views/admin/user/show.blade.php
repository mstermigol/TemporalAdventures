<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
<a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>{{ $viewData['user']->getName() }}</h2>
            <p><strong>@lang('admin.user.email'):</strong> {{ $viewData['user']->getEmail() }}</p>
            <p><strong>@lang('admin.user.phone_number'):</strong> {{ $viewData['user']->getPhoneNumber() }}</p>
            <p><strong>@lang('admin.user.role'):</strong> {{ $viewData['user']->getIsStaff() ? trans('admin.user.admin') : trans('admin.user.regular') }}</p>
        </div>
    </div>
</div>
@endsection