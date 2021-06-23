<?php $__env->startSection('title', '商品詳細管理画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($item->name); ?></h1>
    <p>価格：<?php echo e($item->price); ?> + 税</p>
    <p>在庫：<?php echo e($item->stock); ?></p>
    <p>商品説明：<?php echo e($item->comment); ?></p>
    <p>タイムセール時の割引率：<?php echo e($item->sale); ?>%</p>
    <img src="<?php echo e(asset('/storage/'.$item->img_1)); ?>" alt="" width="50px" height="auto">
    <img src="<?php echo e(asset('/storage/'.$item->img_2)); ?>" alt="" width="50px" height="auto">
    <img src="<?php echo e(asset('/storage/'.$item->img_3)); ?>" alt="" width="50px" height="auto">
    <img src="<?php echo e(asset('/storage/'.$item->img_4)); ?>" alt="" width="50px" height="auto">



</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views/itemDetailManage.blade.php ENDPATH**/ ?>