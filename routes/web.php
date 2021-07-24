<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
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
})->name('top');

//ユーザー管理
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::middleware('auth:user')->group(function(){
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::middleware('auth:admin')->group(function(){
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});


Auth::routes();


//ユーザー向け機能
Route::group(['middleware' => 'auth:user'], function()
{
    Route::get('/user/detail', 'User\UserController@index')->name('user.detail');
    Route::get('/user/edit', 'User\UserController@edit')->name('user.edit');
    Route::post('/user/edit', 'User\UserController@update')->name('user.update');
});

//商品一覧画面を表示
Route::get('/userItem/index', 'User\ItemController@index')->name('item.index');

//商品詳細画面を表示
Route::get('/userItem/detail/{id}', 'User\ItemController@detail')->name('item.detail');



//管理者向け機能
Route::get('/itemIndexManage', 'Admin\ItemController@index')->name('itemIndex');
//商品情報一覧ページ
Route::post('/itemTimeSale', 'Admin\Itemcontroller@timesale')->name('timesale');
//タイムセールの時刻変更
Route::post('/itemTimeDelete/{id}', 'Admin\Itemcontroller@timeDelete')->name('timeDelete');
//タイムセールの時刻削除

Route::get('/itemRegister', 'Admin\ItemController@register');
Route::post('/itemPost', 'Admin\ItemController@itemPost')->name('newPost');
//商品投稿

Route::get('/itemDetailManage/{id}', 'Admin\ItemController@detail');
//商品情報詳細ページ

Route::get('/itemChange/{id}', 'Admin\ItemController@change')->name('change');
Route::post('/itemChangePost/{id}', 'Admin\ItemController@itemChange')->name('rePost');
//商品情報変更

Route::post('/itemDelete/{id}', 'Admin\ItemController@itemDelete')->name('itemDelete');
//商品情報削除

Route::post('ajaxlike', 'Admin\ItemController@ajaxlike')->name('items.ajaxlike');
//お気に入り機能


Route::get('/userDetail', 'AdminController@index')->name('userIndex');
//ユーザー情報一覧ページ

Route::get('/userDetail/{id}', 'AdminController@detail');
//ユーザー情報詳細ページ

Route::post('/userDelete/{id}', 'AdminController@delete')->name('userDelete');
//ユーザーデータ削除



Route::get('/tentative', 'Admin\ItemController@tentative');
//仮リンク


