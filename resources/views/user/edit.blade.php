@extends('layout')
@section('title', 'ユーザー登録内容')
@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">ユーザー登録内容の変更</div>
            <div class="card-body">
                <form method="POST" action="{{ action('User\UserController@update') }}">
                    <div class="form-group">
                        <label for="name">
                            名前
                        </label>
                        <div>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            E-Mail
                        </label>
                        <div>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">
                            郵便番号
                        </label>
                        <div>
                            <input type="text" name="postal_code" class="form-control" value="{{ $user->postal_code }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prefecture">
                            都道府県
                        </label>
                        <div>
                            <input type="text" name="prefecture" class="form-control" value="{{ $user->prefecture }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            市区町村
                        </label>
                        <div>
                            <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="block">
                            番地
                        </label>
                        <div>
                            <input type="text" name="block" class="form-control" value="{{ $user->block }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="building">
                            建物名
                        </label>
                        <div>
                            <input type="text" name="building" class="form-control" value="{{ $user->building }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            電話番号
                        </label>
                        <div>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <button type="submit" class="user-btn">変更</button>
                    {{ csrf_field() }}
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection