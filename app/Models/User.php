<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'postal_code',
        'prefecture',
        'city',
        'block',
        'buillding',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likeItems()
    {
        return $this->hasManyThrough(Item::class, Like::class);
    }

    public function orderItems()
    {
        return $this->hasManyThrough(OrderDetail::class, Order::class);
    }
    
    

    //お気に入り機能
    public function likes() {
        return $this->hasMany(Like::class);
    }



    /**
     * 投稿削除
     * @param $id
     *
     */
    public function userDelete($id)
    {


        try {
            // 削除
            User::destroy($id);
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
        }
    }

        /**
     * 投稿編集
     * @param $input
     *
     */
    public function upNewData($input)
    { 
        \DB::beginTransaction();
        try {
            // 登録
            $user = User::find($input['id']);
            $user->fill([
                'name' => $input['name'],
                'postal_code'=> $input['postal_code'],
                'prefecture'=> $input['prefecture'],
                'city' => $input['city'],
                'block' => $input['block'],
                'building'=> $input['building'],
                'phone'=> $input['phone'],
                'email'=>$input['email'], 
            ]);
            
            $user->save();
            
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
        }
        \DB::commit();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
