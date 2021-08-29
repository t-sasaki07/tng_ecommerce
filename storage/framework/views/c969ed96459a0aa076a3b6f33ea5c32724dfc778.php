<?php $__env->startSection('content'); ?>
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
								<img src="<?php echo e(asset('storage/'.$item->img_1)); ?>" alt="" width="100px" height="auto">
								<img src="<?php echo e(asset('storage/'.$item->img_2)); ?>" alt="" width="100px" height="auto">
								<img src="<?php echo e(asset('storage/'.$item->img_3)); ?>" alt="" width="100px" height="auto">
								<img src="<?php echo e(asset('storage/'.$item->img_4)); ?>" alt="" width="100px" height="auto">
                    <br>
                    <a href="/item/detail/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a><br>
                    <?php echo e($item->price); ?><br>
                    <?php echo e($item->comment); ?><br>
										<!-- ユーザーログインがない場合、お気に入り機能を非表示にする -->
										<?php if(Auth::guard('user')->check() === false): ?>
										<i class="fas fa-heart"></i>
										<span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
										<!-- ユーザーログインがあり、まだお気に入りしていない表示  -->
										<?php elseif($like_model->like_exist(Auth::guard('user')->user()->id, $item->id)): ?>
										<p class="favorite-marke">
										<a class="js-like-toggle loved" href="" data-itemid="<?php echo e($item->id); ?>">
												<i class="fas fa-heart"></i>
										</a>
										<span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
										</p>
										<!-- ユーザーログインがあり、お気に入りしている表示 -->
										<?php else: ?>
										<p class="favorite-marke">
										<a class="js-like-toggle" href="" data-itemid="<?php echo e($item->id); ?>">
												<i class="fas fa-heart"></i>
										</a>
										<span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
										</p>
										<?php endif; ?>
										<!-- お気に入りここまで -->
                </div>
								<?php if( Auth::guard('user')->check() ): ?>
									<?php echo Form::open(['route' => ['addcart.post', 'class' => 'd-inline']]); ?>


									
											<?php echo e(Form::hidden('items_id', $item->id)); ?>

											<?php echo e(Form::hidden('users_id', $user->id)); ?>


											<div class="form-row justify-content-center">
													<?php echo Form::label('prodqty', '購入個数', ['class' => 'mt-1']); ?>

													<div class="form-group col-sm-1">
															<div class="ml-1">
																	<input type="number" name="item_quantity" class="form-control" id="prodqty" pattern="[1-9][0-9]*" min="1" required autofocus>
															</div>
													</div>
													<?php echo Form::label('', '個', ['class' => 'mt-1 mr-3']); ?>

													<div class="form-group">
															<?php echo Form::submit('カートへ', ['class' => 'btn btn-primary']); ?>

													</div>
											</div>
									<?php echo Form::close(); ?>

								<?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/item/detail.blade.php ENDPATH**/ ?>