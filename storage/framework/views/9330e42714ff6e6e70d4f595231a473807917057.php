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
                  <img src="/image/<?php echo e($item->img_1); ?>" alt="" class="img">
                  <br>
                  <a href="/item/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a><br>
									<?php if( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) and ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) ): ?>
												<p style="color:#FF0000";><?php echo e($item->sale / 100 * $item->price); ?></p>
									<?php else: ?>
										<?php echo e($item->price); ?></br>
									<?php endif; ?><br>
                  <?php echo e($item->comment); ?><br>
                  <?php echo e($item->stock); ?><br>
									<?php if(!empty($item->img_1)): ?>
												<img src="<?php echo e(asset('storage/'.$item->img_1)); ?>" alt="" width="100px" height="auto">
											<?php endif; ?>
                  <form action="mycart" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                    <input type="submit" value="カートに入れる">
                  </form>
                  <br>
                  <form action="myfavorite" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
                    <input type="submit" value="お気に入り">
                  </form>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/userItem/detail.blade.php ENDPATH**/ ?>