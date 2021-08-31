<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Model\App\Models\Order;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'product_id',
        'order_id',
        'user_id',
        'shipment_status_id',
        'order_quantity',
        'shipment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
