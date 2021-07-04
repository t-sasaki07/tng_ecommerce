<?php $__env->startSection('title', '商品情報変更画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>商品情報変更</h1>
<form method="post" action="<?php echo e(route('rePost', $items->id)); ?>" enctype="multipart/form-data" onSubmit="return checkSubmit()">
    <?php echo csrf_field(); ?>
    <input id="id" type="hidden" name="id" value="<?php echo e($items->id); ?>">
        <p>商品名</p>
        <input id="name" type="text" name="name" value="<?php echo e($items->name); ?>">
        <?php if($errors->has('name')): ?>
        <?php echo e($errors->first('name')); ?>

        <?php endif; ?>

        <p>価格</p>
        <input id="price" type="int" name="price" value="<?php echo e($items->price); ?>">
        <?php if($errors->has('price')): ?>
        <?php echo e($errors->first('price')); ?>

        <?php endif; ?>

        <p>商品説明</p>
        <input id="comment" type="text" name="comment" value="<?php echo e($items->comment); ?>">
        <?php if($errors->has('comment')): ?>
        <?php echo e($errors->first('comment')); ?>

        <?php endif; ?>

        <p>在庫</p>
        <input id="stock" type="int" name="stock" value="<?php echo e($items->stock); ?>">
        <?php if($errors->has('stock')): ?>
        <?php echo e($errors->first('stock')); ?>

        <?php endif; ?>

        <p>割引率</p>
        <input id="sale" type="int" name="sale" value="<?php echo e($items->sale); ?>">
        <?php if($errors->has('sale')): ?>
        <?php echo e($errors->first('sale')); ?>

        <?php endif; ?>

        <p>商品画像①</p>
        <?php if(!empty($items->img_1)): ?>
        <img src="<?php echo e(asset('storage/'.$items->img_1)); ?>" alt="" width="100px" height="auto">
        <?php endif; ?>
        <input id="img_1" type="file" name="img_1" accept="image/*" value="<?php echo e($items->img_1); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_1')): ?>
        <?php echo e($errors->first('img_1')); ?>

        <?php endif; ?>

        <p>商品画像②</p>
        <?php if(!empty($items->img_2)): ?>
        <img src="<?php echo e(asset('storage/'.$items->img_2)); ?>" alt="" width="100px" height="auto">
        <?php endif; ?>
        <input id="img_2" type="file" name="img_2" accept="image/*" value="<?php echo e($items->img_2); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_2')): ?>
        <?php echo e($errors->first('img_2')); ?>

        <?php endif; ?>

        <p>商品画像③</p>
        <?php if(!empty($items->img_3)): ?>
        <img src="<?php echo e(asset('storage/'.$items->img_3)); ?>" alt="" width="100px" height="auto">
        <?php endif; ?>
        <input id="img_3" type="file" name="img_3" accept="image/*" value="<?php echo e($items->img_3); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_3')): ?>
        <?php echo e($errors->first('img_3')); ?>

        <?php endif; ?>

        <p>商品画像④</p>
        <?php if(!empty($items->img_4)): ?>
        <img src="<?php echo e(asset('storage/'.$items->img_4)); ?>" alt="" width="100px" height="auto">
        <?php endif; ?>
        <input id="img_4" type="file" name="img_4" accept="image/*" value="<?php echo e($items->img_4); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_4')): ?>
        <?php echo e($errors->first('img_4')); ?>

        <?php endif; ?>


        <button type="submit">登録する</button>
    </form>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views/itemChange.blade.php ENDPATH**/ ?>