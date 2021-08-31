<?php $__env->startSection('title', 'ユーザー情報'); ?>
<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url('/user/detail')); ?>">ユーザー情報確認</a>
<a href="<?php echo e(url('/user/like_list')); ?>">お気に入り一覧</a>
<a href="<?php echo e(url('/user/order_list')); ?>">購入履歴一覧</a>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/top.blade.php ENDPATH**/ ?>