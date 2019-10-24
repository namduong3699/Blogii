@extends('main')

@section('title', 'Message')

@section('header')
@include('modules/header')
@endsection

@section('content')
<section class="messages-page">
			<div class="container">
				<div class="messages-sec">
					<div class="row">
						<div class="col-lg-12 col-md-12 pd-right-none pd-left-none">
							<div class="main-conversation-box">
								<div class="message-bar-head">
									<div class="usr-msg-details">
										<div class="usr-ms-img">
											<img src="{{$user->avatar}}" alt="" width="50" height="50">
										</div>
										<div class="usr-mg-info">
											<h3>{{$user->name}}</h3>
											<p>Online</p>
										</div><!--usr-mg-info end-->
									</div>
									<a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
								</div><!--message-bar-head end-->
								<div class="messages-line p-t100">
									<div class="main-message-box st3">
										<div class="message-dt st3">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet</p>
											</div><!--message-inner-dt end-->
											<span>2 minutes ago</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="http://via.placeholder.com/50x50" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box ta-right">
										<div class="message-dt">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
											</div><!--message-inner-dt end-->
											<span>Sat, Aug 23, 1:08 PM</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="http://via.placeholder.com/50x50" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
								</div><!--messages-line end-->
								<div class="message-send-area">
									<form>
										<div class="mf-field">
											<input type="text" name="message" placeholder="Type a message here">
											<button type="submit">Send</button>
										</div>
										<ul>
											<li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-camera"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
										</ul>
									</form>
								</div><!--message-send-area end-->
							</div><!--main-conversation-box end-->
						</div>
					</div>
				</div><!--messages-sec end-->
			</div>
</section><!--messages-page end-->
@endsection

@section('footer')
@include('modules/footer')
@endsection