<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<title>EC Site</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- common css -->
		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/common.css">


        

        <!-- jQuery cdn -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style type="text/css">
            .pr-mng {
                width: 80%;
                margin: 20px 10%;
            }
        </style>
    </head>

    <body>
		<!-- <?php echo $__env->yieldContent('header'); ?> -->
		<section class="header-top-section">
			<div class="container">
				<div class="row">
					<div  class="col-md-6">
						<div class="header-top-content">
							<ul class="nav nav-pills navbar-left">
								<li><a href="#"><i class="pe-7s-call"></i><span>STORE TOP</span></a></li>
								<li><a href=""><i class="pe-7s-call"></i><span>123-123456789</span></a></li>
								<li><a href=""><i class="pe-7s-mail"></i><span> info@mart.com</span></a></li>
							</ul>
						</div>
					</div>
					<div  class="col-md-6">
						<div class="header-top-menu">
							<ul class="nav nav-pills navbar-right">
								<li><a href='#'>My Account</a></li>
								<li><a href="#">Cart</a></li>
                                <?php if(Route::has('login')): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <li><a href="<?php echo e(url('/home')); ?>"><i class="pe-7s-lock"></i>Home</a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(url('/home')); ?>"><i class="pe-7s-lock"></i>Login</a></li>

                                        <?php if(Route::has('register')): ?>
                                            <li><a href="<?php echo e(route('register')); ?>"><i class="pe-7s-lock"></i>Register</a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
								<li><a href="#">Manage</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

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
							<li class="active"><a href="#">Home</a></li>
							<!-- <li><a href="#">page</a></li> -->
							<li><a href="#">shop</a></li>
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

		<section class="slider-section">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators slider-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="images/slider.jpg" width="1648" height="600" alt="">
						<div class="carousel-caption">
							<h2>DRESSES <b>&</b> JEANS</h2>
							<h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
							<a href="#">Buy Now</a>
						</div>
					</div>
					<div class="item">
						<img src="images/slider.jpg" width="1648" height="600" alt="">
						<div class="carousel-caption">
							<h2>DRESSES <b>&</b> JEANS</h2>
							<h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
							<a href="#">Buy Now</a>
						</div>
					</div>
					<div class="item ">
						<img src="images/slider.jpg" width="1648" height="600" alt="">
						<div class="carousel-caption">
							<h2>DRESSES <b>&</b> JEANS</h2>
							<h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
							<a href="#">Buy Now</a>
						</div>
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
			</div>
		</section>

		<section class="new-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="titie-section wow fadeInDown animated ">
							<h1>OUR COLLECTION</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- 1行に最大4アイテム/最小2アイテム -->
						<div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="">
							<div class="product-item">

								<img id="" src= 'images/1.jpg' class="img-responsive shop_modal" width="255" height="322" alt="">

								<div class="product-hover">
									<div class="product-meta">
										<a href="#"><i class="pe-7s-like"></i></a>
										<a href="#"><i class="pe-7s-shuffle"></i></a>
										<a href="#"><i class="pe-7s-clock"></i></a>
										<a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
									</div>
								</div>
								<div class="discount_banner"></div>
								<div class="product-title">
									<h3 class="name"></h3>
									<span class="price"></span>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="">
							<div class="product-item">

								<img id="" src= 'images/2.jpg' class="img-responsive shop_modal" width="255" height="322" alt="">

								<div class="product-hover">
									<div class="product-meta">
										<a href="#"><i class="pe-7s-like"></i></a>
										<a href="#"><i class="pe-7s-shuffle"></i></a>
										<a href="#"><i class="pe-7s-clock"></i></a>
										<a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
									</div>
								</div>
								<div class="discount_banner"></div>
								<div class="product-title">
									<h3 class="name"></h3>
									<span class="price"></span>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="">
							<div class="product-item">

								<img id="" src= 'images/3.jpg' class="img-responsive shop_modal" width="255" height="322" alt="">

								<div class="product-hover">
									<div class="product-meta">
										<a href="#"><i class="pe-7s-like"></i></a>
										<a href="#"><i class="pe-7s-shuffle"></i></a>
										<a href="#"><i class="pe-7s-clock"></i></a>
										<a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
									</div>
								</div>
								<div class="discount_banner"></div>
								<div class="product-title">
									<h3 class="name"></h3>
									<span class="price"></span>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="">
							<div class="product-item">

								<img id="" src= 'images/4.jpg' class="img-responsive shop_modal" width="255" height="322" alt="">

								<div class="product-hover">
									<div class="product-meta">
										<a href="#"><i class="pe-7s-like"></i></a>
										<a href="#"><i class="pe-7s-shuffle"></i></a>
										<a href="#"><i class="pe-7s-clock"></i></a>
										<a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
									</div>
								</div>
								<div class="discount_banner"></div>
								<div class="product-title">
									<h3 class="name"></h3>
									<span class="price"></span>
								</div>
							</div>
						</div>
				</div>
			</div>
		</section>

		<!-- modal -->
		<div id="modal_ec" class="modal_ec">
			<div class="modal_base">
				<div class="modal-body">
					<div id="modal_content" class="modal_content">
						<div class="item_contents">
							<p class="p_product_id"><span id="product_id"></span></p>
							<div class="item_img">
								<img id="modal_img" src="">
							</div>
							<div class="item_details">
								<p>商品名: <span id="product_name"></span></p>
								<p>価格: <span id="product_price"> 円</span></p>
								<p>割引額: <span id="discount_val"> 円</span></p>
								<div>
									<label for="size_selection">サイズ</label>
									<select name="size_selection" id="size_selection">
									</select>
								</div>
								<div>
									<label for="num_of_buy">個数</label>
									<select name="num_of_buy" id="num_of_buy">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
									</select>
								</div>
							</div>
						</div>
						<div><p id="guidance"></p></div>

					</div>
					<div class="modal_btn_div">
						<div id="beforeChoose" class="modal_btns">
							<button id="put_item_btn" class="btn btn-success btn_modal">カートへ入れる</button>
							<button class="btn btn-danger btn_modal close_btn">とじる</button>
						</div>
						<div id="afterChoose" class="modal_btns">
							<button id="remove_item_btn" class="btn btn-success btn_modal">カートから除く</button>
							<button id="check_cart_btn" class="btn btn-success btn_modal">カートの確認</button>
							<button class="btn btn-danger btn_modal close_btn">とじる</button>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- <?php echo $__env->yieldContent('footer'); ?> -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="center">Made with <i class="fa fa-heart"></i> by <a href="https://revolthemes.net/" target="_blank">Revolthemes</a>. All Rights Reserved</p>

					</div>
				</div>
			</div>
		</footer>

		<!-- common js -->
		<!-- <script src=""></script> -->
		<script src="js/top.js "></script>
	</body>
</html>
<?php /**PATH C:\MAMP\htdocs\ec-test\resources\views/toppage.blade.php ENDPATH**/ ?>