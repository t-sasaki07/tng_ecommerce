<?php $__env->startSection('content'); ?>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-12 card border-dark mt-5">
                    <div class="cord-body ml-3 mb-2">
                        <h4 class="mt-4">お届け先</h4>
                        <p class="mb-2">
                            <?php if(Auth::check()): ?>
                                <?php echo e($sessionUser->postal_code); ?>

                                <?php echo e($sessionUser->prefecture); ?>

                                <?php echo e($sessionUser->city); ?>

                                <?php echo e($sessionUser->block); ?>

                                <?php echo e($sessionUser->building); ?>

                            <?php endif; ?>
                        </p>
                        <p style="padding-left: 160px;">
                            <?php if(Auth::check()): ?>
                                <?php echo e($sessionUser->name); ?>

                                <?php echo e($sessionUser->phone); ?>

                            <?php endif; ?>
                            様
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <table class="table mt-5 ml-3 border-dark">
                    <thead>
                        <tr class="text-center">
                            <th class="border-bottom border-dark">No</th>
                            <th class="border-bottom border-dark">商品名</th>
                            <th class="border-bottom border-dark">値段</th>
                            <th class="border-bottom border-dark">個数</th>
                            <th class="border-bottom border-dark">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $__currentLoopData = $cartData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <th class="align-middle"><?php echo e($key += 1); ?></th>
                                    <td class="align-middle">
                                        <?php echo e($data['item_name']); ?>

                                    </td>
                                    <td class="align-middle">
                                        ¥<?php echo e(number_format($data['price'])); ?> 円
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-outline-dark">
                                            <?php echo e($data['session_quantity']); ?>

                                        </button>
                                        個
                                    </td>
                                    <td class="align-middle">
                                        ¥<?php echo e(number_format($data['session_quantity'] * $data['price'])); ?>

                                    </td>

                                    <td class="border-0 align-middle">
                                        <?php echo Form::open(['route' => ['itemRemove', 'method' => 'post', $data['session_items_id']]]); ?>

                                            <?php echo e(Form::submit('削除', ['name' => 'delete_items_id', 'class' => 'btn btn-danger'])); ?>

                                            <?php echo e(Form::hidden('item_id', $data['session_items_id'])); ?>

                                            <?php echo e(Form::hidden('item_quantity', $data['session_quantity'])); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr class="text-center">
                                <th class="border-bottom-0 align-middle"></th>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle"></td>
                                <td class="border-bottom-0 align-middle">合計</td>
                                <?php
                                    $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                                ?>
                                    <td class="border-bottom-0 align-middle">
                                        ¥<?php echo e($totalPrice); ?>円
                                    </td>
                            </tr>


                        <tr class="text-right">
                            <th class="border-0"></th>
                            <td class="border-0">
                                <a class="btn btn-success" href="<?php echo e(route('item.index')); ?>" role="button">
                                    買い物を続ける
                                </a>
                            </td>
                            <td class="border-0"></td>
                            <td class="border-0"></td>
                            <td class="border-0">
                                <?php echo Form::open(['route' => ['orderFinalize', 'method' => 'post', $data['session_items_id']]]); ?>

                                    <?php echo e(Form::submit('注文を確定する', ['name' => 'orderFinalize', 'class' => 'btn btn-primary'])); ?>

                                <?php echo Form::close(); ?>

                            </td>
                            <td class="border-0 align-middle"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/user/cartlist.blade.php ENDPATH**/ ?>