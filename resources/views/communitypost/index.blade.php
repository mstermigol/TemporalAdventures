<!-- Authors: David Fonseca and Miguel Jaramillo -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="container mb-5">
    <div class="row">
        <div class="p-3 w-75 mx-auto d-flex justify-content-between align-items-center">
            <!-- Top three-->
            @if(count($viewData['topThree']) > 0)
            <h1 class="text-uppercase">@lang('app.content_community.top_three')</h1>
            @endif
            @if(Auth::check())
            <a href="{{ route('communitypost.create') }}" class="btn btn-success"
                title="@lang('app.content_community.create_post')">
                <i class="fas fa-plus"></i> @lang('app.content_community.create_post')
            </a>
            @endif
        </div>

        @foreach ($viewData["topThree"] as $post)
        <div class="col-12 mb-4 w-75 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $post->getUser()->getName() }}</h4>
                    <!-- Delete and edit post button-->
                    @if (Auth::check() && Auth::getUser()->getId() === $post->getUser()->getId())
                    <div class="d-flex justify-content-between">
                        <form method="POST" action="{{ route('communitypost.delete', $post->getId()) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2"
                                title="@lang('app.content_community.delete_post')"
                                onclick="return confirm(trans('app.content_community.are_you_sure'))">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <form method="GET" action="{{ route('communitypost.edit', $post->getId()) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-2"
                                title="@lang('app.content_community.edit_post')"
                                onclick="return confirm(trans('app.content_community.are_you_sure'))">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @if($post->getImage())
                <img src="{{ url($post->getImage()) }}" class="card-img rounded-0 border-bottom mx-auto">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->getTitle() }}</h5>
                    <p class="card-text text-truncate no-margin" id="top-description-{{ $post->getId() }}">{!! $post->getDescription() !!}</p>
                    <p class="see-more" data-post-id="top-{{ $post->getId() }}" data-more="@lang('app.content_community.see_more_suspense')" data-less="@lang('app.content_community.see_less')">
                        @lang('app.content_community.see_more_suspense')
                    </p>
                    <a href="{{ route('communitypost.show', ['id' => $post->getId()]) }}" class="btn btn-primary">
                        <i class="fa fa-comments"></i>
                        @lang('app.content_community.reviews')
                    </a>
                </div>
                <div class="card-footer text-muted">
                    @lang('app.content_community.posted_on') {{ $post->getCreatedAt()}}
                </div>
            </div>
        </div>
        @endforeach
        <!-- Title section-->
        <div class="p-3 w-75 mx-auto d-flex justify-content-between align-items-center">
            <h1 class="text-uppercase">@lang('app.content_community.community')</h1>
        </div>
        <!-- Posts section-->
        @foreach ($viewData["posts"] as $post)
        <div class="col-12 mb-4 w-75 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $post->getUser()->getName() }}</h4>
                    <!-- Delete and edit post button-->
                    @if (Auth::check() && Auth::getUser()->getId() === $post->getUser()->getId())
                    <div class="d-flex justify-content-between">
                        <form method="POST" action="{{ route('communitypost.delete', $post->getId()) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2"
                                title="@lang('app.content_community.delete_post')"
                                onclick="return confirm('{{$viewData['delete']}}')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <form method="GET" action="{{ route('communitypost.edit', $post->getId()) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-2"
                                title="@lang('app.content_community.edit_post')"
                                onclick="return confirm(trans('app.content_community.are_you_sure'))">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @if($post->getImage())
                <img src="{{ url($post->getImage()) }}" class="card-img rounded-0 border-bottom mx-auto">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->getTitle() }}</h5>
                    <p class="card-text text-truncate no-margin" id="description-{{ $post->getId() }}">{!! $post->getDescription() !!}</p>
                    <p class="see-more" data-post-id="{{ $post->getId() }}" data-more="@lang('app.content_community.see_more_suspense')" data-less="@lang('app.content_community.see_less')">
                        @lang('app.content_community.see_more_suspense')
                    </p>
                    <a href="{{ route('communitypost.show', ['id' => $post->getId()]) }}" class="btn btn-primary">
                        <i class="fa fa-comments"></i>
                        @lang('app.content_community.reviews')
                    </a>
                </div>
                <div class="card-footer text-muted">
                    @lang('app.content_community.posted_on') {{ $post->getCreatedAt()}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-3 w-75 mx-auto">
        {{ $viewData['posts']->onEachSide(1)->links() }}
    </div>
</section>
<script src="{{ asset('/js/app.js') }}"></script>
@endsection
