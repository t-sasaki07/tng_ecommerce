@extends('layout')
@section('title', '商品情報変更画面')
@section('content')
<div class="container">
    <h1>商品情報変更</h1>
    <form method="post" action="{{route('post')}}" enctype="multipart/form-data">
    @csrf
        <p>商品名</p>
        <input id="name" type="text" name="name" value="{{old('name')}}">

        <p>価格</p>
        <input id="price" type="int" name="price" value="{{old('price')}}">

        <p>商品説明</p>
        <input id="comment" type="text" name="comment" value="{{old('comment')}}">

        <p>在庫</p>
        <input id="stock" type="int" name="stock" value="{{old('stock')}}">

        <p>割引率</p>
        <input id="time_sale" type="int" name="time_sale" value="{{old('time_sale')}}">

        <p>商品画像①</p>
        <input id="img_1" type="file" name="img_1" accept="image/*" value="{{ old('img_1') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">

        <p>商品画像②</p>
        <input id="img_2" type="file" name="img_1" accept="image/*" value="{{ old('img_2') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">

        <p>商品画像③</p>
        <input id="img_3" type="file" name="img_1" accept="image/*" value="{{ old('img_3') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">

        <p>商品画像④</p>
        <input id="img_4" type="file" name="img_1" accept="image/*" value="{{ old('img_4') }}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">



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
