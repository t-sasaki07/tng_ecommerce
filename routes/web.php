<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/itemChange/{id}', 'ItemController@change');
//商品情報変更ページ

Route::get('itemDetail/{id}', 'ItemController@detail');
//商品情報詳細ページ

Route::get('itemIndex', 'ItemController@index');
//商品情報一覧ページ

Route::get('itemRegister', 'ItemController@register');
//商品投稿ページ

Route::get('userDetail', 'AdminController@index');
//ユーザー情報一覧ページ

Route::get('userDetail', 'AdminController@detail');
//ユーザー情報詳細ページ
