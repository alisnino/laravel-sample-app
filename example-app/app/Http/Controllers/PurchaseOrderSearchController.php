<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderSearchController extends Controller
{
    public function search(Request $request)
    {
        $purchaseOrders = [];

        if ($request->has('user_id')) {
            $request->validate([
                'user_id' => 'required|integer',
            ]);

            // Fetch purchase orders for the given user ID
            $purchaseOrders = PurchaseOrder::where('user_id', $request->user_id)->get();
        }

        return view('search', compact('purchaseOrders'));
    }
}
