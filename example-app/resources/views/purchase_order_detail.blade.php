<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Purchase Order Details</h1>

        <!-- Display Purchase Order Details -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold">Purchase Order #{{ $purchaseOrder->id }}</h2>
            <p><strong>User ID:</strong> {{ $purchaseOrder->user_id }}</p>
            <p><strong>Shipper:</strong> {{ $purchaseOrder->shipper->name }}</p>
            <p><strong>Order Date:</strong> {{ $purchaseOrder->order_date }}</p>

            <h3 class="mt-4 text-lg font-semibold">Products</h3>
            @if ($purchaseOrder->product->isNotEmpty())
                <ul>
                    @foreach ($purchaseOrder->product as $product)
                        <li>
                            <strong>{{ $product->name }}</strong> - Quantity: {{ $product->pivot->quantity }} - Price: ¥{{ $product->price }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No products found for this purchase order.</p>
            @endif
        </div>

        <a href="{{ route('search') }}" class="text-blue-500">Back to Search</a>
    </div>
</body>
</html>
