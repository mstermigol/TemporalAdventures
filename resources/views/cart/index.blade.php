<!-- Author: Sergio Córdoba -->
@extends('layouts.app')
@section('title', trans('app.titles.cart_index'))
@section('content')
<div class="card"> 
    <div class="card-header"> 
        @lang('app.cart.travels') 
    </div> 
    <div class="card-body">
        @if(session('alert'))
            <div class="alert alert-{{ session('alert')['type'] }}">
                {{ session('alert')['message'] }}
            </div>
        @endif 
        <table class="table table-bordered table-striped text-center"> 
            <thead> 
                <tr> 
                    <th scope="col">@lang('app.cart.id')</th> 
                    <th scope="col">@lang('app.cart.name')</th> 
                    <th scope="col">@lang('app.cart.price')</th> 
                    <th scope="col">@lang('app.cart.quantity')</th> 
                </tr> 
            </thead> 
            <tbody> 
                @foreach ($viewData["travels"] as $travel) 
                    <tr> 
                        <td>{{ $travel->getId() }}</td> 
                        <td>{{ $travel->getTitle() }}</td> 
                        <td>${{ $travel->getPrice() }}</td> 
                        <td>{{ session('travels')[$travel->getId()] }}</td> 
                    </tr>
                @endforeach 
            </tbody> 
        </table> 
        <div class="row"> 
            <div class="text-end"> 
                <a class="btn btn-outline-secondary mb-2"><b>@lang('app.cart.total')</b> ${{ $viewData["total"] }}</a>
                @if(count($viewData['travels']) > 0) 
                <a href="{{ route('cart.purchase') }}"> 
                    <button class="btn bg-primary text-white mb-2"> 
                        @lang('app.cart.purchase') 
                    </button> 
                </a> 
                <a href="{{ route('cart.delete') }}"> 
                    <button class="btn btn-danger mb-2"> 
                        @lang('app.cart.remove') 
                    </button> 
                </a>
                @endif 
            </div> 
        </div> 
    </div> 
</div> 
@endsection
