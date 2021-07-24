<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSaleRequest;

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
        $userId = Auth::guard('user')->user()->id;
        $user = Auth::guard('user')->user()->find($userId);

        return view('user.detail', ['user' => $user ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(UserRequest $request)
    {
        // userデータの取得
        $input = $request->all();

        //DBへ登録する
        $user = new User();
        $user->upNewData($input);

        return view('user.detail', ['user' => $user ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user_form = $request->all();

        $userId = Auth::guard('user')->user()->id;
        $user = Auth::guard('user')->user()->find($userId);

        //不要な_tokenの削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user/detail');
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
}
