@extends('layouts.layout')
@section('title', 'マイページ')
@section('content')

<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">ユーザー登録内容</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">
                        名前
                    </label>
                    <div>
                        <input id="name" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">
                        E-Mail
                    </label>
                    <div>
                        <input id="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">
                            郵便番号
                        </label>
                        <div>
                            <input id="postal_code" class="form-control" value="{{ $user->postal_code }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prefecture">
                            都道府県
                        </label>
                        <div>
                            <input id="prefecture" class="form-control" value="{{ $user->prefecture }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            市区町村
                        </label>
                        <div>
                            <input id="city" class="form-control" value="{{ $user->city }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="block">
                            番地
                        </label>
                        <div>
                            <input id="block" class="form-control" value="{{ $user->block }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="building">
                            建物名
                        </label>
                        <div>
                            <input id="building" class="form-control" value="{{ $user->building }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            電話番号
                        </label>
                        <div>
                            <input id="phone" class="form-control" value="{{ $user->phone }}" readonly>
                        </div>
                    </div>
                </div>
                <a href="{{ action('User\UserController@edit') }}"><button class="user-btn">ユーザー登録内容の編集</button></a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
