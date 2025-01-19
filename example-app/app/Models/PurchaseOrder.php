<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['user_id', 'product_id', 'shipper_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'purchase_order_product')
            ->withPivot('quantity')  // Include the quantity field from the pivot table
            ->withTimestamps();
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }
}
