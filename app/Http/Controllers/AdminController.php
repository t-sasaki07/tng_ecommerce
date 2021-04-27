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
        $users = User::all();


        return view('index', ['users' => $users]);
    }


    /**
     * ユーザー情報詳細ページの表示
     *
     * @param $id
     * @return View
     */
    public function detail($id)
    {
        $user = User::find($id);


        return view('detail', ['user' => $user]);
    }
}
