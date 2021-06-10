@extends('layouts.layout')
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