<!-- Author: Sergio Córdoba -->
<head>
    <title>Temporal Adventures</title>
</head>
<body>
    <div class="invoice-header">
        <img src="" alt="Temporal Adventures Logo" style="width:60px;" class="rounded-pill">
        <h1>Order</h1>
    </div>
    
    <div class="order-info">
        <p>Order Number: {{ $order->getId() }}</p>
        <p>Date: {{ $order->getCreatedAt() }}</p>
        <!-- Add more order information here -->
    </div>
    
    <div class="billing-info">
        <p>Billed To:</p>
        <p>{{ Auth::user()->getName() }}</p>
        <!-- Add more billing information here -->
    </div>
    
    <div class="itemized-list">
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Travel Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
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
        <p>Total Amount: {{ $order->getTotal() }}</p>
        <!-- Add more total amount information here -->
    </div>
    
    <div class="footer">
        <p>Thank you for your business!</p>
        <!-- Add more footer information here -->
    </div>
</body>