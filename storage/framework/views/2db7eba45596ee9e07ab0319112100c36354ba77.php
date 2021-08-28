<?php $__env->startSection('content'); ?>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="mb-2">
                            <?php if(Auth::check()): ?>
                                <?php echo e($user->postal_code); ?>

                                <?php echo e($user->prefecture); ?>

                                <?php echo e($user->city); ?>

                                <?php echo e($user->block); ?>

                                <?php echo e($user->building); ?>

                            <?php endif; ?>
                        </p>
                        <p style="padding-left: 160px;">
                            <?php if(Auth::check()): ?>
                                <?php echo e($user->name); ?>

                                <?php echo e($user->phone); ?>

                            <?php endif; ?>
                            様
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="font-size:24px;">
                カートに商品がありません
            </div>
        </div>

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/no_cart_list.blade.php ENDPATH**/ ?>