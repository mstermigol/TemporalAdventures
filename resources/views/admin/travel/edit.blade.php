<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
  <div class="container my-5">
    <a href="{{ route('admin.travel.index') }}" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i></a>
    <h1>@lang('admin.travel.edit_travel')</h1>
    <form action="{{ route('admin.travel.update', $viewData['travel']->getId()) }}" method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">@lang('admin.travel.title')</label>
        <input type="text" class="form-control" id="title" name="title"
          value="{{ $viewData['travel']->getTitle() }}" required>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">@lang('admin.travel.description')</label>
        <textarea class="form-control custom-height-300" id="description" name="description" rows="3" required>{{ $viewData['travel']->getDescription() }}</textarea>
      </div>

      <div class="mb-3">
        <label for="place" class="form-label">@lang('admin.travel.place')</label>
        <input type="text" class="form-control" id="place" name="place"
          value="{{ $viewData['travel']->getPlace() }}" required>
      </div>

      <div class="mb-3">
        <label for="date_of_destination" class="form-label">@lang('admin.travel.date_of_destination')</label>
        <input type="date" class="form-control" id="date_of_destination" name="date_of_destination"
          value="{{ $viewData['travel']->getDateOfDestination() }}" required>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">@lang('admin.travel.price')</label>
        <input type="number" class="form-control" id="price" name="price"
          value="{{ $viewData['travel']->getPrice() }}" required>
      </div>

      <div class="mb-3">
        <label for="start_date" class="form-label">@lang('admin.travel.start_date')</label>
        <input type="date" class="form-control" id="start_date" name="start_date"
          value="{{ $viewData['travel']->getStartDate() }}" required>
      </div>

      <div class="mb-3">
        <label for="end_date" class="form-label">@lang('admin.travel.end_date')</label>
        <input type="date" class="form-control" id="end_date" name="end_date"
          value="{{ $viewData['travel']->getEndDate() }}" required>
      </div>



      <div class="mb-3">
        <label for="image" class="form-label">@lang('admin.travel.travel_image')</label>
        <div class="mb-2">
          <img src="{{ $viewData['travel']->getImage() }}" alt="Current Image img-edit">
        </div>
        <input type="file" class="form-control" id="image" name="image">
        <div class="form-text">@lang('admin.travel.change_travel_image')</div>
      </div>




      <div class="mb-3">
        <label for="category" class="form-label">@lang('admin.travel.category')</label>
        <select class="form-select" id="category" name="category">
          @foreach ($viewData['categories'] as $category)
            <option value="{{ $category->value }}"
              {{ $viewData['travel']->getCategory() === $category->value ? 'selected' : '' }}>
              {{ $category->value }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">@lang('admin.travel.update_travel')</button>
    </form>
  </div>
@endsection
