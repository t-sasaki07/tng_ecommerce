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

//商品一覧画面を表示
Route::get('/item/index', 'Admin\ItemController@index')->name('item.index');

//商品詳細画面を表示
Route::get('/item/{id}', 'Admin\ItemController@show')->name('item.detail');

// お気に入り機能
//「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
Route::post('/ajaxlike', 'Admin\ItemController@ajaxlike')->name('items.ajaxlike');

// ユーザー権限による機能
Route::group(['middleware' => 'auth:user'], function()
{

    // マイページ・ユーザー情報変更関連
    Route::get('mypage', 'User\UserController@index')->name('mypage');
    Route::get('userEdit', 'User\UserController@edit')->name('userEdit');
    Route::post('userEdit', 'User\UserController@update')->name('userUpdate');

    // ログアウト機能
    Route::get('/user/logout', 'User\Auth\LoginController@logout')->name('userLogout');

    // お気に入り一覧
    Route::get('/user/likeList', 'User\UserController@likeIndex');

    // カート関連
    // Route::resource('cartitem', 'User\CartController', ['only' => ['index']]);
    // Route::group(["prefix" => 'item.detail'], function() {
    //     Route::get('/{id}', 'User\CartController@show');
    //     Route::post('/add', 'User\CartController@addCart')->name('addcart');
    // });
    Route::view('/no-cartList', 'users/no_cart_list')->name('noCartlist');
    Route::view('/purchaseCompleted', 'items/purchase_completed');

    Route::resource('cartlist', 'User\CartController', ['only' => ['index']]);
    Route::post('item/addCart/cartListRemove', 'User\CartController@remove')->name('itemRemove');
    Route::post('item/addCart','User\CartController@addCart')->name('addcart.post');
    Route::post('item/addCart/orderFinalize','User\CartController@store')->name('orderFinalize');
});

// 管理者権限による機能
Route::group(['middleware' => 'auth:admin'], function()
{
    // ログアウト機能
    Route::get('/admin/logout', 'Admin\Auth\LoginController@logout')->name('adminLogout');

    Route::get('/itemIndexManage', 'Admin\ItemController@index')->name('itemIndex');
    //商品情報一覧ページ
    Route::post('/itemTimeSale', 'Admin\Itemcontroller@timesale')->name('timesale');
    //タイムセールの時刻変更

    Route::get('/itemRegister', 'Admin\ItemController@register');
    Route::post('/itemPost', 'Admin\ItemController@itemPost')->name('newPost');
    //商品投稿

    Route::get('/itemDetailManage/{id}', 'Admin\ItemController@detail');
    //商品情報詳細ページ

    Route::get('/itemChange/{id}', 'Admin\ItemController@change');
    Route::post('/itemChangePost/{id}', 'Admin\ItemController@itemChange')->name('rePost');
    //商品情報変更

    Route::post('/userDetail/{id}', 'Admin\ItemController@delete');
    //商品情報削除

    Route::get('/userDetail', 'Admin\AdminController@index')->name('userIndex');
    //ユーザー情報一覧ページ

    Route::get('/userDetail/{id}', 'Admin\AdminController@detail');
    //ユーザー情報詳細ページ

    Route::post('/userDelete/{id}', 'Admin\AdminController@delete')->name('userDelete');
    //ユーザーデータ削除
});
