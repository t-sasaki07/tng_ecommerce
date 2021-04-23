<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class ItemController extends Controller
{
    /**
     * 特定の商品情報変更ページの表示
     *
     * @param  int  $id
     * @return View
     */
    public function change($id)
    {
        return view('change', ['user' => User::findOrFail($id)]);
    }
}
