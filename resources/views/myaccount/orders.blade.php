<!-- Author: Sergio Córdoba -->
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@include('partials.breadcrumbs', ['breadcrumbs' => $viewData['breadcrumbs']])
  @forelse ($viewData["orders"] as $order)
    <div class="card mb-4 mx-2">
      <div class="card-header">
        <strong>@lang('app.order.order') #{{ $order->getId() }}</strong>
      </div>
      <div class="card-body">
        <b>@lang('app.order.date')</b> {{ $order->getCreatedAt() }}<br />
        <b>@lang('app.order.total_amount')</b> ${{ $order->getTotal() }}<br />
        <table class="table table-bordered table-striped text-center mt-3">
          <thead>
            <tr>
              <th scope="col">@lang('app.order.item_id')</th>
              <th scope="col">@lang('app.order.travel_title')</th>
              <th scope="col">@lang('app.order.price')</th>
              <th scope="col">@lang('app.order.quantity')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->getItems() as $item)
              <tr>
                <td>{{ $item->getId() }}</td>
                <td>
                  <a class="link-success" href="{{ route('travel.show', ['id' => $item->getTravel()->getId()]) }}">
                    {{ $item->getTravel()->getTitle() }}
                  </a>
                </td>
                <td>${{ $item->getPrice() }}</td>
                <td>{{ $item->getQuantity() }}</td>
              </tr>
            @endforeach
            <br>
            <div class="d-flex flex-row">
                <form action="{{ route('order.download', ['id' => $order->id, 'format' => 'pdf']) }}" method="GET">
                @csrf
                <button class="btn bg-primary text-white mx-2" type="submit">@lang('app.order.download_order_pdf')</button>
                </form>
                <form action="{{ route('order.download', ['id' => $order->id, 'format' => 'png']) }}" method="GET">
                    @csrf
                    <button class="btn bg-primary text-white mx-2" type="submit">@lang('app.order.download_order_png')</button>
                </form>
            </div>
          </tbody>
        </table>
      </div>
    </div>
  @empty
    <div class="alert alert-danger" role="alert">
      @lang('app.order.no_order')
    </div>
  @endforelse
    <div class="mx-2">
        {{ $viewData['orders']->links() }}
    </div>


@endsection
