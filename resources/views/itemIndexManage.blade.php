@extends('layout')
@section('title', '商品一覧管理画面')
@section('content')

<div class="container">
    <!-- フラッシュメッセージ表示 -->
    @if(session('err_msg'))
    <div class="err_msg">
        {{session('err_msg')}}
    </div>
    @endif
    <!-- フラッシュメッセージ表示ここまで -->

    <!-- タイムセール時刻設定 -->
    <form method=post action="{{route('timesale')}}">
    @csrf
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="{{old('start')}}">
    <p>終了時間</p>
    <input id="start" type="time" name="start" value="{{old('start')}}">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    <!-- タイムセール時刻設定ここまで -->

    <table class="table-sm">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <th><a href="/itemDetail/{{$item->id}}">{{$item->name}}</a></th>
            <th>{{$item->price}}</th>
            <th>{{$item->stock}}</th>

        </tr>
        @endforeach


    </table>


</div>


@endsection
