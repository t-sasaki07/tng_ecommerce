<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Item;

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
        $items = Item::find($id);

        return view('change', ['items' => $items]);
    }

    /**
     * 特定の商品情報ページの表示
     *
     * @param  int  $id
     * @return View
     */
    public function detail($id)
    {
        $items = Item::find($id);

        return view('detail', ['items' => $items]);
    }

    /**
     * 商品情報一覧ページの表示
     *
     *
     * @return View
     */
    public function index()
    {
        $items = Item::all();

        return view('index', ['items' => $items]);
    }

     /**
     * 商品情報投稿ページの表示
     *
     *
     * @return View
     */
    public function register()
    {


        return view('register');
    }



}
