<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Purchase Orders</title>
</head>
<body>
    <h1>Search Purchase Orders</h1>

    <!-- Search Form -->
    <form action="/search" method="GET">
        <label for="user_id">Enter User ID:</label>
        <input type="text" id="user_id" name="user_id" value="{{ request('user_id') }}" required>
        <button type="submit">Search</button>
    </form>

    <!-- Search Results -->
    @if(request()->has('user_id'))
        <h2>Results for User ID: {{ request('user_id') }}</h2>

        @if($purchaseOrders->isEmpty())
            <p>No purchase orders found for this user.</p>
        @else
            <ul>
                @foreach($purchaseOrders as $order)
                    <li>
                        <a href="/purchases/{{ $order->id }}">Purchase Order #{{ $order->id }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</body>
</html>