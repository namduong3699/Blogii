<!DOCTYPE html>
<html>
<head>
	<base href="{{ asset('') }}loginn/">
	<title>Login</title>

	<link href="assets/css/demo3/pages/login/login-1.css" rel="stylesheet" type="text/css" />
	<link href="assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />

	<!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->

	<style>
		.forgot-pass {
			display: none;
		}
	</style>
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >


	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
				<!--begin::Aside-->
				<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(assets/media/bg/bg-6.jpg);">
					<div class="kt-grid__item">
						<a href="#" class="kt-login__logo">
							<img src="icon/icon-main.png" width="90px">
						</a>
					</div>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
						<div class="kt-grid__item kt-grid__item--middle">
							<h3 class="kt-login__title">Welcome to Blogii!!</h3>
							<h4 class="kt-login__subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis totam expedita quam? Voluptas, ullam, mollitia.</h4>
						</div>
					</div>
					<div class="kt-grid__item">
						<div class="kt-login__info">
							<div class="kt-login__copyright">
								&copy NamUET
							</div>
							<div class="kt-login__menu">
								<a href="#" class="kt-link">Privacy</a>
								<a href="#" class="kt-link">Legal</a>
								<a href="#" class="kt-link">Contact</a>
							</div>
						</div>
					</div>
				</div>
				<!--begin::Aside-->

				<!--begin::Content-->
				<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
					<!--begin::Head-->
					<div class="kt-login__head">
						<span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
						<a href="{{URL::to('signUp')}}" class="kt-link kt-login__signup-link">Sign Up!</a>
					</div>
					<!--end::Head-->

					<!--begin::Body-->
					<div class="kt-login__body">

						<!--begin::Login-->
						<div class="kt-login__form login-form">
							<div class="kt-login__title">
								<h3>Login</h3>
							</div>			

							<!--begin::Form-->
							<form class="kt-form" action="{{url('login')}}" novalidate="novalidate" method="post">
								@csrf
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<!--begin::Action-->
								<div class="kt-login__actions">
									<span class="kt-link kt-login__link-forgot">
										Forgot Password ?
									</span>
									<input type=submit id="" class="btn btn-primary btn-elevate kt-login__btn-primary" value="Login"></button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->

							<!--begin::Divider-->
							<div class="kt-login__divider">
								<div class="kt-divider">
									<span></span>
									<span>OR</span>
									<span></span>
								</div>
							</div>
							<!--end::Divider-->

							<!--begin::Options-->
							<div class="kt-login__options">
								<a href="{{URL::to('redirect/facebook')}}" class="btn btn-primary kt-btn">
									<i class="fab fa-facebook-f"></i>
									Facebook
								</a>

								<a href="#" class="btn btn-info kt-btn">
									<i class="fab fa-twitter"></i>
									Twitter
								</a>

								<a href="{{URL::to('redirect/google')}}" class="btn btn-danger kt-btn">
									<i class="fab fa-google"></i>
									Google
								</a>
							</div>
							<!--end::Options-->
						</div>
						<!--end::Login-->

						<!--begin::Forgot password-->
						<div class="kt-login__form forgot-pass">
							<div class="kt-login__title">
								<h3>Forgot password</h3>
							</div>			

							<!--begin::Form-->
							<form class="kt-form" action="{{URL::to('postResetPassword')}}" novalidate="novalidate" method="post">
								@csrf
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>

								<!--begin::Action-->
								<div class="kt-login__actions">
									<span class="kt-link kt-login__link-forgot forgot-back">
										Back
									</span>
									<input type=submit id="" class="btn btn-primary btn-elevate kt-login__btn-primary" value="Send"></button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->

							<!--end::Options-->
						</div>
						<!--end::Forgot password-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Content-->
			</div>
		</div>
	</div>
	
	<!-- end:: Page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script>
		$('.kt-login__link-forgot').click(function() {
			$('.login-form').css('display', 'none');
			$('.forgot-pass').css('display', 'block');
		});
		$('.forgot-back').click(function() {
			$('.login-form').css('display', 'block');
			$('.forgot-pass').css('display', 'none');
		});
	</script>
	

	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
	</script>
	<!-- end::Global Config -->

	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
	<script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts(used by this page) -->
	<script src="assets/js/demo3/pages/login/login-1.js" type="text/javascript"></script>
</body>
</html>