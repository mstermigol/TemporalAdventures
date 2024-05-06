<!-- Author: Miguel Jaramillo -->

@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>@lang('admin.order.order')</th>
                    <th>@lang('admin.order.total')</th>
                    <th>@lang('admin.order.user')</th>
                    <th>@lang('admin.order.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['orders'] as $order)
                <tr>
                    <td>#{{ $order->getId() }}</td>
                    <td>${{ $order->getTotal() }}</td>
                    <td>{{ $order->getUser()->getName() }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.order.show', ['id' => $order->getId()]) }}"
                                class="btn btn-dark me-1"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.order.delete', $order->getId())}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-1" onclick="return confirm('{{$viewData['delete']}}')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
