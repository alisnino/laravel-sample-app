<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseOrderSearchController;
use App\Http\Controllers\PurchaseOrderDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [PurchaseOrderSearchController::class, 'search'])->name('search');
Route::get('/purchases/{purchaseOrderId}', [PurchaseOrderDetailController::class, 'show'])->name('purchase_orders.show');
