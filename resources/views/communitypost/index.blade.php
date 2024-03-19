<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <section class="container my-5">
        <div class="row">
        <div class="p-3 w-75 mx-auto d-flex justify-content-between align-items-center">
        @if(count($viewData['topThreePosts']) > 0)
                <h1 class="text-uppercase">@lang('app.content_community.top_three')</h1>
            @endif
                @if(auth()->check())
                <a href="{{ route('communitypost.create') }}" class="btn btn-success" title="@lang('app.content_community.create_post')">
                    <i class="fas fa-plus"></i> @lang('app.content_community.create_post')
                </a>
                @endif
            </div>

            @foreach ($viewData["topThreePosts"] as $post)
                <div class="col-12 mb-4 w-75 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ $post->getUser()->getName() }}</h4>
                            <!-- Delete post button-->
                            @if (auth()->check() && auth()->user()->getId() === $post->getUser()->getId())
                                <form method="POST" action="{{ route('communitypost.delete', $post->getId()) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="@lang('app.content_community.delete_review')" onclick="return confirm(trans('app.content_community.are_you_sure'))">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @if($post->getImage())
                            <img src="{{ url($post->getImage()) }}" class="card-img rounded-0 border-bottom mx-auto">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->getTitle() }}</h5>
                            <p class="card-text">{!! $post->getDescription() !!}</p>
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
                            <!-- Delete post button-->
                            @if (auth()->check() && auth()->user()->getId() === $post->getUser()->getId())
                                <form method="POST" action="{{ route('communitypost.delete', $post->getId()) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="@lang('app.content_community.delete_review')" onclick="return confirm(trans('app.content_community.are_you_sure'))">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @if($post->getImage())
                            <img src="{{ url($post->getImage()) }}" class="card-img rounded-0 border-bottom mx-auto">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->getTitle() }}</h5>
                            <p class="card-text">{!! $post->getDescription() !!}</p>
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
    </section>
@endsection
