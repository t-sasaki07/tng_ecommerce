@extends('layouts.layout')
@section('title', 'お気に入り商品一覧画面')
@section('content')

<div class="container-fluid">
	<div class="">
		<div class="mx-auto" style="max-width:1200px">
			<h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">お気に入り商品一覧</h1>
				<div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <table claas="table-sm">
                            <tr>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>商品説明</th>
                            </tr>
                            {{--  @foreach($likeLists as $likeList)  --}}
                            @for($i=0; $i<count($likeLists); $i++)
                            {{--  @php dd($likeLists[$i][0]) @endphp  --}}
                            <tr>
                                <th><a href="/item/{{$likeLists[$i][0]->id}}">{{$likeLists[$i][0]->name}}</a><br></th>
                                <th>{{$likeLists[$i][0]->price}}</th>
                                <th>{{$likeLists[$i][0]->comment}}</th>
                            </tr>
                            @endfor
                            {{--  @endforeach  --}}
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection
