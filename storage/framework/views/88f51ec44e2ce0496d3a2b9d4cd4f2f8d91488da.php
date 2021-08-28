<?php $__env->startSection('content'); ?>

    <main>
        <div class="container">
            <div class="row" style="font-size:24px;">
                <h1>購入が完了しました</h1>
                    <h1>ご購入ありがとうございます！</h1>
                    <p class="h1">注文番号:<?php echo e($order->order_number); ?></p>
            </div>
        </div>

    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/purchase_completed.blade.php ENDPATH**/ ?>