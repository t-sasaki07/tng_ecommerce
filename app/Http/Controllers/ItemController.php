<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * トップページ下部にて商品ランダム表示
     * 
     * @return view
     */
    public function top()
    {
        $random_item1 = Item::inRandomOrder()->first();
        $random_item2 = Item::inRandomOrder()->first();
        $random_item3 = Item::inRandomOrder()->first();
        $random_item4 = Item::inRandomOrder()->first();

        return view('top',compact('random_item1',$random_item1, 'random_item2',$random_item2, 'random_item3',$random_item3, 'random_item4',$random_item4));
    }


    /**
     * 商品一覧画面を表示
     * 
     * @return view
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(6);
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
