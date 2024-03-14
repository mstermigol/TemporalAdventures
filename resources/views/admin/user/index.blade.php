@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        @foreach($viewData['users'] as $user)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->getName() }}</h5>
                    <p class="card-text">{{ $user->getIsStaff() ? trans('admin.user.admin') : trans('admin.user.regular') }}</p>
                    <div class="d-flex justify-content-end container-fluid">
                        <a href="#eye" class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                        <a href="#pencil" class="btn btn-primary me-1"><i class="fas fa-pencil-alt"></i></a>
                        <form action="#borrar" method="POST">
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

