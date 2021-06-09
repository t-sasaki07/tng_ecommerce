<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>EC Site</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- common css -->
        {{-- <link rel="stylesheet" href="css/app.css"> --}}
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
		<link rel="stylesheet" href="css/common.css">

        {{-- <!--Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Font Awesome5-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> --}}

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
    @include('header')
    @yield('content')
    @include('footer')

    <!-- common js -->
		<!-- <script src=""></script> -->
		<script src="js/top.js "></script>
</body>

</html>
