<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * 商品一覧画面を表示
     * 
     * @return view
     */
    public function index()
    {
        $items = Item::Paginate(4);
        return view('item.index')->with('items',$items);
    }

    /**
     * 商品詳細画面を表示
     * @param int $id
     * @return view
     */
    public function detail(Request $request, $id)
    {
        $item = Item::find($id);

        return view('item.detail')->with('item',$item);
    }
}
