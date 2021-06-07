<?php $__env->startSection('title', '商品登録画面'); ?>
<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url('/itemIndexManage')); ?>">商品一覧</a>
<a href="<?php echo e(url('/itemRegister')); ?>">商品登録</a>

<a href="<?php echo e(url('/userDetail')); ?>">ユーザー一覧</a>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views/tentative.blade.php ENDPATH**/ ?>