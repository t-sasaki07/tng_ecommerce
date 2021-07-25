<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Item;
use App\Models\Like;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * マイページにてユーザー情報の表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // userデータの取得

    return view('user.detail', ['user' => Auth::user() ]);

    }

    // お気に入り一覧
    public function likeIndex()
    {
        $likes = User::where('id', Auth::user())
            ->with(['likes']);

            dd($likes);
            return view('user.like_list')->with($likes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return view(('user.edit'), ['user' => Auth::user() ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        //
        $user_form = $request->all();
        $user = Auth::user();
        //不要な_tokenの削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        // 保存メッセージ
        \Session::flash('err_msg', config('message.complete'));

        //リダイレクト
        return redirect(route('mypage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function confirm(UserRequest $request)
    {
        $validated = $request->validated();
        return view('user.detail')->with($validated);
    }
}
