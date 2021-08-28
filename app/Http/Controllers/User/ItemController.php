<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Time;
use App\Models\Like;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\TimeSaleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $time = Time::latest()->first();

        //お気に入り機能
        $data = [];
        $like_model = new Like;
        $like_item = Item::withCount('likes')->first();

        //変数まとめ
        $data = [
            'items'=>$items,
            'time'=>$time,
            'like_model' => $like_model,
            'like_item' => $like_item,

        ];

        return view('item/index', $data);
    }

    /**
     * 商品詳細画面を表示
     * @param int $id
     * @return view
     */
    public function detail($id)
    {
        $item = Item::find($id);
        $time = Time::latest()->first();
        $user = Auth::guard('user')->user();

        //タイムセール時の金額算出
        //定価
        $price = $item->price;
        //割引率
        $sale = $item->sale / 100;
        //割引後の値段
        $specialPrice = $price * $sale;

        //お気に入り機能
        $data = [];
        $like_model = new Like;
        $like_item = Item::withCount('likes')->first();

        //変数まとめ
        $data = [
            'item'=>$item,
            'time'=>$time,
            'user'=>$user,
            'like_model' => $like_model,
            'like_item' => $like_item,
            '$specialPrice' => $specialPrice

        ];

        return view('item/detail', $data);
    }
}
