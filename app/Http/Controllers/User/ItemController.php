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
        return view('userItem/index')->with('items',$items);
    }

    /**
     * 商品詳細画面を表示
     * @param int $id
     * @return view
     */
    public function detail($id)
    {
        $item = Item::find($id);

        return view('userItem/detail')->with('item',$item);
    }
}
