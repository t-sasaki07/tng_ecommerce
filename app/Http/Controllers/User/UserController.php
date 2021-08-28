<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

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

    // お気に入り一覧
    public function likeIndex()
    {
        $user_id = Auth::guard('user')->user()->id;
        
        $likeLists = Like::where('user_id', $user_id)->get();

        $items = [];
        for ($i=0; $i<count($likeLists); $i++) {
            $item_id = $likeLists[$i]->item_id;
            $items[$i] = Item::where('id', $item_id)->first();
        };


        return view('user.like_list')->with('items', $items);
    }

    // 購入履歴一覧
    public function orderIndex()
    {
        $user_id = Auth::guard('user')->user()->id;

        $orderLists = Order::where('user_id', $user_id)->get();

        $items = [];
        for ($i=0; $i<count($orderLists); $i++) {
            $item_id = $orderLists[$i]->item_id;
            $items[$i] = Item::where('id', $item_id)->first();
            dd($items);
        };


        return view('user.order_list')->with('items', $items);
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
    public function update(Request $request)
    {
        //
        $input = $request->all();

        //$userId = Auth::guard('user')->user()->id;
        //$user = Auth::guard('user')->user()->find($userId);

        //DBへ登録する
        $user = new User();
        $user->upNewData($input);

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
        //データの有無を確認
        if (empty($id)) {
            \Session::flash('err_mesg', config('message.noData'));
            return redirect(route('user/detail'));
        }

        //DBから削除
        $item = new User();
        $item->dataDelete($id);

        //フラッシュメッセージを表示
        \Session::flash('err_msg', config('message.delete'));

        //ユーザー情報一覧ページへリダイレクト
        return redirect(route('user/detail'));
    }
}
