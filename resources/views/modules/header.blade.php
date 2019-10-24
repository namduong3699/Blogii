<header style="position: fixed; top: 0; z-index: 9999">
	<div class="container">
		<div class="header-data">
			<div class="logo">
				<a href="{{URL::to('home')}}" title=""><img src="icon/icon-main.png" alt="" width="40px"></a>
			</div><!--logo end-->
			<div class="search-bar">
				<form action="{{URL::to('search')}}" method="GET">
					<input class="search-user search-custom" type="text" name="name" placeholder="Search...">
					<button type="submit"><i class="la la-search"></i></button>
				</form>
			</div><!--search-bar end-->
			<nav>
				<ul>
					<li>
						<a href="{{URL::to('home')}}" title="">
							Home
						</a>
					</li>
					<li>
						<a href="#" title="" class="not-box-open">
							Messages
						</a>
						<div class="notification-box msg">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a> </h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a></h3>
										<p>Lorem ipsum dolor sit amet.</p>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="messages.html" title="">Jassica William</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="view-all-nots">
									<a href="{{URL::to('message')}}" title="">View All Messsages</a>
								</div>
							</div><!--nott-list end-->
						</div><!--notification-box end-->
					</li>
					<li>
						<a href="#" title="" class="not-box-open">
							Notification
						</a>
						<div class="notification-box">
							<div class="nt-title">
								<h4>Setting</h4>
								<a href="#" title="">Clear all</a>
							</div>
							<div class="nott-list">
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="notfication-details">
									<div class="noty-user-img">
										<img src="images/user/102.jpg" alt="">
									</div>
									<div class="notification-info">
										<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
										<span>2 min ago</span>
									</div><!--notification-info -->
								</div>
								<div class="view-all-nots">
									<a href="#" title="">View All Notification</a>
								</div>
							</div><!--nott-list end-->
						</div><!--notification-box end-->
					</li>
				</ul>
			</nav><!--nav end-->
			<div class="menu-btn">
				<a href="#" title=""><i class="fa fa-bars"></i></a>
			</div><!--menu-btn end-->
			<div class="user-account">
				<div class="user-info">
					<img src="{{Auth::user()->avatar}}" alt="" width="30px" height="30px">
					<a href="#" title="">{{Auth::user()->name}}</a>
					<i class="la la-sort-down"></i>
				</div>
				<div class="user-account-settingss">
					<h3>Setting</h3>
					<ul class="us-links">
						<li><a href="{{URL::to('account-setting')}}" title="">Account Setting</a></li>
						<li><a href="{{URL::to('myProfile')}}" title="">My Profile</a></li>
						<li><a href="#" title="">Faqs</a></li>
						<li><a href="#" title="">Terms & Conditions</a></li>
					</ul>
					<h3 class="tc"><a href="{{URL::to('logout')}}" title="">Logout</a></h3>
				</div><!--user-account-settingss end-->
			</div>
		</div><!--header-data end-->
	</div>
</header><!--header end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script>
	jQuery(document).ready(function($) {
		var engine = new Bloodhound({
			remote: {
				url: 'ajaxSearchUser?name=%QUERY%',
				wildcard: '%QUERY%'
			},
			datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
			queryTokenizer: Bloodhound.tokenizers.whitespace
		});

		$(".search-user").typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		}, {
			source: engine.ttAdapter(),
			name: 'usersList',
			templates: {
				empty: [
				'<div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả phù hợp.</div></div>'
				],
				header: [
				// '<div class="list-group search-results-dropdown">'
				],
				suggestion: function (data) {
					return '<a href="user?id=' + data.id + '" class="list-group-item">' + data.name + ' (' + data.email +')</a>'
				}
			}
		});
	});
</script>