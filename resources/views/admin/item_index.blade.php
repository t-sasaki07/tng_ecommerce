@extends('layout')
@section('title', '商品一覧管理画面')
@section('content')

<div class="container">
    <!-- フラッシュメッセージ表示 -->
    @if(session('err_msg'))
    <div class="err_msg">
        {{session('err_msg')}}
    </div>
    @endif
    <!-- フラッシュメッセージ表示ここまで -->

    <!-- タイムセール時刻設定 -->
    <form method=post action="{{route('timesale')}}" onSubmit="return checkSubmit()">
    @csrf
    @if (!empty($time->start))
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="{{ $time->start }}">
    <p>終了時間</p>
    <input id="finish" type="time" name="finish" value="{{ $time->finish }}">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    <form method=post action="{{ route('timeDelete', $time->id) }}" onSubmit="return checkDelete()">
        @csrf
        <button type=submit onclick="">時刻を削除する</button>
    </form>
    @else
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="{{old('start')}}">
    <p>終了時間</p>
    <input id="finish" type="time" name="finish" value="{{old('finish')}}">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    @endif
    <!-- タイムセール時刻設定ここまで -->

    <table class="table-sm">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>お気に入り</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <th><a href="/admin/item_detail/{{$item->id}}">{{$item->name}}</a></th>
            <th>{{$item->price}}</th>
            <th>{{$item->stock}}</th>
            <th>
                <!-- ユーザーログインがない場合、お気に入り機能を非表示にする -->
                @if (Auth::guard('user')->check() === false)
                <i class="fas fa-heart"></i>
                <span class="likeCount">{{$like_item->likes_count}}</span>
                <!-- ユーザーログインがあり、まだお気に入りしていない表示  -->
                @elseif ($like_model->like_exist(Auth::guard('user')->user()->id, $item->id))
                <p class="favorite-marke">
                <a class="js-like-toggle loved" href="" data-itemid="{{ $item->id }}">
                    <i class="fas fa-heart"></i>
                </a>
                <span class="likeCount">{{$like_item->likes_count}}</span>
                </p>
                <!-- ユーザーログインがあり、お気に入りしている表示 -->
                @else
                <p class="favorite-marke">
                <a class="js-like-toggle" href="" data-itemid="{{$item->id}}">
                    <i class="fas fa-heart"></i>
                </a>
                <span class="likeCount">{{$like_item->likes_count}}</span>
                </p>
                @endif
            </th>
        </tr>
        @endforeach


    </table>


</div>
<script>
    function checkSubmit() {
        if (window.confirm('タイムセールの時刻を登録してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script>
        function checkDelete() {
            if (window.confirm('タイムセールの時刻を削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
</script>
@endsection
