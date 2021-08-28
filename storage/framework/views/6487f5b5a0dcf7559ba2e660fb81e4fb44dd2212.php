<?php $__env->startSection('content'); ?>
		<header class="header-section">
				<?php echo $__env->make('second-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
								<div class="row col-lg-10 col-md-6">
										<a href="/item/detail/<?php echo e($random_item1->id); ?>" class=" img-responsive shop_modal" width="255" height="322" alt="">
											<div class="card">
													<img src="<?php echo e(asset('storage/'.$random_item1->img_1)); ?>" class="item-img">
													<div class="card-body">
															<p class="card-title"><?php echo e($random_item1->name); ?></p>
															<p class="card-text">¥<?php echo e(number_format($random_item1->price)); ?> </p>
													</div>
											</div>
										</a>
								</div>
							</div>

							<div class="product-item">
								<div class="row col-lg-10 col-md-6">
										<a href="/item/detail/<?php echo e($random_item2->id); ?>" class=" img-responsive shop_modal" alt="">
											<div class="card">
													<img src="<?php echo e(asset('storage/'.$random_item2->img_1)); ?>" class="item-img">
													<div class="card-body">
															<p class="card-title"><?php echo e($random_item2->name); ?></p>
															<p class="card-text">¥<?php echo e(number_format($random_item2->price)); ?> </p>
													</div>
											</div>
										</a>
								</div>
							</div>

							<div class="product-item">
								<div class="row col-lg-10 col-md-6">
										<a href="/item/detail/<?php echo e($random_item3->id); ?>" class=" img-responsive shop_modal" alt="">
											<div class="card">
													<img src="<?php echo e(asset('storage/'.$random_item3->img_1)); ?>" class="item-img">
													<div class="card-body">
															<p class="card-title"><?php echo e($random_item3->name); ?></p>
															<p class="card-text">¥<?php echo e(number_format($random_item3->price)); ?> </p>
													</div>
											</div>
										</a>
								</div>
							</div>

							<div class="product-item">
								<div class="row col-lg-10 col-md-6">
										<a href="/item/detail/<?php echo e($random_item4->id); ?>" class=" img-responsive shop_modal" alt="">
											<div class="card">
													<img src="<?php echo e(asset('storage/'.$random_item4->img_1)); ?>" class="item-img">
													<div class="card-body">
															<p class="card-title"><?php echo e($random_item4->name); ?></p>
															<p class="card-text">¥<?php echo e(number_format($random_item4->price)); ?> </p>
													</div>
											</div>
										</a>
								</div>
							</div>
							
						</div>
				</div>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/top.blade.php ENDPATH**/ ?>