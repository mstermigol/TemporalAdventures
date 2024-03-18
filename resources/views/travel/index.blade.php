<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <section class="container my-5">
        <ul class="row list-unstyled align-items-stretch">
            @foreach ($viewData["travels"] as $travel)
                <li class="col-md-4 col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ url("/images{$travel->getImage()}") }}" class="card-img-top">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$travel->getTitle()}}</h5>
                            <p class="card-text">{{$travel->getDescription()}}</p>
                            <a href="{{ route('travel.show', ['id'=> $travel->getId()]) }}"
                               class="btn btn-primary mt-auto d-inline travel-button">
                               @lang('app.content_travels.see_more')
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
