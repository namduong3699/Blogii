<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<!-- <base href="{{ asset('') }}public/"> -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>


<body>
	@yield('header')


	
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="lib/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/scrollbar.js"></script>
	<script type="text/javascript" src="js/script.js"></script>


	<div class="wrapper" style="margin-top: 40px">		
		@yield('content')
	</div><!--theme-layout end-->

	@yield('footer')





</body>
</html>