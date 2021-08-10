<?php $__env->startSection('title', '商品登録画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- フラッシュメッセージ -->
    <?php if(session('err_msg')): ?>
    <div class="err_msg">
        <?php echo e(session('err_msg')); ?>

    </div>
    <?php endif; ?>
    <!-- フラッシュここまで -->
    <h1>商品登録</h1>
    <form enctype="multipart/form-data" method="post" action="<?php echo e(route('newPost')); ?>" onSubmit="return checkSubmit()">
    <?php echo csrf_field(); ?>
        <p>商品名</p>
        <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>">
        <?php if($errors->has('name')): ?>
        <?php echo e($errors->first('name')); ?>

        <?php endif; ?>

        <p>価格</p>
        <input id="price" type="int" name="price" value="<?php echo e(old('price')); ?>">
        <?php if($errors->has('price')): ?>
        <?php echo e($errors->first('price')); ?>

        <?php endif; ?>

        <p>商品説明</p>
        <input id="comment" type="text" name="comment" value="<?php echo e(old('comment')); ?>">
        <?php if($errors->has('comment')): ?>
        <?php echo e($errors->first('comment')); ?>

        <?php endif; ?>

        <p>在庫</p>
        <input id="stock" type="int" name="stock" value="<?php echo e(old('stock')); ?>">
        <?php if($errors->has('stock')): ?>
        <?php echo e($errors->first('stock')); ?>

        <?php endif; ?>

        <p>割引率</p>
        <input id="sale" type="int" name="sale" value="<?php echo e(old('sale')); ?>">
        <?php if($errors->has('sale')): ?>
        <?php echo e($errors->first('sale')); ?>

        <?php endif; ?>

        <p>商品画像①</p>
        <input id="img_1" type="file" name="img_1" accept="image/*" value="<?php echo e(old('img_1')); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_1')): ?>
        <?php echo e($errors->first('img_1')); ?>

        <?php endif; ?>

        <p>商品画像②</p>
        <input id="img_2" type="file" name="img_2" accept="image/*" value="<?php echo e(old('img_2')); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_2')): ?>
        <?php echo e($errors->first('img_2')); ?>

        <?php endif; ?>

        <p>商品画像③</p>
        <input id="img_3" type="file" name="img_3" accept="image/*" value="<?php echo e(old('img_3')); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_3')): ?>
        <?php echo e($errors->first('img_3')); ?>

        <?php endif; ?>

        <p>商品画像④</p>
        <input id="img_4" type="file" name="img_4" accept="image/*" value="<?php echo e(old('img_4')); ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <?php if($errors->has('img_4')): ?>
        <?php echo e($errors->first('img_4')); ?>

        <?php endif; ?>



        <button type="submit">登録する</button>
    </form>
</div>
<script>
    function checkSubmit() {
        if (window.confirm('登録してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/admin/item_register.blade.php ENDPATH**/ ?>