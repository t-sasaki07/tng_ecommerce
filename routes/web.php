<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('top');
});

//ユーザー管理
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::middlware('auth:user')->group(function(){
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::middlware('auth:admin')->group(function(){
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/itemIndexManage', 'ItemController@index')->name('itemIndex');
//商品情報一覧ページ
Route::post('/itemTimeSale', 'Itemcontroller@timesale')->name('timesale');
//タイムセールの時刻変更

Route::get('/itemRegister', 'ItemController@register');
Route::post('/itemPost', 'ItemController@itemPost')->name('newPost');
//商品投稿

Route::get('/itemDetailManage/{id}', 'ItemController@detail');
//商品情報詳細ページ

Route::get('/itemChange/{id}', 'ItemController@change');
Route::post('/itemChangePost/{id}', 'ItemController@itemChange')->name('rePost');
//商品情報変更

Route::post('/userDetail/{id}', 'ItemController@delete');
//商品情報削除



Route::get('/userDetail', 'AdminController@index')->name('userIndex');
//ユーザー情報一覧ページ

Route::get('/userDetail/{id}', 'AdminController@detail');
//ユーザー情報詳細ページ

Route::post('/userDelete/{id}', 'AdminController@delete')->name('userDelete');
//ユーザーデータ削除



Route::get('/tentative', 'ItemController@tentative');
//仮リンク

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
