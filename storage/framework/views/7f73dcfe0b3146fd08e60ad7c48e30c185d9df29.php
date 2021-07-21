<?php $__env->startSection('title', '商品登録画面'); ?>
<?php $__env->startSection('content'); ?>


<a href="<?php echo e(url('/itemIndexManage')); ?>">商品一覧</a>
<a href="<?php echo e(url('/itemRegister')); ?>">商品登録</a>
<a href="<?php echo e(url('/userDetail')); ?>">ユーザー一覧</a>


<?php if(empty($time)): ?>
  <!-- タイムセールの時刻が設定されていない -->
  タイムセールの時刻は決定されていません。

<?php elseif( ($time->start  < \Carbon\Carbon::now()->format("H:i:s") ) and ( $time->finish > \Carbon\Carbon::now()->format("H:i:s") ) ): ?>
  <!-- タイムセールの時間帯 -->
  現在タイムセール中です。

<?php else: ?>
  <!-- タイムセール時間外 -->
  タイムセールの時刻は、<?php echo e($time->start); ?>〜<?php echo e($time->finish); ?>です。
<?php endif; ?>

<?php if( ( Auth::guard('user')->check() ) and ( Auth::guard('admin')->check() ) ): ?>
  <!-- 管理者、ユーザーログイン済 -->
  管理者、ユーザー権限ともにログイン済です

<?php elseif( Auth::guard('admin')->check() ): ?>
  <!-- 管理者（Admin）にてログインしている -->
  管理者権限にてログイン済です

<?php elseif( Auth::guard('user')->check() ): ?>
  <!-- ユーザー（User）にてログインしている -->
  ユーザーログイン済です

<?php else: ?>
  ログインしていません

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/tentative.blade.php ENDPATH**/ ?>