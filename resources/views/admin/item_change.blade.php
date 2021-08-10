@extends('layout')
@section('title', '商品情報変更画面')
@section('content')
<div class="container">
    <h1>商品情報変更</h1>
<form method="post" action="{{ route('rePost', $items->id) }}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
    @csrf
    <input id="id" type="hidden" name="id" value="{{ $items->id }}">
        <p>商品名</p>
        <input id="name" type="text" name="name" value="{{ $items->name }}">
        @if ($errors->has('name'))
        {{$errors->first('name')}}
        @endif

        <p>価格</p>
        <input id="price" type="int" name="price" value="{{ $items->price }}">
        @if ($errors->has('price'))
        {{$errors->first('price')}}
        @endif

        <p>商品説明</p>
        <input id="comment" type="text" name="comment" value="{{ $items->comment }}">
        @if ($errors->has('comment'))
        {{$errors->first('comment')}}
        @endif

        <p>在庫</p>
        <input id="stock" type="int" name="stock" value="{{ $items->stock }}">
        @if ($errors->has('stock'))
        {{$errors->first('stock')}}
        @endif

        <p>割引率</p>
        <input id="sale" type="int" name="sale" value="{{ $items->sale }}">
        @if ($errors->has('sale'))
        {{$errors->first('sale')}}
        @endif

        <p>商品画像①</p>
        @if (!empty($items->img_1))
        <img src="{{ asset('storage/'.$items->img_1)}}" alt="" width="100px" height="auto">
        @endif
        <input id="img_1" type="file" name="img_1" accept="image/*" value="{{ $items->img_1 }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_1'))
        {{$errors->first('img_1')}}
        @endif

        <p>商品画像②</p>
        @if (!empty($items->img_2))
        <img src="{{ asset('storage/'.$items->img_2)}}" alt="" width="100px" height="auto">
        @endif
        <input id="img_2" type="file" name="img_2" accept="image/*" value="{{ $items->img_2 }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_2'))
        {{$errors->first('img_2')}}
        @endif

        <p>商品画像③</p>
        @if (!empty($items->img_3))
        <img src="{{ asset('storage/'.$items->img_3)}}" alt="" width="100px" height="auto">
        @endif
        <input id="img_3" type="file" name="img_3" accept="image/*" value="{{ $items->img_3 }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_3'))
        {{$errors->first('img_3')}}
        @endif

        <p>商品画像④</p>
        @if (!empty($items->img_4))
        <img src="{{ asset('storage/'.$items->img_4)}}" alt="" width="100px" height="auto">
        @endif
        <input id="img_4" type="file" name="img_4" accept="image/*" value="{{ $items->img_4 }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_4'))
        {{$errors->first('img_4')}}
        @endif


        <button type="submit">登録する</button>
    </form>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection