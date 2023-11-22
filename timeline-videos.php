
<?php include_once 'header_profile.php'; 

if(isset($_GET['v_id']))
{
	$view_profile = $_GET['v_id'];

	$sql_select = "select * from `post` where `user_id`='$view_profile'";
	$data = mysqli_query($conn,$sql_select);
}
else
{
	$sql_select = "select * from `post` where `user_id`='$user_id'";
	$data = mysqli_query($conn,$sql_select);
}


?>

	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
											<h4 class="widget-title">Your page</h4>	
											<div class="your-page">
												<figure>
													<a title="" href="#"><img alt="" src="images/resources/friend-avatar9.jpg"></a>
												</figure>
												<div class="page-meta">
													<a class="underline" title="" href="#">My page</a>
													<span><i class="ti-comment"></i>Messages <em>9</em></span>
													<span><i class="ti-bell"></i>Notifications <em>2</em></span>
												</div>
												<div class="page-likes">
													<ul class="nav nav-tabs likes-btn">
														<li class="nav-item"><a data-toggle="tab" href="#link1" class="active">likes</a></li>
														 <li class="nav-item"><a data-toggle="tab" href="#link2" class="">views</a></li>
													</ul>
													<!-- Tab panes -->
													<div class="tab-content">
													  <div id="link1" class="tab-pane active fade show">
														<span><i class="ti-heart"></i>884</span>
														  <a title="weekly-likes" href="#">35 new likes this week</a>
														  <div class="users-thumb-list">
														  	<a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
																<img alt="" src="images/resources/userlist-1.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="frank">
																<img alt="" src="images/resources/userlist-2.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
																<img alt="" src="images/resources/userlist-3.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
																<img alt="" src="images/resources/userlist-4.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
																<img alt="" src="images/resources/userlist-5.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
																<img alt="" src="images/resources/userlist-6.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
																<img alt="" src="images/resources/userlist-7.jpg">  
															</a>  
														  </div>
													  </div>
													  <div id="link2" class="tab-pane fade">
														  <span><i class="ti-eye"></i>445</span>
														  <a title="weekly-likes" href="#">440 new views this week</a>
														  <div class="users-thumb-list">
														  	<a data-toggle="tooltip" title="" href="#" data-original-title="Anderw">
																<img alt="" src="images/resources/userlist-1.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="frank">
																<img alt="" src="images/resources/userlist-2.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sara">
																<img alt="" src="images/resources/userlist-3.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Amy">
																<img alt="" src="images/resources/userlist-4.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Ema">
																<img alt="" src="images/resources/userlist-5.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Sophie">
																<img alt="" src="images/resources/userlist-6.jpg">  
															</a>
															<a data-toggle="tooltip" title="" href="#" data-original-title="Maria">
																<img alt="" src="images/resources/userlist-7.jpg">  
															</a>  
														  </div>
													  </div>
													</div>
												</div>
											</div>
										</div>
									<div class="widget">
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
									<ul class="photos">
										<?php while ($row = mysqli_fetch_assoc($data)) { ?>
									<?php if($row['video']!='') { ?>
										<li>
										<?php if($row['video']!='') { ?>
											<a href="image/<?php echo $row['video']; ?>" title="" >
												<img src="image/<?php echo $row['video']; ?>" alt=""></a>
										<?php } ?>
																			
										</li>
									<?php } ?>
								<?php } ?>
										
									</ul>
								</div><!-- photos -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
											<h4 class="widget-title">Twitter feed</h4>
											<ul class="twiter-feed">
												<li>
													<i class="fa fa-twitter"></i>
													<span>
														<i>jhon william</i>
														@jhonwilliam
													</span>
													<p>tomorrow with the company we were working and 5 child run away from the working place. <a href="#" title="">#daydream5k</a> </p>
													<em>2 hours ago</em>
												</li>
												<li>
													<i class="fa fa-twitter"></i>
													<span>
														<i>Kelly watson</i>
														@kelly
													</span>
													<p>tomorrow with the company we were working and 5 child run away from the working place. <a href="#" title="">#daydream5k</a> </p>
													<em>2 hours ago</em>
												</li>
												<li>
													<i class="fa fa-twitter"></i>
													<span>
														<i>Jony bravo</i>
														@jonibravo
													</span>
													<p>tomorrow with the company we were working and 5 child run away from the working place. <a href="#" title="">#daydream5k</a> </p>
													<em>2 hours ago</em>
												</li>
											</ul>
										</div><!-- twitter feed-->
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
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="91e6f8ffe5f4e3e2fefdf5f4e3d1f6fcf0f8fdbff2fefc">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9dfffceff3f8eeddfaf0fcf4f1b3fef2f0">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cda7acbea2a3af8daaa0aca4a1e3aea2a0">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ef858e9c80818daf88828e8683c18c8082">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e38982908c8d81a3848e828a8fcd808c8e">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c161d0f13121e3c1b111d1510521f1311">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="305a51435f5e5270575d51595c1e535f5d">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="107a71637f7e7250777d71797c3e737f7d">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4a282b38242f390a2d272b232664292527">[email&#160;protected]</a></i>
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
