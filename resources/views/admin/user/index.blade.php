<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </div>
        @foreach($viewData['users'] as $user)
        <div class="col-md-4 mb-3">
            <div class="card">
            
                <div class="card-body">
                    <h5 class="card-title">{{ $user->getName() }}</h5>
                    <p class="card-text">{{ $user->getIsStaff() ? trans('admin.user.admin') : trans('admin.user.regular') }}</p>
                    <div class="d-flex justify-content-end container-fluid">
                        <a href="{{ route('admin.user.show', ['id'=> $user->getId()]) }}" class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.user.edit', ['id'=> $user->getId()]) }}" class="btn btn-primary me-1"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.user.delete', $user->getId())}}" method="POST">
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

