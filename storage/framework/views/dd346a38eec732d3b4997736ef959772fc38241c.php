<?php $__env->startSection('title', '商品一覧画面'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="">
		<div class="mx-auto" style="max-width:1200px">
			<h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
				<div class="">
                    <div class="d-flex flex-row flex-wrap">
                        <table claas="table-sm">
                            <tr>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>商品説明</th>
                                <th>お気に入り</th>
                            </tr>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><img src="<?php echo e(asset('storage/'.$item->img_1)); ?>" alt="" class="img" width="100px" height="auto"></th>
                                <th><a href="/item/detail/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a><br></th>
                                <th><?php echo e($item->price); ?></th>
                                <th><?php echo e($item->comment); ?></th>
                                <th>
                                    <!-- ユーザーログインがない場合、お気に入り機能を非表示にする -->
                                    <?php if(Auth::guard('user')->check() === false): ?>
                                    <i class="fas fa-heart"><?php echo e($like_item->likes_count); ?></i>
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
                                <th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/item/index.blade.php ENDPATH**/ ?>