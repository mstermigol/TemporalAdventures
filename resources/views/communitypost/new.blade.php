<!-- Author: David Fonseca -->

@extends('layouts.app')
@section('title', 'Create Community Post')
@section('content')
    <section class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2>Create Community Post</h2>
                <form method="POST" action="{{ route('communityposts.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="date_of_event">Date of Event</label>
                        <input type="date" class="form-control" id="date_of_event" name="date_of_event" required>
                    </div>
                    <div class="form-group">
                        <label for="place_of_event">Place of Event</label>
                        <input type="text" class="form-control" id="place_of_event" name="place_of_event" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category->value }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
