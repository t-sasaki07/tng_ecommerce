<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'postal_code',
        'prefecture',
        'city',
        'block',
        'building',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function items()
    // {
    //     return $this->hasMany(Item::class);
    // }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function likeItems()
    {
        return $this->hasManyThrough(Item::class, Like::class);
    }

    public function orderItems()
    {
        return $this->hasManyThrough(OrderDetail::class, Order::class);
    }
}
