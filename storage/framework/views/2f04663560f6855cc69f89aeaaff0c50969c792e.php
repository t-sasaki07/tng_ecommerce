<?php $__env->startSection('title', '商品詳細管理画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($item->name); ?></h1>
    <p>価格：<?php echo e($item->price); ?> + 税</p>
    <p>在庫：<?php echo e($item->stock); ?></p>
    <p>商品説明：<?php echo e($item->comment); ?></p>
    <p>タイムセール時の割引率：<?php echo e($item->sale); ?>%</p>
    <img src="<?php echo e(asset('storage/'.$item->img_1)); ?>" alt="" width="100px" height="auto">
    <img src="<?php echo e(asset('storage/'.$item->img_2)); ?>" alt="" width="100px" height="auto">
    <img src="<?php echo e(asset('storage/'.$item->img_3)); ?>" alt="" width="100px" height="auto">
    <img src="<?php echo e(asset('storage/'.$item->img_4)); ?>" alt="" width="100px" height="auto">
    <a href="/admin/item_change/<?php echo e($item->id ); ?>">変更する</a>
    <form method=post action="<?php echo e(route('itemDelete', $item->id)); ?>" onSubmit="return checkDelete()">
        <?php echo csrf_field(); ?>
        <button type=submit onclick="">削除する</button>
    </form>
</div>
<script>
        function checkDelete() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/admin/item_detail.blade.php ENDPATH**/ ?>