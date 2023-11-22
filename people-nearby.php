<?php include_once 'header.php'; ?>


	<section>
		<div class="page-header">
			<div class="header-inner">
				<h2>People Nearby</h2>
				<nav class="breadcrumb">
				  <a href="index.php" class="breadcrumb-item"><i class="fa fa-home"></i></a>
				  <span class="breadcrumb-item active">People Nearby</span>
				</nav>
			</div>
		</div>
	</section>
		
	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title">Profile intro</h4>
										<ul class="short-profile">
											<li>
												<span>about</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
											<li>
												<span>fav tv show</span>
												<p>spartcus blood, sacred games </p>
											</li>
											<li>
												<span>favourit music</span>
												<p>Shakira, Justin biber</p>
											</li>
										</ul>
									</div><!-- profile intro widget -->
									<div class="widget stick-widget">
										<h4 class="widget-title">Shortcuts</h4>
										<ul class="naves">
											<li>
												<i class="ti-clipboard"></i>
												<a href="index.php" title="">News feed</a>
											</li>
											<li>
												<i class="ti-mouse-alt"></i>
												<a href="inbox.php" title="">Inbox</a>
											</li>
											<li>
												<i class="ti-files"></i>
												<a href="fav-page.php" title="">My pages</a>
											</li>
											<li>
												<i class="ti-user"></i>
												<a href="timeline-friends.php" title="">friends</a>
											</li>
											<li>
												<i class="ti-image"></i>
												<a href="timeline-photos.php" title="">images</a>
											</li>
											<li>
												<i class="ti-video-camera"></i>
												<a href="timeline-videos.php" title="">videos</a>
											</li>
											<li>
												<i class="ti-comments-smiley"></i>
												<a href="messages.php" title="">Messages</a>
											</li>
											<li>
												<i class="ti-bell"></i>
												<a href="notifications.php" title="">Notifications</a>
											</li>
											<li>
												<i class="ti-share"></i>
												<a href="people-nearby.php" title="">People Nearby</a>
											</li>
											<li>
												<i class="fa fa-bar-chart-o"></i>
												<a href="insights.php" title="">insights</a>
											</li>
											<li>
												<i class="ti-power-off"></i>
												<a href="logout.php" title="">Logout</a>
											</li>
										</ul>
									</div><!-- Shortcuts -->
									

								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="nearby-pepl">
										<div class="nearby-map">
											<div id="map-canvas"></div>
										</div>
									</div><!-- near by map -->
									<ul class="nearby-contct">
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">jhon kates</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>400m away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly1.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">sophia Gate</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>800mm away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly2.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">sara grey</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>1km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly3.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">Sexy cat</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>1.3km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly4.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">Sara grey</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly5.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">Amy watson</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>
										<li>
											<div class="nearly-pepls">
												<figure>
													<a href="#" title=""><img src="images/resources/nearly6.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="#" title="">caty lasbo</a></h4>
													<span>ftv model</span>
													<em><i class="fa fa-map-marker"></i>2.5km away</em>
													<a href="#" title="" class="add-butn" data-ripple="">add friend</a>
												</div>
											</div>
										</li>

									</ul>
								</div><!-- photos -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers">
											<li>
												<figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="#" title="">Kelly Bill</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="#" title="">Issabel</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="#" title="">Andrew</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar8.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="#" title="">Sophia</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="#" title="">Allen</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
										</ul>
									</div><!-- who's following -->
									<div class="widget friend-list stick-widget">
										<h4 class="widget-title">Friends</h4>
										<div id="searchDir"></div>
										<ul id="people-list" class="friendz-list">
											<li>
												<figure>
													<img src="images/resources/friend-avatar.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">bucky barnes</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="addac4c3d9c8dfdec2c1c9c8dfedcac0ccc4c183cec2c0">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5d3f3c2f33382e1d3a303c3431733e3230">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="741e15071b1a16341319151d185a171b19">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f993988a96979bb99e94989095d79a9694">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="157f74667a7b77557278747c793b767a78">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f09a91839f9e92b0979d91999cde939f9d">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e38982908c8d81a3848e828a8fcd808c8e">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="274d465448494567404a464e4b0944484a">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0b696a79656e784b6c666a626725686466">[email&#160;protected]</a></i>
												</div>
											</li>
										</ul>
										<div class="chat-box">
											<div class="chat-head">
												<span class="status f-online"></span>
												<h6>Bucky Barnes</h6>
												<div class="more">
													<span><i class="ti-more-alt"></i></span>
													<span class="close-mesage"><i class="ti-close"></i></span>
												</div>
											</div>
											<div class="chat-list">
												<ul>
													<li class="me">
														<div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="you">
														<div class="chat-thumb"><img src="images/resources/chatlist2.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
													<li class="me">
														<div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
														<div class="notification-event">
															<span class="chat-message-item">
																Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
															</span>
															<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
														</div>
													</li>
												</ul>
												<form class="text-box">
													<textarea placeholder="Post enter to post..."></textarea>
													<div class="add-smiles">
														<span title="add icon" class="em em-expressionless"></span>
													</div>
													<div class="smiles-bunch">
														<i class="em em---1"></i>
														<i class="em em-smiley"></i>
														<i class="em em-anguished"></i>
														<i class="em em-laughing"></i>
														<i class="em em-angry"></i>
														<i class="em em-astonished"></i>
														<i class="em em-blush"></i>
														<i class="em em-disappointed"></i>
														<i class="em em-worried"></i>
														<i class="em em-kissing_heart"></i>
														<i class="em em-rage"></i>
														<i class="em em-stuck_out_tongue"></i>
													</div>
													<button type="submit"></button>
												</form>
											</div>
										</div>
									</div><!-- friends list sidebar -->								
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>


	<?php include_once 'footer.php'; ?>
	<?php include_once 'scripts.php'; ?>