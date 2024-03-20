<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', 'Create Community Post')
@section('content')
<section class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>@lang('app.content_community.create_post')</h2>
            <form method="POST" action="{{ route('communityposts.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">@lang('app.content_community.title')</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">@lang('app.content_community.description')</label>
                    <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image">@lang('app.content_community.image')</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group mb-3">
                    <label for="date_of_event">@lang('app.content_community.date_of_event')</label>
                    <input type="date" class="form-control" id="date_of_event" name="date_of_event" required>
                </div>
                <div class="form-group mb-3">
                    <label for="place_of_event">@lang('app.content_community.place_of_event')</label>
                    <input type="text" class="form-control" id="place_of_event" name="place_of_event" required>
                </div>
                <div class="form-group mb-4">
                    <label for="category">@lang('app.content_community.category')</label>
                    <select class="form-control" id="category" name="category">
                        @foreach ($viewData['categories'] as $category)
                            <option value="{{ $category->value }}">{{ $category->value }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">@lang('app.content_community.submit')</button>
            </form>
        </div>
    </div>
</section>
@endsection
