<?php $__env->startSection('title', 'ユーザー詳細管理画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($user->name); ?></h1>
    <p>郵便番号：<?php echo e($user->postal_code); ?></p>
    <p>都道府県：<?php echo e($user->prefecture); ?></p>
    <p>市区町村：<?php echo e($user->city); ?></p>
    <p>番地：<?php echo e($user->block); ?></p>
    <p>建物名・部屋番号：<?php echo e($user->building); ?></p>
    <p>電話番号：<?php echo e($user->phone); ?></p>
    <p>メールアドレス：<?php echo e($user->email); ?></p>
    <form method=post action="<?php echo e(route('userDelete', $user->id)); ?>" onSubmit="return checkDelete()">
        <?php echo csrf_field(); ?>
        <button type=submit onclick="">削除</button>
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/admin/user_detail.blade.php ENDPATH**/ ?>