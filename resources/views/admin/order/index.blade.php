<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        @foreach($viewData['orders'] as $order)
        <div class="col-md-4 mb-3">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">@lang('admin.order.order')# {{ $order->getId() }}</h5>
                    <p class="card-text">@lang('admin.order.total'): ${{ $order->getTotal() }}</p>
                    <p class="card-text">@lang('admin.order.user'): {{ $order->getUser()->getName() }}</p>
                    <div class="d-flex justify-content-end container-fluid">
                        <a href="{{ route('admin.order.show', ['id' => $order->getId()]) }}"
                            class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.order.delete', $order->getId())}}" method="POST">
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