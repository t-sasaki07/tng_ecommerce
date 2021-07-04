<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Item;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\TimeSaleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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
        //管理者ログイン済でなければトップページへ遷移させる
        if (Auth::guard('admin')->check() == false ) {
            return redirect (route('/'));
        }

        //商品情報の取得
        $items = Item::all();
        if (is_null($items)) {
            \Session::flash('err_msg', config('message.noData'));
            return redirect(route('itemIndex'));
        }
        $items = DB::table('items')->paginate(15);

        //タイムセール時刻の取得
        $time = Time::first();

        return view('/itemIndexManage', ['items' => $items], ['time'=> $time]);
    }



    /**
     * 商品情報投稿ページの表示
     *
     *
     * @return View
     */
    public function register()
    {
        //管理者ログイン済でなければトップページへ遷移させる
        if (Auth::guard('admin')->check() == false ) {
            return redirect (route('/'));
        }

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
        if ($request->hasFile('img_1')) {
            $img_1 = $request->file('img_1')->store('public');
            $input['img_1'] = str_replace('public/', '', $img_1);
        }

        if ($request->hasFile('img_2')) {
            $img_2 = $request->file('img_2')->store('public');
            $input['img_2'] = str_replace('public/', '', $img_2);
        }

        if ($request->hasFile('img_3')) {
            $img_3 = $request->file('img_3')->store('public');
            $input['img_3'] = str_replace('public/', '', $img_3);
        }

        if ($request->hasFile('img_4')) {
            $img_4 = $request->file('img_4')->store('public');
            $input['img_4'] = str_replace('public/', '', $img_4);
        }

        //DBへ登録する
        \DB::beginTransaction();
        try {
            // 登録
            Item::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
            session()->flash('err_msg', '更新が失敗しました');
        }



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
        if ($request->hasFile('img_1')) {
            $img_1 = $request->file('img_1')->store('public');
            $input['img_1'] = str_replace('public/', '', $img_1);
        }

        if ($request->hasFile('img_2')) {
            $img_2 = $request->file('img_2')->store('public');
            $input['img_2'] = str_replace('public/', '', $img_2);
        }

        if ($request->hasFile('img_3')) {
            $img_3 = $request->file('img_3')->store('public');
            $input['img_3'] = str_replace('public/', '', $img_3);
        }

        if ($request->hasFile('img_4')) {
            $img_4 = $request->file('img_4')->store('public');
            $input['img_4'] = str_replace('public/', '', $img_4);
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
        //管理者ログイン済でなければトップページへ遷移させる
        if (Auth::guard('admin')->check() == false ) {
            return redirect (route('/'));
        }

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
        if (empty($id)) {
            \Session::flash('err_mesg', config('message.noData'));
            return redirect(route('itemIndex'));
        }

        //DBから削除
        $item = new Item();
        $item->dataDelete($id);

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
        //タイムセールの最新カラムを削除する
        $time = Time::latest()->first();
        if (!empty($time)) 
        {
            $id = $time->id;
            $time = new Time();
            $time->timeDelete($id);
        }

        //タイムセールの時刻を登録する
        $input = $request->all();
        \DB::beginTransaction();
        try {
            Time::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            report($e);
            \DB::rollback();
            abort(500);
            session()->flash('err_msg', '更新が失敗しました');
        }
        return redirect(route('itemIndex'));
    }

    /**
     * タイムセールの時刻の削除
     *
     * @param $id
     * @return View
     */
    public function timeDelete($id)
    {
        //データの有無を確認
        if (empty($id)) {
            \Session::flash('err_mesg', config('message.noData'));
            return redirect(route('itemIndex'));
        }

        //DBから削除
        $time = new Time();
        $time->timeDelete($id);

        //フラッシュメッセージを表示
        \Session::flash('err_msg', config('message.delete'));

        //ユーザー情報一覧ページへリダイレクト
        return redirect(route('itemIndex'));
    }

    /**
     * 各ページのリンク
     * @param
     * @return view
     */
    public function tentative()
    {

        //タイムセール時刻の取得
        $time = Time::latest()->first();
        return view('tentative', ['time' => $time]);
    }
}
