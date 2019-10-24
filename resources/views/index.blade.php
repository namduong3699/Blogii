@extends('main')

@section('title', 'Home')

@section('header')
@include('modules/header')
@endsection

@section('content')
<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3 col-md-4 pd-left-none no-pd">
						<div class="main-left-sidebar no-margin sticky-top z-index98" style="top: 100px">
							<div class="user-data full-width">
								<div class="user-profile">
									<div class="username-dt">
										<div class="usr-pic">
											<img src="{{Auth::user()->avatar}}" alt="" width="170px" height="110px">
										</div>
									</div><!--username-dt end-->
									<div class="user-specs">
										<h3>{{Auth::user()->name}}</h3>
										<span>{{Auth::user()->email}}</span>
									</div>
								</div><!--user-profile end-->
								<ul class="user-fw-status">
									<li>
										<h4>Following</h4>
										<span>{{$followingCount}}</span>
									</li>
									<li>
										<h4>Followers</h4>
										<span>{{$followedCount}}</span>
									</li>
									<li>
										<a href="{{URL::to('myProfile')}}" title="">View Profile</a>
									</li>
								</ul>
							</div><!--user-data end-->
							<div class="suggestions full-width">
								<div class="sd-title">
									<h3>Most Followed Users</h3>
									<i class="la la-ellipsis-v"></i>
								</div><!--sd-title end-->
								<div class="suggestions-list">
									@foreach($suggest as $sugg)
									<div class="suggestion-usd">
										<img src="{{$sugg->avatar}}" width="35" height="35" alt="">
										<div class="sgt-text">
											<h4><a href="{{URL::to('user?id='.$sugg->id)}}">{{$sugg->name}}</a></h4>
											<span>{{$sugg->email}}</span>
										</div>
									</div>
									@endforeach
									<div class="view-more">
										<a href="#" title="">View More</a>
									</div>
								</div><!--suggestions-list end-->
							</div><!--suggestions end-->

						</div><!--main-left-sidebar end-->
					</div>
					<div class="col-lg-6 col-md-8 no-pd">
						<div class="main-ws-sec">
							<div class="post-topbar">
								<div class="user-picy">
									<img src="{{Auth::user()->avatar}}" alt="">
								</div>
								<div class="post-st">
									<ul>
										<li><a class="post-jb active" href="#" title="">Post a Entry!!</a></li>
									</ul>
								</div><!--post-st end-->
							</div><!--post-topbar end-->
							<div class="posts-section">
								@foreach($followingEntry as $followEntry)
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
													<a href="javascript: void(0);" title="">
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
															<h3></h3>
															<span><img src="images/clock.png" alt=""></span>
															<p></p>
															<a href="javascript: void(0);" title="" class="js-reply-btn" data-comment-id=""><i class="fa fa-reply-all"></i>Reply</a>
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
															<a href="javascript: void(0);" title="" class="js-reply-btn" data-comment-id="{{$cmt->id}}"><i class="fa fa-reply-all"></i>Reply</a>
														</div>
													</div><!--comment-list end-->
													<ul class="js-reply p-b0" data-comment-id="{{$cmt->id}}">
														<li class="js-reply-patern" style="display: none;">
															<div class="comment-list p-b15">
																<div class="bg-img">
																	<img src="http://via.placeholder.com/40x40" alt="" width="40" height="40">
																</div>
																<div class="comment">
																	<h3>John Doe</h3>
																	<span><img src="images/clock.png" alt=""> 3 min ago</span>
																	<p>Hi John </p>
																</div>
															</div><!--comment-list end-->
														</li>
														@foreach($cmt->reply as $reply)
														<li>
															<div class="comment-list p-b15">
																<div class="bg-img">
																	<img src="{{$reply->user->avatar}}" alt="" width="40" height="40">
																</div>
																<div class="comment">
																	<h3>{{$reply->user->name}}</h3>
																	<span><img src="images/clock.png" alt="">{{$reply->created_at}}</span>
																	<p>{{$reply->content}}</p>
																</div>
															</div><!--comment-list end-->
														</li>
														@endforeach
													</ul>
													<ul class="js-reply-box" data-comment-id="{{$cmt->id}}">
														<li>
															<div class="comment-list">
																<div class="bg-img">
																	<img src="{{Auth::user()->avatar}}" alt="" width="40" height="40">
																</div>
																<div class="comment">
																	<h3>{{Auth::user()->name}}</h3>
																	<!-- <span><img src="images/clock.png" alt=""> 3 min ago</span> -->
																	<div class="comment_box">
																		<form>
																			@csrf
																			<input class="js-comment-reply comment-box-reply" data-entry-id="{{$followEntry->id}}" type="text" placeholder="Post a comment" data-comment-id="{{$cmt->id}}">
																			<button class="js-reply-btn" data-entry-id="{{$followEntry->id}}" data-comment-id="{{$cmt->id}}">Send</button>
																		</form>
																	</div>
																</div>
															</div><!--comment-list end-->
														</li>
													</ul>
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
													@csrf
													<input class="js-comment" data-entry-id="{{$followEntry->id}}" type="text" placeholder="Post a comment" >
													<button class="js-comment-btn" data-entry-id="{{$followEntry->id}}">Send</button>
												</form>
											</div>
										</div><!--post-comment end-->
									</div><!--comment-section end-->
								</div><!--posty end-->
								@endforeach
								<div class="process-comm">
									<div class="spinner">
										<div class="bounce1"></div>
										<div class="bounce2"></div>
										<div class="bounce3"></div>
									</div>
								</div><!--process-comm end-->
							</div><!--posts-section end-->
						</div><!--main-ws-sec end-->
					</div>
					<div class="col-lg-3 pd-right-none no-pd">
						<div class="right-sidebar sticky-top z-index98" style="top: 100px">
							<div class="widget widget-about">
								<img src="icon/icon-main.png" alt="" width="80">
								<h3>Welcom to Blogii</h3>
								<span>SUN* Education</span>
								<div class="sign_link">
									<h3><a href="#" title="">About</a></h3>
									<a href="#" title="">Learn More</a>
								</div>
							</div><!--widget-about end-->


							<div class="tags-sec full-width">
								<ul>
									<li><a href="#" title="">Help Center</a></li>
									<li><a href="#" title="">About</a></li>
									<li><a href="#" title="">Privacy Policy</a></li>
									<li><a href="#" title="">Community Guidelines</a></li>
									<li><a href="#" title="">Cookies Policy</a></li>
									<li><a href="#" title="">Career</a></li>
									<li><a href="#" title="">Language</a></li>
									<li><a href="#" title="">Copyright Policy</a></li>
								</ul>
								<div class="cp-sec">
									<img src="https://sun-asterisk.vn/wp-content/uploads/2019/03/Sun-Logotype-RGB-01.png" height="17" alt="">
									<p><img src="images/cp.png" alt="">Copyright 2019</p>
								</div>
							</div>
						</div><!--right-sidebar end-->
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>




<div class="post-popup pst-pj">
	<div class="post-project">
		<h3>Post a project</h3>
		<div class="post-project-fields">
			<form>
				<div class="row">
					<div class="col-lg-12">
						<input type="text" name="title" placeholder="Title">
					</div>
					<div class="col-lg-12">
						<div class="inp-field">
							<select>
								<option>Category</option>
								<option>Category 1</option>
								<option>Category 2</option>
								<option>Category 3</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12">
						<input type="text" name="skills" placeholder="Skills">
					</div>
					<div class="col-lg-12">
						<div class="price-sec">
							<div class="price-br">
								<input type="text" name="price1" placeholder="Price">
								<i class="la la-dollar"></i>
							</div>
							<span>To</span>
							<div class="price-br">
								<input type="text" name="price1" placeholder="Price">
								<i class="la la-dollar"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<textarea name="description" placeholder="Description"></textarea>
					</div>
					<div class="col-lg-12">
						<ul>
							<li><button class="active" type="submit" value="post">Post</button></li>
							<li><a href="#" title="">Cancel</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div><!--post-project-fields end-->
		<a href="#" title=""><i class="la la-times-circle-o"></i></a>
	</div><!--post-project end-->
</div><!--post-project-popup end-->

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



 <!-- <div class="chatbox-list">
	<div class="chatbox">
		<div class="chat-mg">
			<a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
			<span>2</span>
		</div>
		<div class="conversation-box">
			<div class="con-title mg-3">
				<div class="chat-user-info">
					<img src="http://via.placeholder.com/34x33" alt="">
					<h3>John Doe <span class="status-info"></span></h3>
				</div>
				<div class="st-icons">
					<a href="#" title=""><i class="la la-cog"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
					<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
				</div>
			</div>
			<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
				<div class="date-nd">
					<span>Sunday, August 24</span>
				</div>
				<div class="chat-msg st2">
					<p>Cras ultricies ligula.</p>
					<span>5 minutes ago</span>
				</div>
				<div class="chat-msg">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
					<span>Sat, Aug 23, 1:10 PM</span>
				</div>
			</div>
			<div class="typing-msg">
				<form>
					<textarea placeholder="Type a message here"></textarea>
					<button type="submit"><i class="fa fa-send"></i></button>
				</form>
				<ul class="ft-options">
					<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
					<li><a href="#" title=""><i class="la la-camera"></i></a></li>
					<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="chatbox">
		<div class="chat-mg bx">
			<a href="#" title=""><img src="images/chat.png" alt=""></a>
			<span>2</span>
		</div>
		<div class="conversation-box">
			<div class="con-title">
				<h3>Messages</h3>
				<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
			</div>
			<div class="chat-list">
				<div class="conv-list active">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
						<span class="active-status activee"></span>
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>1:55 PM</span>
					</div>
					<span class="msg-numbers">2</span>
				</div>
				<div class="conv-list">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>11:39 PM</span>
					</div>
				</div>
				<div class="conv-list">
					<div class="usrr-pic">
						<img src="http://via.placeholder.com/50x50" alt="">
					</div>
					<div class="usy-info">
						<h3>John Doe</h3>
						<span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
					</div>
					<div class="ct-time">
						<span>0.28 AM</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --><!--chatbox-list end-->

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
		event.preventDefault();
		var entryId = $(this).data('entry-id');
		var input = $(".js-comment[data-entry-id="+entryId+"]").val();
		console.log(input);
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
				// $(commentClone).find('a').data('data')
				// console.log($('.js-comment-btn').closest('.cmt-list'));
				$(".cmt-list[data-entry-id="+entryId+"]").append(commentClone);
			});
		}
	});

	$('.js-reply-btn').click(function(event){
		event.preventDefault();
		var entryId = $(this).data('entry-id');
		var commentId = $(this).data('comment-id');
		var input = $('.comment-box-reply[data-comment-id=' + commentId + ']').val();

		if(input != '') {
			$.ajax({
				url: "{{URL::to('replyComment')}}",
				method: 'get',
				data: {
					commentId: commentId,
					entryId: entryId,
					content: input
				}
			}).done(function(data){
				if(data) {
					var newReply = $('.js-reply-patern').clone()[0];
					$(newReply).css('display', 'list-item')
					$(newReply).find('img').attr('src', '{{Auth::user()->avatar}}');
					$(newReply).find('h3').html('{{Auth::user()->name}}');
					var current = new Date();
					$(newReply).find('span').html(current.toLocaleString());
					$(newReply).find('p').html(input);
					$('.js-reply[data-comment-id=' + commentId + ']').append(newReply);
				}
			});
		}

		
	});

	$('.js-reply-box').hide();
	$('.js-reply-btn').click(function(){
		var commentId = $(this).data('comment-id');
		$('.js-reply-box[data-comment-id=' + commentId + ']').toggle();
	});
	// console.log($('.js-comment-btn').parents().find('.cmt-list')[0]);
</script>
@endsection

