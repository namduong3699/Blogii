@extends('main')

@section('title', 'Account Setting')

@section('header')
@include('modules/header')
@endsection

@section('content')
<section class="profile-account-setting">
	<div class="container">
		<div class="account-tabs-setting">
			<div class="row">
				<div class="col-lg-3">
					<div class="acc-leftbar">
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">
								<i class="fa fa-lock"></i>
								Change Password
							</a>
						</div>
					</div><!--acc-leftbar end-->
				</div>
				<div class="col-lg-9">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
							<div class="acc-setting">
								<h3>Account Setting</h3>
								<form id="form" action="{{URL::to('resetPasswordForm')}}" method="post">
									@csrf
									<div class="cp-field">
										<h5>New Password</h5>
										<div class="cpp-fiel">
											<input type="password" name="newPassword" placeholder="New Password">
											<i class="fa fa-lock"></i>
										</div>
									</div>
									<div class="cp-field">
										<h5>Repeat Password</h5>
										<div class="cpp-fiel">
											<input type="password" name="repeatPassword" placeholder="Repeat Password">
											<i class="fa fa-lock"></i>
										</div>
										<p class="validate-pass-notsame" style="color: #e74c3c">Repeat password is not same password</p>
									</div>
									<div class="save-stngs pd2">
										<ul>
											<li><button class="reset-pass-btn" type="submit">Save Setting</button></li>
										</ul>
									</div><!--save-stngs end-->
								</form>
							</div><!--acc-setting end-->
						</div>
					</div>
				</div>
			</div>
		</div><!--account-tabs-setting end-->
	</div>
</section>
<script>
	$(document).ready(function() {
		$('.validate-pass-notsame').hide();
		function validateForm() {
			$('.validate-pass-notsame').hide();
			var password = $('#form input[name="newPassword"').val();
			var rePassword = $('#form input[name="repeatPassword"').val();
			var result = true;
			result &= validatePassword(password, rePassword);
			return result;
		}

		$('#form').submit(function(event) {
			$('.validate-pass-notsame').hide();
			if(!validateForm()) {
				event.preventDefault();
				$('.validate-pass-notsame').show();
			}
		});
	});

	function validatePassword(password, rePassword) {
		var result = true;
		if(password != rePassword) {
			$('.validate-pass-notsame').show();  result = false;
		}
		return result;
	}


</script>
@endsection

@section('footer')
@include('modules/footer')
@endsection






