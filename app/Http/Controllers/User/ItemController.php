<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Time;
use App\Like;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\TimeSaleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $time = Time::latest()->first();


        return view('userItem/index', ['items'=>$items, 'time'=>$time]);
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

        //タイムセール時の金額算出
        //定価
        $price = $item->price;
        //割引率
        $sale = $item->sale / 100;
        //割引後の値段
        $specialPrice = $price * $sale;

        return view('userItem/detail', ['item'=>$item, 'time'=>$time, '$specialPrice'=>$specialPrice]);
    }
}
