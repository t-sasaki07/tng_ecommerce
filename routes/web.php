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


// ログアウト機能
Route::get('/user/logout', 'UserController@getLogout')->name('userLogout');


// ユーザー権限による機能
Route::group(['middleware' => 'auth:user'], function()
{

    // マイページ・ユーザー情報変更関連
    Route::get('user/detail', 'User\UserController@index')->name('userDetail');
    Route::get('user/edit', 'User\UserController@edit')->name('userEdit');
    Route::post('user/edit', 'User\UserController@update')->name('userUpdate');

    // カート関連
    Route::view('/no-cartList', 'products/no_cart_list')->name('noCartlist');
    Route::view('/purchaseCompleted', 'products/purchase_completed');

    Route::resource('cartlist', 'CartController', ['only' => ['index']]);
    Route::post('productInfo/addCart/cartListRemove', 'CartController@remove')->name('itemRemove');
    Route::post('productInfo/addCart','CartController@addCart')->name('addcart.post');
    Route::post('productInfo/addCart/orderFinalize','CartController@store')->name('orderFinalize');


});
