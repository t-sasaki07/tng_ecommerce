@extends('layout')
@section('title', '商品一覧画面')
@section('content')

<div class="container-fluid">
	<div class="">
		<div class="mx-auto" style="max-width:1200px">
			<h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
				<div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <table claas="table-sm">
                            <tr>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>商品説明</th>
                                <th>お気に入り</th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <th><img src="{{ asset('storage/'.$item->img_1)}}" alt="" class="img" width="100px" height="auto"></th>
                                <th><a href="/item/detail/{{$item->id}}">{{$item->name}}</a><br></th>
                                <th>{{$item->price}}</th>
                                <th>{{$item->comment}}</th>
                                <th>
                                    <!-- ユーザーログインがない場合、お気に入り機能を非表示にする -->
                                    @if (Auth::guard('user')->check() === false)
                                    <i class="fas fa-heart">{{$like_item->likes_count}}</i>
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
                                <th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection
