<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'customer_name', 'customer_address', 'customer_phone', 'quantity', 'total_price',
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

