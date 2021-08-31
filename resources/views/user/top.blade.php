@extends('layouts.layout')
@section('title', 'ユーザー情報')
@section('content')


<a href="{{ url('/user/detail') }}">ユーザー情報確認</a>
<a href="{{ url('/user/like_list') }}">お気に入り一覧</a>
<a href="{{ url('/user/order_list') }}">購入履歴一覧</a>


@endsection