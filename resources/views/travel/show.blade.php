<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <section class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ url("/images{$viewData["travel"]->getImage()}") }}" class="img-fluid rounded-3">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $viewData["travel"]->getTitle() }}
                    </h4>
                    <p class="card-text">
                        @lang('app.content_travels.description'): {{ $viewData["travel"]->getDescription() }}<br>
                        @lang('app.content_travels.start'): {{ $viewData["travel"]->getStartDate() }}<br>
                        @lang('app.content_travels.end'): {{ $viewData["travel"]->getEndDate() }}<br>
                        <b>@lang('app.content_travels.category'):</b> {{ $viewData["travel"]->getCategory() }}<br>
                        @lang('app.content_travels.price'): <b>{{ $viewData["travel"]->getPrice() }}$</b>
                    </p>
                    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['travel']->getId()]) }}"> 
                        <div class="row"> 
                            @csrf 
                            <div class="col-auto"> 
                                <div class="input-group col-auto"> 
                                <div class="input-group-text">@lang('app.content_travels.quantity')</div> 
                                <input type="number" min="1" class="form-control quantity-input" name="quantity" value="1"> 
                                </div> 
                            </div> 
                            <div class="col-auto"> 
                                <button class="btn bg-primary text-white" type="submit">@lang('app.content_travels.add_to_cart')</button> 
                            </div> 
                        </div> 
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
