<!DOCTYPE html>
<html>
<head>
	<!-- <base href="{{ asset('') }}public/login/"> -->
	<base href="{{ asset('') }}login/">
	<title>Sign Up</title>

	<link href="assets/css/demo3/pages/login/login-1.css" rel="stylesheet" type="text/css" />
	<link href="assets/vendors/global/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />

	<!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

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
						<span class="kt-login__signup-label">Have an account?</span>&nbsp;&nbsp;
						<a href="{{URL::to('login')}}" class="kt-link kt-login__signup-link">Login!</a>
					</div>
					<!--end::Head-->

					<!--begin::Body-->
					<div class="kt-login__body">

						<!--begin::Login-->
						<div class="kt-login__form login-form">
							<div class="kt-login__title">
								<h3>Sign Up</h3>
							</div>	
							@if(isset($success) && $success == true)
							<div class="alert alert-solid-success alert-bold" role="alert">
								<div class="alert-text">Create account success! You are welcome!</div>
							</div>	
							@endif	

							<!--begin::Form-->
							<form id="form" class="kt-form" action="{{url('signUp')}}" novalidate="novalidate" method="post">
								@csrf
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Name" name="name">
								</div>
								<div class="kt-section__content kt-section__content--solid--">
									<ul class="validate-error">
										<li class="kt-font-danger kt-font-bold name-required">Name is required</li>
										<li class="kt-font-danger kt-font-bold name-c">Name contains only a-z, A-Z characters</li>
										<li class="kt-font-danger kt-font-bold name-min">Name contains at least 6 characters</li>
										<li class="kt-font-danger kt-font-bold name-max">Name contains max 30 characters</li>
									</ul>
								</div>

								<div class="form-group">
									<input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<ul class="validate-error">
									<li class="kt-font-danger kt-font-bold email-required">Email is required!</li>
									<li class="kt-font-danger kt-font-bold email-invalid">Invalid email</li>	
								</ul>

								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<ul class="validate-error">
									<li class="kt-font-danger kt-font-bold pass-required">Password id required!</li>
								</ul>

								<div class="form-group">
									<input class="form-control" type="password" placeholder="Repeat Password" name="rePassword">
								</div>
								<ul class="validate-error">
									<li class="kt-font-danger kt-font-bold pass-notsame">Password not same</li>
								</ul>

								<div class="form-group">
									<input class="form-control datepicker" type="text" placeholder="Birthday" name="birthday">
								</div>
								<ul class="validate-error">
									<li class="kt-font-danger kt-font-bold birthday-required">Birthday is required!</li>
									<li class="kt-font-danger kt-font-bold birthday-invalid">Invalid birthday</li>	
								</ul>

								<!--begin::Action-->
								<div class="kt-login__actions">
									<span class="kt-link kt-login__link-forgot" style="visibility: hidden;">
										Forgot Password ?
									</span>
									<input type=submit id="" class="btn btn-primary btn-elevate kt-login__btn-primary" value="Sign Up"></button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->

						</div>
						<!--end::Login-->

					</div>
					<!--end::Body-->
				</div>
				<!--end::Content-->
			</div>
		</div>
	</div>
	
	<!-- end:: Page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
		$( ".datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
		$(document).ready(function(){
			$('.validate-error').children().hide();

			function validateForm() {
				$('.validate-error').children().hide();
				var name = $('#form input[name="name"').val();
				var email = $('#form input[name="email"').val();
				var birthday = $('#form input[name="birthday"').val();
				var password = $('#form input[name="password').val();
				var rePassword = $('#form input[name="rePassword').val();
				var result = true;
				result &= validateName(name);
				result &= validateEmail(email);
				result &= validateBirhday(birthday);
				result &= validatePassword(password, rePassword);
				return result;
			}

			$('#form').submit(function(event) {
				$('.validate-error').children().hide();
				if(!validateForm()) {
					event.preventDefault();
				}
			});
		});

		function validateName(name) {
			var regex = /^[a-zA-Z ]$/;
			var result = true;
			if(name == '') {
				$('.name-required').show(); result = false;
			} else {
				if(regex.test(name) == false) {
					$('.name-invalid').show(); 
				}
				if(name.length < 6) {
					$('.name-min').show(); 
				}
				if(name.length > 20) {
					$('.name-max').show();
				}
			}

			return result;
		}

		function validateEmail(email) {
			var regex = /\S+@\S+\.\S+/;
			var result = true;
			if(email == '') {
				$('.email-required').show(); result = false;
			} else {
				if(regex.test(email) == false) {
					$('.email-invalid').show(); 
				}
			}
			return result;
		}

		function validateBirhday(birthday) {
			var regex = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
			var currentDate = new Date();
			var result = true;
			if(birthday == '') {
				$('.birthday-required').show(); result = false;
			} else {
				// if(regex.test(birthday) == false) {
				// 	$('.birthday-invalid').show();
				// }
			}
			return result;
		}

		function validatePassword(pass, repass) {
			var result = true;
			if(pass == '') {
				$('.pass-required').show();
				result = false;
			} else if(pass != repass) {
				$('.pass-notsame').show();
				result = false;
			}
			return result;
		}

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