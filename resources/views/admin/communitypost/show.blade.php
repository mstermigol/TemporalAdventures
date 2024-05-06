<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<a href="{{ route('admin.communitypost.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>{{ $viewData["communityPost"]->getUser()->getName() }}</h4>
    </div>
    @if($viewData["communityPost"]->getImage())
    <img src="{{ url("{$viewData["communityPost"]->getImage()}") }}" class="card-img rounded-0 border-bottom mx-auto">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $viewData["communityPost"]->getTitle() }}</h5>
        <p class="card-text">{!! $viewData["communityPost"]->getDescription() !!}</p>
    </div>
    <div class="card-footer text-muted">
        @lang('admin.community.posted_on') {{ $viewData["communityPost"]->getCreatedAt() }}
    </div>
</div>
@endsection