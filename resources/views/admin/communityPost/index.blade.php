<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.communitypost.create') }}" class="btn btn-success"
        title="@lang('admin.community.create_post')">
        <i class="fas fa-plus"></i> @lang('admin.community.create_post')
    </a>
</div>
<div class="container">
    <div class="row">
        @foreach ($viewData["posts"] as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $post->getUser()->getName() }}</h4>
                    <!-- Delete and edit post button-->

                    <div class="d-flex">
                        <form method="GET" action="{{ route('admin.communitypost.show', ['id' => $post->getId()]) }}">
                            @csrf
                            <button type="submit" class="btn btn-dark ms-2" title="hola">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                        </form>
                        @if (Auth::check() && Auth::getUser()->getId() === $post->getUser()->getId())
                        <form method="GET" action="{{ route('admin.communitypost.edit', $post->getId()) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-2"
                                title="@lang('admin.community.edit_post')"
                                onclick="return confirm(trans('admin.community.are_you_sure'))">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.communitypost.delete', $post->getId()) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2" title="@lang('admin.community.delete_post')"
                            onclick="return confirm('{{$viewData['delete']}}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                @if($post->getImage())
                <img src="{{ url($post->getImage()) }}" class="card-img rounded-0 border-bottom mx-auto">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->getTitle() }}</h5>
                    <p class="card-text">{!! $post->getDescription() !!}</p>
                </div>
                <div class="card-footer text-muted">
                    @lang('admin.community.posted_on') {{ $post->getCreatedAt()}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection