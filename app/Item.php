<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * モデルに関連したテーブル
     *
     * @var string
     *
     */
    protected $table = 'items';

    protected $fiilable = [
        'name',
        'price',
        'comment',
        'stock',
        'time_sale',
        'img_1',
        'img_2',
        'img_3',
        'img_4',

    ];
}
