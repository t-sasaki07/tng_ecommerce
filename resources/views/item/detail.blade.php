@extends('layout')
@section('content')
<header class="header-section">
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><b>M</b>art</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>
					<!-- <li><a href="#">page</a></li> -->
					<li><a href="/item/index">shop</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right cart-menu">
				<li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
				<li><a href="#"><span> Cart -$0&nbsp;</span> <span class="shoping-cart">0</span></a></li>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
</header>

<!-- main contents -->

<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品詳細</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">
								<img src="{{ asset('storage/'.$item->img_1)}}" alt="" width="100px" height="auto">
								<img src="{{ asset('storage/'.$item->img_2)}}" alt="" width="100px" height="auto">
								<img src="{{ asset('storage/'.$item->img_3)}}" alt="" width="100px" height="auto">
								<img src="{{ asset('storage/'.$item->img_4)}}" alt="" width="100px" height="auto">
                    <br>
                    <a href="/item/detail/{{$item->id}}">{{$item->name}}</a><br>
                    {{$item->price}}<br>
                    {{$item->comment}}<br>
                    {{$item->stock}}<br>
                </div>
								@if( Auth::guard('user')->check() )
                {!! Form::open(['route' => ['addcart.post', 'class' => 'd-inline']]) !!}

								{{-- 画面遷移時にPOST送信 session保存に使用 --}}
										{{ Form::hidden('items_id', $item->id) }}
                    {{ Form::hidden('users_id', $user->id) }}

                    <div class="form-row justify-content-center">
                        {!! Form::label('prodqty', '購入個数', ['class' => 'mt-1']) !!}
                        <div class="form-group col-sm-1">
                            <div class="ml-1">
                                <input type="number" name="item_quantity" class="form-control" id="prodqty" pattern="[1-9][0-9]*" min="1" required autofocus>
                            </div>
                        </div>
                        {!! Form::label('', '個', ['class' => 'mt-1 mr-3']) !!}
                        <div class="form-group">
                            {!! Form::submit('カートへ', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
								@endif
            </div>
        </div>
    </div>
</div>

<section class="search-section">
	<div class="container">
		<div class="row subscribe-from">
			<div class="col-md-12">
				<form class="form-inline col-md-12 wow fadeInDown animated">
					<div class="form-group">
						<input type="email" class="form-control subscribe" id="email" placeholder="Search...">
						<button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
