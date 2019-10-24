@extends('main')

@section('title', Auth::user()->name)

@section('header')
@include('modules/header')
@endsection

@section('content')

<section class="cover-sec">
	<div class="user-cover" style="background: url('{{Auth::user()->cover}}'); background-size: cover; background-position: center;">

	</div>
	
</section>


<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3">
						<div class="main-left-sidebar">
							<div class="user_profile">
								<div class="user-pro-img">
									<img src="images/user/102.jpg" alt="" width="170px" height="170px">
								</div><!--user-pro-img end-->
								<div class="user_pro_status">
									<ul class="flw-status">
										<li>
											<a href="{{URL::to('following')}}">
												<span>Following</span>
											</a>
											<b>{{$followingCount}}</b>
										</li>
										<li>
											<a href="{{URL::to('follower')}}">
												<span>Followers</span>
											</a>
											<b>{{$followedCount}}</b>
										</li>
									</ul>
								</div><!--user_pro_status end-->
								<ul class="social_links">
									<li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
									<li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Not connect</a></li>
								</ul>
							</div><!--user_profile end-->
						</div><!--main-left-sidebar end-->
					</div>
					<div class="col-lg-6">
						<div class="main-ws-sec">
							<div class="user-tab-sec">
								<h3>{{Auth::user()->name}}</h3>
								<div class="star-descp">
									<span>{{Auth::user()->email}}</span>
								</div><!--star-descp end-->
								<div class="tab-feed">
									<ul>
										<li data-tab="feed-dd" class="active">
											<a href="#" title="">
												<img src="images/ic1.png" alt="">
												<span>Feed</span>
											</a>
										</li>
										<li data-tab="info-dd">
											<a href="#" title="">
												<img src="images/ic2.png" alt="">
												<span>Info</span>
											</a>
										</li>
										<li data-tab="portfolio-dd">
											<a href="#" title="">
												<img src="images/ic3.png" alt="">
												<span>Photos</span>
											</a>
										</li>
									</ul>
								</div><!-- tab-feed end-->
							</div><!--user-tab-sec end-->
							<div class="product-feed-tab current" id="feed-dd">
								<div class="posts-section">
									<div class="post-topbar">
										<div class="user-picy">
											<img src="images/user/102.jpg" alt="">
										</div>
										<div class="post-st">
											<ul>
												<li><a class="post-jb active" href="#" title="">Post a Entry!!</a></li>
											</ul>
										</div><!--post-st end-->
									</div>
									@foreach($entries as $followEntry)
								<div class="posty" data-entry-id="{{$followEntry->id}}" style="margin-bottom: 30px">
									<div class="post-bar no-margin">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="{{$followEntry->user->avatar}}" width="50" height="50" alt="">
												<div class="usy-name">
													<h3><a href="{{URL::to('user?id='.$followEntry->user->id)}}">{{$followEntry->user->name}}</a></h3>
													<span><img src="images/clock.png" alt="">{{$followEntry->created_at}}</span>
												</div>
											</div>
											<div class="ed-opts">
												<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
												<ul class="ed-options">
													<li><a href="#" title="">Edit Post</a></li>
													<li><a href="#" title="">Unsaved</a></li>
													<li><a href="#" title="">Unbid</a></li>
													<li><a href="#" title="">Close</a></li>
													<li><a href="#" title="">Hide</a></li>
												</ul>
											</div>
										</div>
										<div class="epi-sec">
											<ul class="descp">
												<li><img src="images/icon8.png" alt=""><span>Entry</span></li>
												<li><img src="images/icon9.png" alt=""><span>Vietnam</span></li>
											</ul>
											<ul class="bk-links">
												<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
												<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
											</ul>
										</div>
										<div class="job_descp">
											<h3>{{$followEntry->title}}</h3>
											<p>{{$followEntry->content}}<a href="#" title="">view more</a></p>
										</div>
										<div class="job-status-bar cs-like-cmt">
											<ul class="like-com">
												<li>
													<a href="#">
														<i class="la la-thumbs-o-up"></i>
														Like ({{$followEntry->like()->count()}})
													</a>
												</li> 
												<li class="js-comment-toggle" data-entry-id="{{$followEntry->id}}">
													<a href="#" title="">
														<i class="la la-comment"></i>
														Comment ({{$followEntry->comment()->count()}})
													</a>
												</li>
											</ul>
										</div>
									</div><!--post-bar end-->
									<div class="comment-section" data-entry-id="{{$followEntry->id}}">
										<div class="comment-sec">
											<ul>
												<li class="cmt-list"  data-entry-id="{{$followEntry->id}}">
													<div class="comment-list" style="display: none;">
														<div class="bg-img">
															<img src="" alt="" width="40" height="40">
														</div>
														<div class="comment">
															<h3>User Name</h3>
															<span><img src="images/clock.png" alt="">Cmt created_at</span>
															<p>Content</p>
															<!-- <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a> -->
														</div>
													</div>
													@foreach($followEntry->comment as $cmt)
													<div class="comment-list">
														<div class="bg-img">
															<img src="{{$cmt->user->avatar}}" alt="" width="40" height="40">
														</div>
														<div class="comment">
															<h3>{{$cmt->user->name}}</h3>
															<span><img src="images/clock.png" alt="">{{$cmt->created_at}}</span>
															<p>{{$cmt->content}}</p>
															<!-- <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a> -->
														</div>
													</div><!--comment-list end-->
													@endforeach
												</li>
											</ul>
										</div><!--comment-sec end-->
										<div class="post-comment">
											<div class="cm_img">
												<img src="{{Auth::user()->avatar}}" width="40" height="40" alt="">
											</div>
											<div class="comment_box">
												<form>
													<input class="js-comment" data-entry-id="{{$followEntry->id}}" type="text" placeholder="Post a comment" >
													<button class="js-comment-btn" data-entry-id="{{$followEntry->id}}" type="submit">Send</button>
												</form>
											</div>
										</div><!--post-comment end-->
									</div><!--comment-section end-->
								</div><!--posty end-->
								@endforeach
									<div class="pagination-ctn">
										{!! $entries->links() !!}
									</div>
									
								<!-- 	<div class="process-comm">
										<div class="spinner">
											<div class="bounce1"></div>
											<div class="bounce2"></div>
											<div class="bounce3"></div>
										</div>
									</div> --><!--process-comm end-->
								</div><!--posts-section end-->
							</div><!--product-feed-tab end-->
							<div class="product-feed-tab" id="info-dd">
								<div class="user-profile-ov">
									<h3>Overview</h3>
									<p>Comming soon</p>
								</div><!--user-profile-ov end-->
								<div class="billing-method">
									<ul>
										<li>
											<h3>Email</h3>
											<a href="#" title="">{{Auth::user()->email}}</a>
										</li>
										<li>
											<h3>Birthday</h3>
											<a href="#" title="">{{Auth::user()->birthday}}</a>
										</li>
										<li>
											<h3>Entry</h3>
											<span>{{Auth::user()->entry->count()}}</span>
										</li>
									</ul>
								</div>
								<div class="user-profile-ov">
									<h3>Location</h3>
									<h4>Vietnam</h4>
									<p>Comming soon.....</p>
								</div><!--user-profile-ov end-->
								<div class="user-profile-ov">
									<h3>Tag</h3>
									<ul>
										<li><a href="#" title="">HTML</a></li>
										<li><a href="#" title="">PHP</a></li>
										<li><a href="#" title="">Java</a></li>
										<li><a href="#" title="">C++</a></li>
										<li><a href="#" title="">CSS</a></li>
										<li><a href="#" title="">Javascript</a></li>
										<li><a href="#" title="">Photoshop</a></li>
										<li><a href="#" title="">Illustrator</a></li>
									</ul>
								</div><!--user-profile-ov end-->
							</div><!--product-feed-tab end-->
							<div class="product-feed-tab" id="portfolio-dd">
								<div class="portfolio-gallery-sec">
									<h3>Photos</h3>
									<div class="gallery_pf">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/271x174" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-6">
												<div class="gallery_pt">
													<img src="http://via.placeholder.com/170x170" alt="">
													<a href="#" title=""><img src="images/all-out.png" alt=""></a>
												</div><!--gallery_pt end-->
											</div>
										</div>
									</div><!--gallery_pf end-->
								</div><!--portfolio-gallery-sec end-->
							</div><!--product-feed-tab end-->
						</div><!--main-ws-sec end-->
					</div>
					<div class="col-lg-3">
						<div class="right-sidebar">
							<div class="widget widget-portfolio">
								<div class="wd-heady">
									<h3>Photos</h3>
									<img src="images/photo-icon.png" alt="">
								</div>
								<div class="pf-gallery">
									<ul>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
										<li><a href="#" title=""><img src="https://t1.pixers.pics/img-c676e9e9/posters-gray-cat-kitten-cute-cartoon-kitty-character-kawaii-animal-funny-face-with-eyes-moustaches-nose-ears-love-greeting-card-flat-design-white-background-isolated.jpg?H4sIAAAAAAAAA42PW27EIAxFt0OkZGxIeGUB8ztLiAiQado8EKTtqKuv01b9q1RZyMbinsuF1624KYKP2xEzrHMIS4RpXuhW-hzL_BEZ1lLaqqftwhCx6ve3mH3eE2sk1k1nasWRjqj6d0fC1eUX9nQcqfQApb2k-UE0ar6AXwsI5BrQgLTGOjEJi53hQ2rK4bbgciDqQ-Ilbfcaz_o_1gBHkGPgoxpNwG40gxAnrPklfGFbe2YyJ_ono0as9ZntyPPKKOxOrw_2nO4V_OH5PQOp4HoD8hYIXEErAM_lcL1xQ39SrcCBo8PoW60EBj9JPRq00hunx1Z1SqkLGX0Cy6i1MIwBAAA=" alt=""></a></li>
									</ul>
								</div><!--pf-gallery end-->
							</div><!--widget-portfolio end-->
						</div><!--right-sidebar end-->
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>


<div class="overview-box" id="create-portfolio">
	<div class="overview-edit">
		<h3>Create Portfolio</h3>
		<form>
			<input type="text" name="pf-name" placeholder="Portfolio Name">
			<div class="file-submit">
				<input type="file" name="file">
			</div>
			<div class="pf-img">
				<img src="http://via.placeholder.com/60x60" alt="">
			</div>
			<input type="text" name="website-url" placeholder="htp://www.example.com">
			<button type="submit" class="save">Save</button>
			<button type="submit" class="cancel">Cancel</button>
		</form>
		<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
	</div><!--overview-edit end-->
</div><!--overview-box end-->



</div><!--theme-layout end-->

<div class="post-popup job_post">
	<div class="post-project">
		<h3>Post a entry</h3>
		<div class="post-project-fields">
			<form action="{{URL::to('postEntry')}}" method="POST">
				@csrf
				<div class="row">
					<div class="col-lg-12">
						<input type="text" name="title" placeholder="Title">
					</div>

					<div class="col-lg-12">
						<textarea name="content" placeholder="Content"></textarea>
					</div>
					<div class="col-lg-12">
						<ul>
							<li><button class="active" type="submit">Post</button></li>
							<li><a href="#" title="">Cancel</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div><!--post-project-fields end-->
		<a href="#" title=""><i class="la la-times-circle-o"></i></a>
	</div><!--post-project end-->
</div><!--post-project-popup end-->
<script>
	$('.js-follow-btn').click(function(e){
		console.log('follow: ' + $(this).data('id'));
		var followBtn = $(this).find('i')[0];
		e.preventDefault();
		$.get('{{URL::to("follow")}}', {
			id: $(this).data('id')
		},function(data) {
			if(data) {
				$(followBtn).removeClass('la-plus');
				$(followBtn).addClass('la-check');
			} else {
				console.log('false');
			}
		});
	});

	$('.comment-section').hide();
	$('.js-comment-toggle').click(function(){
		var entryId = $(this).data('entry-id');
		var commentSection = $(".comment-section[data-entry-id="+entryId+"]");
		$(commentSection).toggle();
	});

	$('.js-comment-btn').click(function(){
		var entryId = $(this).data('entry-id');
		var input = $(".js-comment[data-entry-id="+entryId+"]").val();
		if(input != '') {
			$.ajax({
				url: "{{URL::to('comment')}}",
				method: 'get',
				data: {
					content: input,
					entry_id: entryId
				}
			}).done(function(data){
				var commentClone = $('.comment-list').clone()[0];
				$(commentClone).css('display', 'table');
				$(commentClone).find('img').attr('src', '{{Auth::user()->avatar}}');
				$(commentClone).find('h3').html('{{Auth::user()->name}}');
				var current = new Date();
				$(commentClone).find('span').html(current.toLocaleString());
				$(commentClone).find('p').html(input);
				// console.log($('.js-comment-btn').closest('.cmt-list'));
				$(".cmt-list[data-entry-id="+entryId+"]").append(commentClone);
			});
		}
	});
	// console.log($('.js-comment-btn').parents().find('.cmt-list')[0]);
</script>
@endsection

