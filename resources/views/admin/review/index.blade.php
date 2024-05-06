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
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['reviews'] as $review)
                <tr>
                    <td>{{ $review->getTitle() }}</td>
                    <td>
                        @if($review->getTravelId() !== null)
                            @lang('admin.review.travel')
                        @elseif($review->getCommunityPostId() !== null)
                            @lang('admin.review.community_post')
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.review.show', ['id' => $review->getId()]) }}"
                                class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                            @if(Auth::user()->getId() === $review->getUserId())
                            <a href="{{ route('admin.review.edit', ['id' => $review->getId()]) }}"
                                class="btn btn-primary me-1"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                            <form action="{{ route('admin.review.delete', $review->getId())}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-1" onclick="return confirm('{{$viewData['delete']}}')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
