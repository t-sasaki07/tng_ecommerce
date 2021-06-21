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
     * @param $inputs
     *
     */
    public function upNewDate($inputs)
    {

        \DB::beginTransaction();
        try {
            // 登録
            $item = Item::find($inputs['id']);
            $item->fill([
                'name' => $inputs['name'],
                'price' => $inputs['price'],
                'comment' => $inputs['comment'],
                'stock' => $inputs['stock'],
                'img_1' => $inputs['img_1'],
                'img_2' => $inputs['img_2'],
                'img_3' => $inputs['img_3'],
                'img_4' => $inputs['img_4'],
            ]);
            $item->save();
        } catch (\Throwable $e) {
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
