@extends('layouts.layout')
@section('title', 'ユーザー詳細管理画面')
@section('content')
<div class="containser">
    <h1>{{$user->name}}</h1>
    <p>郵便番号：{{$user->postal_code}}</p>
    <p>都道府県：{{$user->prefecture}}</p>
    <p>市区町村：{{$user->city}}</p>
    <p>番地：{{$user->block}}</p>
    <p>建物名・部屋番号：{{$user->building}}</p>
    <p>電話番号：{{$user->phone}}</p>
    <p>メールアドレス：{{$user->email}}</p>
    <form method=post action="{{ route('userDelete', $user->id) }}" onSubmit="return checkDelite()">
        @csrf
        <button type=submit onclick="">削除</button>
    </form>



</div>
<script>
        function checkDelite() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
