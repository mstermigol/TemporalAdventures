<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <a href="{{ route('admin.review.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>{{ $viewData['reviewOfTitle']}}</h2>
            <p><strong>@lang('admin.review.title'):</strong> {{ $viewData['review']->getTitle() }}</p>
            <p><strong>@lang('admin.review.description'):</strong> {{ $viewData['review']->getDescription() }}</p>
            <p><strong>@lang('admin.review.rating'):</strong> {{ $viewData['review']->getRating() }}/5</p>
            <p><strong>@lang('admin.review.user'):</strong> {{ $viewData['userName']}}</p>
        </div>
    </div>
</div>
@endsection