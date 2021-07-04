<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $table = 'timesale';

    protected $fillable = [
        'start',
        'finish'

    ];

    /**
     * 最新のカラム自動削除
     * @param $id
     *
     */
    public function timeDelete($id)
    {
        try {
            // 削除
            Time::destroy($id);
        } catch (\Throwable $e) {
            report($e);
            abort(500);
        }
    }
    
}
