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

// Route::get('/', function () {
//    return view('top');
// })->name('top');
Route::get('/', 'User\ItemController@top')->name('item.top');

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


    Route::view('/no-cartList', 'users/no_cart_list')->name('noCartlist');
    Route::view('/purchaseCompleted', 'items/purchase_completed');

    Route::resource('cartlist', 'User\CartController', ['only' => ['index']]);
    Route::post('item/addCart/cartListRemove', 'User\CartController@remove')->name('itemRemove');
    Route::post('item/addCart','User\CartController@addCart')->name('addcart.post');
    Route::post('item/addCart/orderFinalize','User\CartController@store')->name('orderFinalize');

    // 購入履歴一覧
    Route::get('/user/order_list', 'User\UserController@orderIndex');

    // お気に入り一覧
    Route::get('/user/like_list', 'User\UserController@likeIndex');


    // ログアウト機能
    Route::get('/user/logout', 'User\Auth\LoginController@logout')->name('userLogout');
});

//商品一覧画面を表示
Route::get('/item/index', 'User\ItemController@index')->name('item.index');

//商品詳細画面を表示
Route::get('/item/detail/{id}', 'User\ItemController@detail')->name('item.detail');

// お気に入り機能
//「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
Route::post('/ajaxlike', 'Admin\ItemController@ajaxlike')->name('items.ajaxlike');



//管理者向け機能
Route::group(['middleware' => 'auth:admin'], function() {
    // ログアウト機能
    Route::get('/admin/logout', 'Admin\Auth\LoginController@logout')->name('adminLogout');

    Route::get('/admin/item_index', 'Admin\ItemController@index')->name('admin.item.index');
    //商品情報一覧ページ
    Route::post('/itemTimeSale', 'Admin\Itemcontroller@timesale')->name('timesale');
    //タイムセールの時刻変更
    Route::post('/itemTimeDelete/{id}', 'Admin\Itemcontroller@timeDelete')->name('timeDelete');
    //タイムセールの時刻削除

    Route::get('/admin/item_register', 'Admin\ItemController@register');
    Route::post('/itemPost', 'Admin\ItemController@itemPost')->name('newPost');
    //商品投稿

    Route::get('/admin/item_detail/{id}', 'Admin\ItemController@detail');
    //商品情報詳細ページ

    Route::get('/admin/item_change/{id}', 'Admin\ItemController@change')->name('item.change');
    Route::post('/admin/itemchangePost/{id}', 'Admin\ItemController@itemChange')->name('rePost');
    //商品情報変更

    Route::post('/itemDelete/{id}', 'Admin\ItemController@itemDelete')->name('itemDelete');
    //商品情報削除

    Route::post('ajaxlike', 'Admin\ItemController@ajaxlike')->name('items.ajaxlike');
    //お気に入り機能


    Route::get('/admin/user_index', 'AdminController@index')->name('user.index');
    //ユーザー情報一覧ページ

    Route::get('/admin/user_detail/{id}', 'AdminController@detail');
    //ユーザー情報詳細ページ

    Route::post('/userDelete/{id}', 'AdminController@delete')->name('userDelete');
    //ユーザーデータ削除

});

Route::get('/tentative', 'Admin\ItemController@tentative');
//仮リンク


