<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    //
    protected $table = 'likes';

    //お気に入りしているユーザー
    public function user() {
        return $this->belongsTo(User::class);
    }

    //お気に入りしている商品
    public function item() {
        return $this->belongTo(Item::class);
    }

    //既にお気に入りに入れているかを確認
    public function like_exist($id, $item_id) {
        $exist = Like::where('user_id', '=', $id)->where('item_id', '=', $item_id)->get();

        if(!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
}
