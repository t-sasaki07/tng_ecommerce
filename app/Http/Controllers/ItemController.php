<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Item;
use App\Time;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    /**
     * 商品情報一覧ページの表示
     *
     *
     * @return View
     */
    public function index()
    {
        $items = Item::all();

        if (is_null($items)) {
            \Session::flash('err_msg', config('message.noData'));
            return redirect(route('itemIndex'));
        }

        $items = DB::table('items')->paginate(15);

        return view('/itemIndexManage', ['items' => $items]);
    }



     /**
     * 商品情報投稿ページの表示
     *
     *
     * @return View
     */
    public function register()
    {


        return view('itemRegister');
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
        $img_1 = $request->file('img_1')->store('public');
        $input['img_1'] = str_replace('public/','', $img_1);

        $img_2 = $request->file('img_2')->store('public');
        $input['img_2'] = str_replace('public/','', $img_2);

        $img_3 = $request->file('img_3')->store('public');
        $input['img_3'] = str_replace('public/','', $img_3);

        $img_4 = $request->file('img_4')->store('public');
        $input['img_4'] = str_replace('public/','', $img_4);

        //DBへ登録する
        $item = new Item();
        $item->newSet($input);

        //フラッシュメッセージ表示
        \Session::flash('err_msg', config('mssage.complete'));

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
        $img_1 = $request->file('img_1')->store('public');
        $input['img_1'] = str_replace('public/','', $img_1);

        $img_2 = $request->file('img_2')->store('public');
        $input['img_2'] = str_replace('public/','', $img_2);

        $img_3 = $request->file('img_3')->store('public');
        $input['img_3'] = str_replace('public/','', $img_3);

        $img_4 = $request->file('img_4')->store('public');
        $input['img_4'] = str_replace('public/','', $img_4);

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

        return view('itemDetailManage', ['item' => $item]);
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
    public function timesale($request)
    {
        $input = $request->all();

        $time = new Item();
        $time->newSet($input);

        return view('itemIndex');
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
