<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Model\App\Models\OrderDetail;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'item_id',
        'order_date',
        'order_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}