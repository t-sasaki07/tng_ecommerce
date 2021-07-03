@extends('layout')
@section('title', 'ユーザー一覧管理画面')
@section('content')
<div class="container">
    <table class="table-sm">
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
            <th></th>
        </tr>
        @foreach($users as $user)
        <tr>
            <th><a href="/userDetail/{{$user->id}}">{{$user->name}}</a></th>
            <th>{{$user->email}}</th>
            <th>
                <form method=post action="{{ route('userDelete', $user->id) }}" onSubmit="return checkDelete()">
                    @csrf
                    <button type=submit onclick="">削除</button>
                </form>
            </th>

        </tr>
        @endforeach


    </table>
</div>
    <script>
        function checkD() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection
