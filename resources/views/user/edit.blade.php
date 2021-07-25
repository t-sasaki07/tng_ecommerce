@extends('layouts.layout')
@section('title', 'ユーザー情報編集画面')
@section('content')

<div class="container m-5">
    @if (session('err_msg'))
        <div class="err_msg">
            {{ session('err_msg') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">ユーザー登録内容の変更</div>
            <div class="card-body">
                <form method="POST" action="{{ action('User\UserController@update') }}" onSubmit="return checkSubmit()">
                @csrf
                    <div class="form-group">
                        <label for="name">
                            名前
                        </label>
                        <div>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            E-Mail
                        </label>
                        <div>
                            <input id="email" type="text" name="email" class="form-control" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">
                            郵便番号
                        </label>
                        <div>
                            <input id="postal_code" type="text" name="postal_code" class="form-control" value="{{ $user->postal_code }}">
                            @if ($errors->has('postal_code'))
                                <div class="text-danger">
                                    {{ $errors->first('postal_code') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prefecture">
                            都道府県
                        </label>
                        <div>
                            <input id="prefecture" type="text" name="prefecture" class="form-control" value="{{ $user->prefecture }}">
                            @if ($errors->has('prefecture'))
                                <div class="text-danger">
                                    {{ $errors->first('prefecture') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            市区町村
                        </label>
                        <div>
                            <input id="city" type="text" name="city" class="form-control" value="{{ $user->city }}">
                            @if ($errors->has('city'))
                                <div class="text-danger">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="block">
                            番地
                        </label>
                        <div>
                            <input id="block" type="text" name="block" class="form-control" value="{{ $user->block }}">
                            @if ($errors->has('block'))
                                <div class="text-danger">
                                    {{ $errors->first('block') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="building">
                            建物名
                        </label>
                        <div>
                            <input id="building" type="text" name="building" class="form-control" value="{{ $user->building }}">
                            @if ($errors->has('building'))
                                <div class="text-danger">
                                    {{ $errors->first('building') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            電話番号
                        </label>
                        <div>
                            <input id="phone" type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            @if ($errors->has('phone'))
                                <div class="text-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-5">
                        <a class='btn btn-secondary' href="{{ route('mypage') }}">
                            キャンセル
                        </a>
                        <button type="submit" class="user-btn">変更</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function checkSubmit() {
        if (window.confirm('ユーザー情報を変更しますか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
