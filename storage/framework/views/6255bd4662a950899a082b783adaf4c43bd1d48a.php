<?php $__env->startSection('title', 'ユーザー一覧管理画面'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <table class="table-sm">
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
            <th></th>
        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><a href="/userDetail/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></a></th>
            <th><?php echo e($user->email); ?></th>
            <th>
                <form method=post action="<?php echo e(route('userDelete', $user->id)); ?>" onSubmit="return checkDelete()">
                    <?php echo csrf_field(); ?>
                    <button type=submit onclick="">削除</button>
                </form>
            </th>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </table>
</div>
    <script>
        function checkD() {
            if (window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ecommerce/resources/views/userIndex.blade.php ENDPATH**/ ?>