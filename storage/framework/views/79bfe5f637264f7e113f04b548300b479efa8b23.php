<?php $__env->startSection('title', 'ユーザー登録内容'); ?>
<?php $__env->startSection('content'); ?>
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">ユーザー登録内容の変更</div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(action('User\UserController@update')); ?>">
                    <div class="form-group">
                        <label for="name">
                            名前
                        </label>
                        <div>
                            <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            E-Mail
                        </label>
                        <div>
                            <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">
                            郵便番号
                        </label>
                        <div>
                            <input type="text" name="postal_code" class="form-control" value="<?php echo e($user->postal_code); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prefecture">
                            都道府県
                        </label>
                        <div>
                            <input type="text" name="prefecture" class="form-control" value="<?php echo e($user->prefecture); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">
                            市区町村
                        </label>
                        <div>
                            <input type="text" name="city" class="form-control" value="<?php echo e($user->city); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="block">
                            番地
                        </label>
                        <div>
                            <input type="text" name="block" class="form-control" value="<?php echo e($user->block); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="building">
                            建物名
                        </label>
                        <div>
                            <input type="text" name="building" class="form-control" value="<?php echo e($user->building); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            電話番号
                        </label>
                        <div>
                            <input type="text" name="phone" class="form-control" value="<?php echo e($user->phone); ?>">
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo e($user->id); ?>">
                    <?php if($errors->has('user_id')): ?>
                    <?php echo e($errors->first('user_id')); ?>

                    <?php endif; ?>
                    <button type="submit" class="user-btn">変更</button>
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/edit.blade.php ENDPATH**/ ?>