<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Item;
use App\Models\Like;
use App\Time;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\TimeSaleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * 商品一覧画面を表示
     *
     * @return view
     */
    public function article()
    {
        $items = Item::Paginate(4);
        return view('item.index')->with('items',$items);
    }

    /**
     * 商品詳細画面を表示
     * @param int $id
     * @return view
     */
    public function show(Request $request, $id)
    {
        // $item = Item::find($id);
        // $user = User::find($id);

        // return view('item.detail')->with('item',$item)->with('user',$user);

        $item = Item::find($id);
        if (!empty($item)) {
            $user = Auth::user();
            return view('item.detail', compact('item', 'user'));
        }
    }


    /**
     * 商品情報一覧ページの表示
     *
     *
     * @return View
     */
    public function index()
    {
        //商品情報の取得
        $items = Item::all();
        if (is_null($items)) {
            \Session::flash('err_msg', config('message.noData'));
            return redirect(route('item.index'));
        }
        $items = DB::table('items')->paginate(15);

        //タイムセール時刻の取得
        // $time = Time::first();

        //お気に入り機能
        $data = [];
        $like_model = new Like;
        $like_item = Item::withCount('likes')->first();

        $data = [
            'items' => $items,
            // 'time'=> $time,
            'like_model' => $like_model,
            'like_item' => $like_item,
        ];

        return view('/item/index', $data);
    }



    /**
     * 商品情報投稿ページの表示
     *
     *
     * @return View
     */
    public function register()
    {


        return view('admin.item_register');
    }


    /**
     * 商品情報を投稿する
     * @param request
     * @return view
     */
    public function itemPost(ItemRequest $request)
    {
        //データを受け取る
        $input = $request->all();

        //画像データ1~4の処理
        if($request->hasFile('img_1'))
        {
            $img_1 = $request->file('img_1')->store('public');
            $input['img_1'] = str_replace('public/','', $img_1);
        }

        if($request->hasFile('img_2'))
        {
            $img_2 = $request->file('img_2')->store('public');
            $input['img_2'] = str_replace('public/','', $img_2);
        }

        if($request->hasFile('img_3'))
        {
            $img_3 = $request->file('img_3')->store('public');
            $input['img_3'] = str_replace('public/','', $img_3);
        }

        if($request->hasFile('img_4'))
        {
            $img_4 = $request->file('img_4')->store('public');
            $input['img_4'] = str_replace('public/','', $img_4);
        }

        //DBへ登録する
        $item = new Item();
        $item->newSet($input);

        //フラッシュメッセージ表示
        \Session::flash('err_msg', config('message.complete'));

        //商品情報一覧ページへリダイレクト
        return redirect(route('itemIndex'));

    }



    /**
     * 特定の商品情報変更ページの表示
     *
     * @param  int  $id
     * @return View
     */
    public function change($id)
    {
        $items = Item::find($id);

        return view('itemChange', ['items' => $items]);
    }

    /**
     * 商品情報を変更する
     * @param request
     * @return view
     */
    public function itemChange(ItemRequest $request)
    {
        //データを受け取る
        $input = $request->all();

        //画像データ1~4の処理
        if($request->hasFile('img_1'))
        {
            $img_1 = $request->file('img_1')->store('public');
            $input['img_1'] = str_replace('public/','', $img_1);
        }

        if($request->hasFile('img_2'))
        {
            $img_2 = $request->file('img_2')->store('public');
            $input['img_2'] = str_replace('public/','', $img_2);
        }

        if($request->hasFile('img_3'))
        {
            $img_3 = $request->file('img_3')->store('public');
            $input['img_3'] = str_replace('public/','', $img_3);
        }

        if($request->hasFile('img_4'))
        {
            $img_4 = $request->file('img_4')->store('public');
            $input['img_4'] = str_replace('public/','', $img_4);
        }

        //DBへ登録する
        $item = new Item();
        $item->upNewData($input);

        //フラッシュメッセージ表示
        \Session::flash('err_msg', config('mssage.complete'));

        //商品情報一覧ページへリダイレクト
        return redirect(route('itemIndex'));

    }


    /**
     * 特定の商品情報ページの表示
     *
     * @param  int  $id
     * @return View
     */
    public function detail($id)
    {
        $item = Item::find($id);

        if (is_null($item)) {
            \Session::flash('err_msg', config('message.noData'));
            return redirect(route('itemIndex'));
        }

        return view('admin.item_detail_manage', ['item' => $item]);
    }

        /**
     * 商品情報の削除
     *
     * @param $id
     * @return View
     */
    public function itemDelete($id)
    {
        //データの有無を確認
        if(empty($id)) {
            \Session::flash('err_mesg', config('message.noData'));
            return redirect(route('itemIndex'));
        }

        //DBから削除
        $user = new Item();
        $user->dataDelete($id);

        //フラッシュメッセージを表示
        \Session::flash('err_msg', config('message.delete'));

        //ユーザー情報一覧ページへリダイレクト
        return redirect(route('itemIndex'));
    }

    /**
     * タイムセールの時間を設定する
     * @param $request
     * @return view
     */
    public function timesale(TimeSaleRequest $request)
    {
        $input = $request->all();

        $time = new Item();
        $time->newSet($input);

        return redirect(route('itemIndex'));
    }

    /**
     * お気に入り機能
     * @param $request
     * @return json
     */
    public function ajaxlike(LikeRequest $request)
    {
        $id = Auth::guard('user')->user()->id; //1.ログインユーザーのid取得
        $item_id = $request->item_id; //2.投稿idの取得
        $like = new Like;
        $item = Item::findOrFail($item_id);

        //お気に入りに既に追加している場合は、お気に入りを外す（レコードの削除）
        if ($like->like_exist($id, $item_id)) {
            $like = Like::where('item_id', $item_id)->where('user_id', $id)->delete();
        } else {
            //お気に入りに追加していない場合は、お気に入りへ入れる
            $like = new Like;
            $like->item_id = $request->item_id;
            $like->user_id = Auth::guard('user')->user()->id;
            $like->save();
        }

        $itemLikesCount = $item->loadCount('likes')->likes_count;

        $json = [
            'itemLikesCount' => $itemLikesCount,
        ];

        return response()->json($json);
    }


    /**
     * 各ページのリンク
     * @param
     * @return view
     */
    public function tentative()
    {
        return view('tentative');
    }
}
