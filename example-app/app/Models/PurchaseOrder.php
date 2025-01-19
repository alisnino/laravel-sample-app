<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['user_id', 'shipper_id', 'order_date'];

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
