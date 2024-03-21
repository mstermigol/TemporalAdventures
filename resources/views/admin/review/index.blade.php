<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.review.createTravel') }}" class="btn btn-success mx-1">
                <i class="fas fa-plus"></i> <span>@lang('admin.review.travel')</span>
            </a>
            <a href="{{ route('admin.review.createCommunityPost') }}" class="btn btn-success mx-1">
                <i class="fas fa-plus"></i> <span>@lang('admin.review.community_post')</span>
            </a>

        </div>
        @foreach($viewData['reviews'] as $review)
        <div class="col-md-4 mb-3">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">{{ $review->getTitle() }}</h5>
                    <p class="card-text">@if($review->getTravelId() !== null)
                        @lang('admin.review.travel')
                        @elseif($review->getCommunityPostId() !== null)
                        @lang('admin.review.community_post')
                        @endif
                    </p>
                    <div class="d-flex justify-content-end container-fluid">
                        <a href="{{ route('admin.review.show', ['id' => $review->getId()]) }}"
                            class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                        @if(Auth::user()->getId() === $review->getUserId())
                        <a href="{{ route('admin.review.edit', ['id' => $review->getId()]) }}"
                            class="btn btn-primary me-1"><i class="fas fa-pencil-alt"></i></a>
                        @endif
                        <form action="{{ route('admin.review.delete', $review->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-1"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection