<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
            <form action="{{ route('admin.user.save') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('admin.user.name')</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">@lang('admin.user.email')</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">@lang('admin.user.password')</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="balance" class="form-label">@lang('admin.user.balance')</label>
                    <input type="number" class="form-control" id="balance" name="balance" required>
                </div>
                <div class="mb-3">
                    <label for="is_staff" class="form-label">@lang('admin.user.role')</label>
                    <select class="form-select" id="is_staff" name="is_staff" required>
                        <option value="0">@lang('admin.user.regular')</option>
                        <option value="1">@lang('admin.user.admin')</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">@lang('admin.user.phone_number')</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                </div>
                <button type="submit" class="btn btn-primary">@lang('admin.user.create_user')</button>
            </form>
        </div>
    </div>
</div>
@endsection