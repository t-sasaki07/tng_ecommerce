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

    protected $fillable = [
        'id',
        'name',
        'price',
        'comment',
        'stock',
        'sale',
        'img_1',
        'img_2',
        'img_3',
        'img_4',

    ];

    public function user() {
        return $this->belongTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }


    /**
     * 新規投稿
     *@param $input
     *
     */
    public function newSet($input)
    {
        \DB::beginTransaction();
        try {
            // 登録
            Item::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
            session()->flash('err_msg', '更新が失敗しました');

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
            $item = Item::find($input['id']);
            $item->fill([
                'name' => $input['name'],
                'price' => $input['price'],
                'comment' => $input['comment'],
                'stock' => $input['stock'],
                'sale' => $input['sale'],
            ]);

            //画像の登録処理
            if (!empty($input['img_1'])) 
            {
                $item->img_1 = $input['img_1'];
            }
            if (!empty($input['img_2'])) 
            {
                $item->img_1 = $input['img_2'];
            }
            if (!empty($input['img_3'])) 
            {
                $item->img_1 = $input['img_3'];
            }
            if (!empty($input['img_4'])) 
            {
                $item->img_1 = $input['img_4'];
            }

            $item->save();
            
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
        }
        \DB::commit();
    }

    /**
     * 投稿削除
     * @param $id
     *
     */
    public function dataDelete($id)
    {


        try {
            // 削除
            Item::destroy($id);
        } catch (\Throwable $e) {
            abort(500);
        }
    }


}
