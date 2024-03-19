<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <a href="{{ route('admin.order.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>@lang('admin.order.order') #{{ $viewData['order']->getId() }}</h2>
            <p><strong>@lang('admin.order.total'):</strong> {{ $viewData['order']->getTotal() }}</p>
            <p><strong>@lang('admin.order.user'):</strong> {{ $viewData['order']->getUser()->getName() }}</p>
        </div>
    </div>
</div>
@endsection