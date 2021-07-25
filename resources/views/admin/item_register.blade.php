@extends('layouts.layout')
@section('title', '商品登録画面')
@section('content')
<div class="container">
    <!-- フラッシュメッセージ -->
    @if (session('err_msg'))
    <div class="err_msg">
        {{ session('err_msg') }}
    </div>
    @endif
    <!-- フラッシュここまで -->
    <h1>商品登録</h1>
    <form enctype="multipart/form-data" method="post" action="{{route('newPost')}}" onSubmit="return checkSubmit()">
    @csrf
        <p>商品名</p>
        <input id="name" type="text" name="name" value="{{old('name')}}">
        @if ($errors->has('name'))
        {{$errors->first('name')}}
        @endif

        <p>価格</p>
        <input id="price" type="int" name="price" value="{{old('price')}}">
        @if ($errors->has('price'))
        {{$errors->first('price')}}
        @endif

        <p>商品説明</p>
        <input id="comment" type="text" name="comment" value="{{old('comment')}}">
        @if ($errors->has('comment'))
        {{$errors->first('comment')}}
        @endif

        <p>在庫</p>
        <input id="stock" type="int" name="stock" value="{{old('stock')}}">
        @if ($errors->has('stock'))
        {{$errors->first('stock')}}
        @endif

        <p>割引率</p>
        <input id="sale" type="int" name="sale" value="{{old('sale')}}">
        @if ($errors->has('sale'))
        {{$errors->first('sale')}}
        @endif

        <p>商品画像①</p>
        <input id="img_1" type="file" name="img_1" accept="image/*" value="{{ old('img_1') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_1'))
        {{$errors->first('img_1')}}
        @endif

        <p>商品画像②</p>
        <input id="img_2" type="file" name="img_2" accept="image/*" value="{{ old('img_2') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_2'))
        {{$errors->first('img_2')}}
        @endif

        <p>商品画像③</p>
        <input id="img_3" type="file" name="img_3" accept="image/*" value="{{ old('img_3') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_3'))
        {{$errors->first('img_3')}}
        @endif

        <p>商品画像④</p>
        <input id="img_4" type="file" name="img_4" accept="image/*" value="{{ old('img_4') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        @if ($errors->has('img_4'))
        {{$errors->first('img_4')}}
        @endif



        <button type="submit">登録する</button>
    </form>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('登録してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
