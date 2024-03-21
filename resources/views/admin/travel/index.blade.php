<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.travel.create') }}" class="btn btn-success"
        title="@lang('admin.travel.create_travel')">
        <i class="fas fa-plus"></i> @lang('admin.travel.create_travel')
    </a>
</div>
<ul class="row list-unstyled align-items-stretch">
    @foreach ($viewData["travels"] as $travel)
    <li class="col-md-4 col-lg-4 mb-4">
        <div class="card h-100">
            <img src="{{ url("{$travel->getImage()}") }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{$travel->getTitle()}}</h5>
                <p class="card-text">{{$travel->getDescription()}}</p>
                <div class="d-flex justify-content-end container-fluid">
                <a href="{{ route('admin.travel.show', $travel->getId()) }}"
                            class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                        
                        <a href="{{ route('admin.travel.edit', $travel->getId()) }}"
                            class="btn btn-primary me-1"><i class="fas fa-pencil-alt"></i></a>
                        
                        <form action="{{ route('admin.travel.delete', $travel->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-1"><i class="fas fa-trash-alt"></i></button>
                        </form>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>
@endsection
