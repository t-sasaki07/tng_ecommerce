<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OrderDetail extends Model
{
    //
    protected $fillable = [
        'item_id',
        'order_id',
        'shipment_status_id',
        'order_quantity',
        'shipment_date',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
