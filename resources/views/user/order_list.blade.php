@extends('layouts.layout')
@section('title', '購入履歴')
@section('content')

<div class="container-fluid">
	<div class="">
		<div class="mx-auto" style="max-width:1200px">
			<h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">購入履歴一覧</h1>
				<div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <table claas="table-sm">
                            <tr>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>商品説明</th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <th><img src="{{ asset('storage/'.$item->img_1)}}" alt="" width="100px" height="auto"></th>
                                <th><a href="/item/{{$item->id}}">{{$item->name}}</a><br></th>
                                <th>{{$item->price}}</th>
                                <th>{{$item->comment}}</th>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection