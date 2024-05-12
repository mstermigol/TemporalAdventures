<!-- Author: Sergio Córdoba -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  <div class="card">
    <div class="card-header">
      @lang('app.cart.travels')
    </div>
    <div class="card-body">
      @if (session('alert'))
        <div class="alert alert-{{ session('alert')['type'] }}">
          {{ session('alert')['message'] }}
        </div>
      @endif
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th scope="col">@lang('app.cart.id')</th>
            <th scope="col">@lang('app.cart.name')</th>
            <th scope="col">@lang('app.cart.price')</th>
            <th scope="col">@lang('app.cart.quantity')</th>
            <th scope="col">@lang('app.cart.delete_item')</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($viewData['travels'] as $travel)
            <tr>
              <td>{{ $travel->getId() }}</td>
              <td>{{ $travel->getTitle() }}</td>
              <td>${{ $travel->getPrice() }}</td>
              <td>{{ session('travels')[$travel->getId()] }}</td>
              <td>
                <form method="POST" action="{{ route('cart.delete_item', ['id' => $travel->getId()]) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" title="@lang('app.cart.delete_item')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="text-end">
          <a class="btn btn-outline-secondary mb-2"><b>@lang('app.cart.total')</b> ${{ $viewData['total'] }}</a>
          @if (count($viewData['travels']) > 0)
            <a href="{{ route('cart.purchase') }}">
              <button class="btn bg-primary text-white mb-2">
                @lang('app.cart.purchase')
              </button>
            </a>
            <a href="{{ route('cart.delete') }}">
              <button class="btn btn-danger mb-2">
                @lang('app.cart.remove')
              </button>
            </a>

            {{ $viewData['travels']->onEachSide(1)->links() }}

          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
