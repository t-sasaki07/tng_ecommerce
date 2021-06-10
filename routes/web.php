<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false
        ]);

        // ログイン認証後
        Route::middleware('auth:admin')->group(function () {

            // TOPページ
            Route::resource('home', 'HomeController', ['only' => 'index']);

        });
});

Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:user'], function()
{
    Route::get('user/detail', 'User\UserController@index')->name('user.detail');
    Route::get('user/edit', 'User\UserController@edit')->name('user.edit');
    Route::post('user/edit', 'User\UserController@update')->name('user.update');
});

//商品一覧画面を表示
Route::get('/item/index', 'ItemController@index')->name('item.index');

//商品詳細画面を表示
Route::get('/item/{id}', 'ItemController@detail')->name('item.detail');