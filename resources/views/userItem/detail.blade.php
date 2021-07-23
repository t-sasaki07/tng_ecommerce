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
                  <img src="/image/{{$item->img_1}}" alt="" class="img">
                  <br>
                  <a href="/item/{{$item->id}}">{{$item->name}}</a><br>
									@if ( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) and ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) )
												<p style="color:#FF0000";>{{ $item->sale / 100 * $item->price }}</p>
									@else
										{{$item->price}}</br>
									@endif<br>
                  {{$item->comment}}<br>
                  {{$item->stock}}<br>
									
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
									<!-- お気に入りここまで -->

									<!-- 画像処理 -->
									@if (!empty($item->img_1))
												<img src="{{ asset('storage/'.$item->img_1)}}" alt="" width="100px" height="auto">
									@endif
									@if (!empty($item->img_2))
												<img src="{{ asset('storage/'.$item->img_2)}}" alt="" width="100px" height="auto">
									@endif
									@if (!empty($item->img_3))
												<img src="{{ asset('storage/'.$item->img_3)}}" alt="" width="100px" height="auto">
									@endif
									@if (!empty($item->img_4))
												<img src="{{ asset('storage/'.$item->img_4)}}" alt="" width="100px" height="auto">
									@endif
									<!-- 画像処理ここまで -->

                  <form action="mycart" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="submit" value="カートに入れる">
                  </form>
                  <br>

								</div>
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
				</form><!-- end /. form -->
			</div>
		</div><!-- end of/. row -->
	</div><!-- end of /.container -->
</section><!-- end of /.news letter section -->
@endsection