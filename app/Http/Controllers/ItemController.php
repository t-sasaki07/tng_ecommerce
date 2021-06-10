<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * 商品一覧画面を表示
     * 
     * @return view
     */
    public function index()
    {
        return view('item.index');
    }
}
