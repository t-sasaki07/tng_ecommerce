<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<title>EC Site</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- common css -->
		<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

		<link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">


        <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Font Awesome5-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 

        <!-- jQuery cdn -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style type="text/css">
            .pr-mng {
                width: 80%;
                margin: 20px 10%;
            }
        </style>
    </head>

<body>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

<script src="<?php echo e(mix('js/_ajaxlike.js')); ?>"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/tng_ec_sum/resources/views/layout.blade.php ENDPATH**/ ?>