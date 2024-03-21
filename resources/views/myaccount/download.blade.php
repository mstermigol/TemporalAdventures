<!-- Author: Sergio Córdoba -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('app.order.temporal_adventures')</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .order-info,
    .billing-info,
    .itemized-list,
    .total-amount,
    .footer {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    .total-amount {
        font-weight: bold;
    }

    .footer {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h1>@lang('app.order.temporal_adventures')</h1>
    </div>

    <div class="order-info">
        <p><strong>@lang('app.order.order_number')</strong> {{ $order->getId() }}</p>
        <p><strong>@lang('app.order.date')</strong> {{ $order->getCreatedAt() }}</p>
    </div>

    <div class="billing-info">
        <p>
            <strong>@lang('app.order.billed_to')</strong>
        </p>
        <p>{{ Auth::getUser()->getName() }}</p>
    </div>

    <div class="itemized-list">
        <table>
            <thead>
                <tr>
                    <th>@lang('app.order.item_id')</th>
                    <th>@lang('app.order.travel_title')</th>
                    <th>@lang('app.order.price')</th>
                    <th>@lang('app.order.quantity')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->getItems() as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>{{ $item->getTravel()->getTitle() }}</td>
                    <td>{{ $item->getPrice() }}</td>
                    <td>{{ $item->getQuantity() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="total-amount">
        <p>@lang('app.order.total_amount') ${{ $order->getTotal() }}</p>
    </div>

    <div class="footer">
        <p>@lang('app.order.thanks')</p>
    </div>
</body>

</html>