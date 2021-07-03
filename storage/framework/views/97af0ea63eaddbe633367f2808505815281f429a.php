<?php $__env->startSection('title', '商品登録画面'); ?>
<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url('/itemIndexManage')); ?>">商品一覧</a>
<a href="<?php echo e(url('/itemRegister')); ?>">商品登録</a>
<a href="<?php echo e(url('/userDetail')); ?>">ユーザー一覧</a>

<?php if( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) === ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) ): ?>
現在タイムセール中です。
<?php else: ?>
タイムセールの時刻は、<?php echo e($time->start); ?>〜<?php echo e($time->finish); ?>です。
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views/tentative.blade.php ENDPATH**/ ?>