<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <section class="container my-5">
        <div class="row">
        <!-- Sección de título-->
            <div class="p-3 w-75 mx-auto d-flex justify-content-between align-items-center">
                <h1 class="text-uppercase">@lang('app.content_community.community')</h1>
                <a href="{{ route('communityposts.new') }}" class="btn btn-success" title="Crear Community Post">
                    <i class="fas fa-plus"></i> Crear Community Post
                </a>
            </div>
            <!-- Sección de los posts-->
            @foreach ($viewData["posts"] as $post)
                <div class="col-12 mb-4 w-75 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ $post->getUser()->name }}</h4>
                            <!-- Botón de eliminar post-->
                            @if (auth()->check() && auth()->user()->id === $post->user_id)
                                <form method="POST" action="{{ route('communityposts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Eliminar Post">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @if($post->getImage())
                            <img src="{{ url($post->image) }}" class="card-img-top w-75 mx-auto">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->getTitle() }}</h5>
                            <p class="card-text">{!! $post->getDescription() !!}</p>
                            <a href="{{ route('communityposts.show', ['id' => $post->getId()]) }}" class="btn btn-primary">
                                <i class="fa fa-comments"></i>
                                @lang('app.content_community.reviews')
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $post->getCreatedAt()}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
