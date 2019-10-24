@extends('main')

@section('title', 'Follower');

@section('header')
@include('modules/header')
@endsection

@section('content')

<section class="companies-info">
	<div class="container">
		<div class="company-title">
			<h3>Follower</h3>
		</div><!--company-title end-->
		<div class="companies-list">
			<div class="row">
				@foreach($followers as $follower)
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="company_profile_info">
						<div class="company-up-info">
							<img src="{{$follower->avatar}}" alt="">
							<h3><a href="{{URL::to('user?id=' .$follower->id)}}" style="color: #2d3436">{{$follower->name}}</a></h3>
							<h4>{{$follower->email}}</h4>
							<ul>
								<li><a href="#" title="" class="follow">
									@if($follower->isFollowedBy(Auth::user()))
									Followed
									@else
									Not follow
									@endif
								</a></li>
								<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
								<li><a href="#" title="" class="hire-us">Block</a></li>
							</ul>
						</div>
						<a href="#" title="" class="view-more-pro">View Profile</a>
					</div><!--company_profile_info end-->
				</div>
				@endforeach
			</div>
		</div><!--companies-list end-->
		<div class="pagination-ctn" style="margin-top: 30px;">
			{!! $followers->links() !!}
		</div>
		<div class="process-comm">
			<div class="spinner">
				<!-- <div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div> -->
			</div>
		</div>
	</div>
</section><!--companies-info end-->

@endsection