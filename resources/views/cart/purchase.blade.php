<!-- Author: Sergio Córdoba -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="card">
    <div class="card-header">
        @lang('app.purchase.completed')
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            @lang('app.purchase.congratulations') <b>#{{ $viewData["order"]->getId() }}</b>
        </div>
    </div>
</div>
@endsection