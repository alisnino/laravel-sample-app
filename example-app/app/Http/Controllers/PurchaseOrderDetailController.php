<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;

class PurchaseOrderDetailController extends Controller
{
    public function show($purchaseOrderId)
    {
        // Retrieve the purchase order with its related products
        $purchaseOrder = PurchaseOrder::with('product')
            ->findOrFail($purchaseOrderId);

        // Pass the purchase order details to the view
        return view('purchase_order_detail', compact('purchaseOrder'));
    }
}
