<?php $__env->startSection('title', '商品一覧管理画面'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- フラッシュメッセージ表示 -->
    <?php if(session('err_msg')): ?>
    <div class="err_msg">
        <?php echo e(session('err_msg')); ?>

    </div>
    <?php endif; ?>
    <!-- フラッシュメッセージ表示ここまで -->

    <!-- タイムセール時刻設定 -->
    <form method=post action="<?php echo e(route('timesale')); ?>" onSubmit="return checkSubmit()">
    <?php echo csrf_field(); ?>
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="<?php echo e(old('start')); ?>">
    <p>終了時間</p>
    <input id="start" type="time" name="fubush" value="<?php echo e(old('finish')); ?>">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    <!-- タイムセール時刻設定ここまで -->

    <table class="table-sm">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
        </tr>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><a href="/itemDetail/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a></th>
            <th><?php echo e($item->price); ?></th>
            <th><?php echo e($item->stock); ?></th>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </table>


</div>
<script>
    function checkSubmit() {
        if (window.confirm('タイムセールの時刻を登録してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views//itemIndexManage.blade.php ENDPATH**/ ?>