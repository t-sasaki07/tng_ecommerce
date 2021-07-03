@extends('layout')
@section('title', '商品詳細管理画面')
@section('content')
<div class="container">
    <h1>{{$item->name}}</h1>
    <p>価格：{{$item->price}} + 税</p>
    <p>在庫：{{$item->stock}}</p>
    <p>商品説明：{{$item->comment}}</p>
    <p>タイムセール時の割引率：{{$item->sale}}%</p>
    <img src="{{ asset('storage/'.$item->img_1)}}" alt="" width="100px" height="auto">
    <img src="{{ asset('storage/'.$item->img_2)}}" alt="" width="100px" height="auto">
    <img src="{{ asset('storage/'.$item->img_3)}}" alt="" width="100px" height="auto">
    <img src="{{ asset('storage/'.$item->img_4)}}" alt="" width="100px" height="auto">
    <a href="/itemChange/{{ $item->id }}">変更する</a>
    <form method=post action="{{ route('itemDelete', $item->id) }}" onSubmit="return checkDelete()">
        @csrf
        <button type=submit onclick="">削除する</button>
    </form>
</div>
<script>
        function checkDelete() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
</script>
@endsection