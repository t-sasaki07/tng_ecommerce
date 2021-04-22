<?php echo $__env->yieldContent('header'); ?>
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
<?php /**PATH C:\MAMP\htdocs\tng_ec_subject\tng_ec_subject\resources\views/header.blade.php ENDPATH**/ ?>