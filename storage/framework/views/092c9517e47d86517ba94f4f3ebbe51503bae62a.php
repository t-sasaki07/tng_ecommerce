<?php $__env->startSection('title', 'ユーザー登録内容'); ?>
<?php $__env->startSection('content'); ?>
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">ユーザー登録内容</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">
                        名前
                    </label>
                    <div>
                        <input class="form-control" value="<?php echo e($user->name); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">
                        E-Mail
                    </label>
                    <div>
                        <input class="form-control" value="<?php echo e($user->email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">
                            郵便番号
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->postal_code); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prefecture">
                            都道府県
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->prefecture); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            市区町村
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->city); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="block">
                            番地
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->block); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="building">
                            建物名
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->building); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            電話番号
                        </label>
                        <div>
                            <input class="form-control" value="<?php echo e($user->phone); ?>">
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(action('User\UserController@edit')); ?>"><button class="user-btn">ユーザー登録内容の編集</button></a>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/detail.blade.php ENDPATH**/ ?>