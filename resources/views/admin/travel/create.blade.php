<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<section class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a href="{{ route('admin.travel.index') }}" class="btn btn-primary mb-3"><i
                    class="fas fa-arrow-left"></i></a>
            <h2>Create travel</h2>
            <form method="POST" action="{{ route('admin.travel.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">@lang('admin.travel.title')</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">@lang('admin.travel.description')</label>
                    <textarea class="form-control custom-height-300" id="description" name="description" rows="3"
                        required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="place">@lang('admin.travel.place')</label>
                    <input type="text" class="form-control" id="place" name="place" required>
                </div>
                <div class="form-group mb-3">
                    <label for="date_of_destination">@lang('admin.date_of_destination.place')</label>
                    <input type="date" class="form-control" id="date_of_destination" name="date_of_destination" required>
                </div>
                <div class="form-group">
                    <label for="price">@lang('admin.travel.price')</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group mb-3">
                    <label for="start_date">@lang('admin.travel.start_date')</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group mb-3">
                    <label for="end_date">@lang('admin.travel.end_date')</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="form-group mb-3">
                    <label for="image">@lang('admin.travel.image')</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="form-group mb-4">
                    <label for="category">@lang('admin.travel.category')</label>
                    <select class="form-control" id="category" name="category">
                        @foreach ($viewData['categories'] as $category)
                        <option value="{{ $category->value }}">{{ $category->value }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">@lang('admin.travel.submit')</button>
            </form>
        </div>
    </div>
</section>
@endsection