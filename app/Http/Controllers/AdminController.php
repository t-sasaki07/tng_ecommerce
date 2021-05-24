<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;

class AdminController extends Controller
{
    /**
     * ユーザー情報一覧ページの表示
     *
     *
     * @return View
     */
    public function index()
    {
        //DBからユーザーデータを全て取得
        $users = User::all();

        return view('userIndex', ['users' => $users]);
    }


    /**
     * ユーザー情報詳細ページの表示
     *
     * @param $id
     * @return View
     */
    public function detail($id)
    {
        //DBからデータを取得
        $user = User::find($id);

        // データの有無の確認
        if (is_null($user)) {
            \Session::flash('err_msg', config('message.noData'));
            return redirect(route('userIndex'));
}

        return view('userDetail', ['user' => $user]);
    }

    /**
     * ユーザーの削除
     *
     * @param $id
     * @return View
     */
    public function delete($id)
    {
        //データの有無を確認
        if(empty($id)) {
            \Session::flash('err_mesg', config('message.noData'));
            return redirect(route('userIndex'));
        }

        //DBから削除
        $user = new User();
        $user->dataDelete($id);

        //フラッシュメッセージを表示
        \Session::flash('err_msg', config('message.delete'));

        //ユーザー情報一覧ページへリダイレクト
        return redirect(route('userIndex'));
    }

}
