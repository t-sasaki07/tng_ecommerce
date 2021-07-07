@extends('layout')
@section('title', '商品登録画面')
@section('content')


<a href="{{ url('/itemIndexManage') }}">商品一覧</a>
<a href="{{ url('/itemRegister') }}">商品登録</a>
<a href="{{ url('/userDetail') }}">ユーザー一覧</a>


@if(empty($time))
  <!-- タイムセールの時刻が設定されていない -->
  タイムセールの時刻は決定されていません。

@elseif ( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) and ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) )
  <!-- タイムセールの時間帯 -->
  現在タイムセール中です。

@else
  <!-- タイムセール時間外 -->
  タイムセールの時刻は、{{ $time->start }}〜{{ $time->finish }}です。
@endif

@if( ( Auth::guard('user')->check() ) and ( Auth::guard('admin')->check() ) )
  <!-- 管理者、ユーザーログイン済 -->
  管理者、ユーザー権限ともにログイン済です

@elseif( Auth::guard('admin')->check() )
  <!-- 管理者（Admin）にてログインしている -->
  管理者権限にてログイン済です

@elseif( Auth::guard('user')->check() )
  <!-- ユーザー（User）にてログインしている -->
  ユーザーログイン済です

@else
  ログインしていません

@endif


@endsection
