@extends('layout')
@section('title', '商品登録画面')
@section('content')


<a href="{{ url('/itemIndexManage') }}">商品一覧</a>
<a href="{{ url('/itemRegister') }}">商品登録</a>
<a href="{{ url('/userDetail') }}">ユーザー一覧</a>

@if(empty($time))
  タイムセールの時刻は決定されていません。
@elseif ( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) === ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) )
  現在タイムセール中です。
@else
  タイムセールの時刻は、{{ $time->start }}〜{{ $time->finish }}です。
@endif

@if( Auth::guard('admin')->check() )
  管理者権限にてログイン済です
@elseif( Auth::guard('user')->check() )
  ユーザーログイン済です
@else
　ログインされていません
@endif

@endsection
