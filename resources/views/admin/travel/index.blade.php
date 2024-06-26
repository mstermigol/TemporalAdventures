<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.travel.create') }}" class="btn btn-success" title="@lang('admin.travel.create_travel')">
      <i class="fas fa-plus"></i> @lang('admin.travel.create_travel')
    </a>
  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>@lang('admin.travel.table_title')</th>
          <th>@lang('admin.travel.table_actions')</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($viewData['travels'] as $travel)
          <tr>
            <td>{{ $travel->getTitle() }}</td>
            <td>
              <div class="d-flex">
                <a href="{{ route('admin.travel.show', $travel->getId()) }}" class="btn btn-dark me-1"><i
                    class="fas fa-eye"></i></a>

                <a href="{{ route('admin.travel.edit', $travel->getId()) }}" class="btn btn-primary me-1"><i
                    class="fas fa-pencil-alt"></i></a>

                <form action="{{ route('admin.travel.delete', $travel->getId()) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger me-1"
                    onclick="return confirm('{{ $viewData['delete'] }}')"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <div class="alert alert-danger" role="alert">
            @lang('admin.travel.empty')
          </div>
        @endforelse
      </tbody>
    </table>
    {{ $viewData['travels']->links() }}
  </div>
@endsection
