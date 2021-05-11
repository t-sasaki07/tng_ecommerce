@extends('layout')
@section('title', '商品詳細管理画面')
@section('content')
<div class="containser">
    <h1>{{$item->name}}</h1>
    <p>価格：{{$item->price}}</p>
    <p>在庫：{{$item->stock}}</p>
    <p>商品説明：{{$item->comment}}</p>
    <p>タイムセール時の割引率：{{$item->time_sale}}</p>
    <img src="{{ asset('/storage/'.$item->img_1)}}" alt="" width="50px" height="auto">
    <img src="{{ asset('/storage/'.$item->img_2)}}" alt="" width="50px" height="auto">
    <img src="{{ asset('/storage/'.$item->img_3)}}" alt="" width="50px" height="auto">
    <img src="{{ asset('/storage/'.$item->img_4)}}" alt="" width="50px" height="auto">



</div>


@endsection
