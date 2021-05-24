@extends('layout')
@section('title', '商品登録画面')
@section('content')


<a href="{{ url('/itemIndexManage') }}">商品一覧</a>
<a href="{{ url('/itemRegister') }}">商品登録</a>

<a href="{{ url('/userDetail') }}">ユーザー一覧</a>


@endsection
