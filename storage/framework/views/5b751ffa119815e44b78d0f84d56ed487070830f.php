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
    <?php if(!empty($time->start)): ?>
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="<?php echo e($time->start); ?>">
    <p>終了時間</p>
    <input id="finish" type="time" name="finish" value="<?php echo e($time->finish); ?>">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    <form method=post action="<?php echo e(route('timeDelete', $time->id)); ?>" onSubmit="return checkDelete()">
        <?php echo csrf_field(); ?>
        <button type=submit onclick="">時刻を削除する</button>
    </form>
    <?php else: ?>
    <p>開始時間</p>
    <input id="start" type="time" name="start" value="<?php echo e(old('start')); ?>">
    <p>終了時間</p>
    <input id="finish" type="time" name="finish" value="<?php echo e(old('finish')); ?>">
    <button type=submit class="btn btn-primary">設定する</button>
    </form>
    <?php endif; ?>
    <!-- タイムセール時刻設定ここまで -->

    <table class="table-sm">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>お気に入り</th>
        </tr>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><a href="/admin/item_detail/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a></th>
            <th><?php echo e($item->price); ?></th>
            <th><?php echo e($item->stock); ?></th>
            <th>
                <!-- ユーザーログインがない場合、お気に入り機能を非表示にする -->
                <?php if(Auth::guard('user')->check() === false): ?>
                <i class="fas fa-heart"></i>
                <span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
                <!-- ユーザーログインがあり、まだお気に入りしていない表示  -->
                <?php elseif($like_model->like_exist(Auth::guard('user')->user()->id, $item->id)): ?>
                <p class="favorite-marke">
                <a class="js-like-toggle loved" href="" data-itemid="<?php echo e($item->id); ?>">
                    <i class="fas fa-heart"></i>
                </a>
                <span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
                </p>
                <!-- ユーザーログインがあり、お気に入りしている表示 -->
                <?php else: ?>
                <p class="favorite-marke">
                <a class="js-like-toggle" href="" data-itemid="<?php echo e($item->id); ?>">
                    <i class="fas fa-heart"></i>
                </a>
                <span class="likeCount"><?php echo e($like_item->likes_count); ?></span>
                </p>
                <?php endif; ?>
                <!-- お気に入りここまで -->
            </th>
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
<script>
        function checkDelete() {
            if (window.confirm('タイムセールの時刻を削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views//admin/item_index.blade.php ENDPATH**/ ?>