
<?php include_once 'header_profile.php'; ?>

<?php 


if(isset($_GET['v_id']))
{
	$view_profile = $_GET['v_id'];

	$sql_select_check_frd = "select * from friend inner join user_register on friend.user = $view_profile and friend.friend_id = user_register.id";
	$data_check_frd = mysqli_query($conn,$sql_select_check_frd);

	$sql_select_user = "select * from `user_register` where `id`='$view_profile'";
	$data_user = mysqli_query($conn,$sql_select_user);
	$row_user = mysqli_fetch_assoc($data_user);

	$sql_select_con = "select * from `friend` where `user`='$view_profile'";
	$data_con = mysqli_query($conn,$sql_select_con);
	$total_friends = mysqli_num_rows($data_con);
}
else
{
	$sql_select_add = "select * from `user_register` where `id` not in (select `friend_id` from `friend` where `user` = '$user_id') and `id` not in (select `from` from `friend_request` where `to` = '$user_id') and `id` != '$user_id'";
	$data_add = mysqli_query($conn,$sql_select_add);

	$sql_select_from = "select * from `friend_request` where `to`='$user_id'";
	$data_from = mysqli_query($conn,$sql_select_from);
	$total_request = mysqli_num_rows($data_from);

	$sql_select_con = "select * from `friend` where `user`='$user_id'";
	$data_con = mysqli_query($conn,$sql_select_con);
	$total_friends = mysqli_num_rows($data_con);
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
									<!-- <div class="widget stick-widget">
										<h4 class="widget-title">Profile intro</h4>
										<ul class="short-profile">
											<li>
												<span>about</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
											<li>
												<span>fav tv show</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
											<li>
												<span>favourit music</span>
												<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft company. </p>
											</li>
										</ul>
									</div> -->
									<!-- profile intro widget -->

								</aside>
							</div><!-- sidebar -->

						<?php if ($row_profile['id'] == $user_id) { ?>
							<div class="col-lg-6" id="display_friend">
							<div class="central-meta">
							<div class="frnds">
										<ul class="nav nav-tabs">
											 <li class="nav-item"><a class="active" href="#frends-add" data-toggle="tab">Friends Suggestion</a> </li>
											 <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span><?php echo $total_request; ?></span></li>
											 <li class="nav-item"><a class="" href="#frends" data-toggle="tab">Your Friends</a><span><?php echo $total_friends; ?></span></li>
										</ul>

										<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active fade show " id="frends-add" >
										<ul class="nearby-contct">
									<?php while($row = mysqli_fetch_assoc($data_add)) { ?>
											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="#" title=""><img src="image/<?php echo $row['profile_pic']; ?>" alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a></h4>
														<span>ftv model</span>
														<!-- <a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a> -->

													<?php 
													$a = $row['id'];
													$sql_select_to_id = "select * from `friend_request` where `from`='$user_id' and `to`='$a'";
													$data_to_id = mysqli_query($conn,$sql_select_to_id);
													$row_count = mysqli_num_rows($data_to_id);

														if($row_count>0)
														{ ?>
															<div class="add-butn_only">Request Sent</div>
															<a href="javascript:void(0)" attr_id="<?php echo $row['id']; ?>" class="add-butns more-action cancel_request" data-ripple="">delete Request</a>
														<?php }
														else { ?>
															<a href="javascript:void(0)" attr_id="<?php echo $row['id']; ?>" class="add-butn add_friend" data-ripple="">add friend</a>
														<?php } ?>		

													</div>
												</div>
											</li>
									<?php } ?>
										</ul>
									</div>
								
									<div class="tab-pane fade" id="frends-req" >
										<ul class="nearby-contct">
										<?php while ($row = mysqli_fetch_assoc($data_from)) { 

											$from = $row['from'];
											$sql_select = "select * from `user_register` where `id`='$from'";
											$data = mysqli_query($conn,$sql_select);
											while ($row = mysqli_fetch_assoc($data)) { ?>
											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><img src="image/<?php echo $row['profile_pic']; ?>" alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a></h4>
														<span>ftv model</span>
														<a href="javascript:void(0)" title="" class="add-butn more-action delete_request" attr_id="<?php echo $row['id']; ?>"  data-ripple="">delete Request</a>
														<a href="javascript:void(0)" title="" class="add-butn confirm_request" attr_id="<?php echo $row['id']; ?>" data-ripple="">Confirm</a>
													</div>
												</div>
											</li>
											<?php } 
										} ?>
										</ul>	
									</div>

									<div class="tab-pane fade" id="frends" >
										<ul class="nearby-contct">
										<?php while ($row = mysqli_fetch_assoc($data_con)) { 

												$from = $row['friend_id'];
												$sql_select = "select * from `user_register` where `id`='$from'";
												$data = mysqli_query($conn,$sql_select);
											
											while ($row = mysqli_fetch_assoc($data)) { ?>
											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="time-line.html" title=""><img src="image/<?php echo $row['profile_pic']; ?>" alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a></h4>
														<span>ftv model</span>
														<a href="javascript:void(0)" title="" class="add-butn unfriend" attr_id="<?php echo $row['id']; ?>" data-ripple="">Unfriend</a>
													</div>
												</div>
											</li>

											<?php } 
										} ?>
										</ul>	
									</div>
								</div>
							</div>
							</div>	
							</div>
						<?php }
						else{ ?>

							<div class="col-lg-6" id="display_friend_check">
							<div class="central-meta">
							<div class="frnds">
										<ul class="nav nav-tabs">
											 <li class="nav-item"><b><?php echo $row_user['name'] ?>'s  Friends</b><span><?php echo $total_friends; ?></span></li>
										</ul>

										<ul class="nearby-contct">
										<?php while ($row = mysqli_fetch_assoc($data_check_frd)) { ?>

											<li>
												<div class="nearly-pepls">
													<figure>
														<a href="time-line.html" title=""><img src="image/<?php echo $row['profile_pic']; ?>" alt=""></a>
													</figure>
													<div class="pepl-info">
														<h4><a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a></h4>
														<span>ftv model</span>

														<?php
														$a = $row['friend_id'];
														$sql_select_a = "select * from `friend` where `user`='$user_id' and `friend_id`='$a'";
														$data_a = mysqli_query($conn,$sql_select_a);
														$row_cnt_a = mysqli_num_rows($data_a);

														if ($row_cnt_a==0)
														{
															if($row['friend_id']!=$user_id)
															{
																$sql_select_b = "select * from `friend_request` where `from`='$user_id' and `to`='$a'";
																$data_b = mysqli_query($conn,$sql_select_b);
																$row_cnt_b = mysqli_num_rows($data_b);

																if ($row_cnt_b==0)
																{ ?>
																	<a href="javascript:void(0)" attr_id="<?php echo $row['friend_id']; ?>" attr_id2="<?php echo $view_profile; ?>" class="add-butn add_friend_check" data-ripple="">add friend</a>
																<?php }
																else
																{ ?>
																	<div class="add-butn_only">Request Sent</div>
																	<a href="javascript:void(0)" attr_id="<?php echo $row['friend_id']; ?>" attr_id2="<?php echo $view_profile; ?>" class="add-butns more-action cancel_request_check" data-ripple="">delete Request</a>
																<?php }
															}
															else
															{

															}
															
														}
														else
														{

														} ?>															
														
													</div>
												</div>
											</li>

											<?php } 
										?>
										</ul>	
					
							</div>
							</div>	
							</div>

						<?php } ?>


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
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c6b1afa8b2a3b4b5a9aaa2a3b486a1aba7afaae8a5a9ab">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="82e0e3f0ece7f1c2e5efe3ebeeace1edef">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6f050e1c00010d2f08020e0603410c0002">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="147e75677b7a76547379757d783a777b79">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="640e05170b0a06240309050d084a070b09">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3b9b2a0bcbdb193b4beb2babffdb0bcbe">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="deb4bfadb1b0bc9eb9b3bfb7b2f0bdb1b3">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bbd1dac8d4d5d9fbdcd6dad2d795d8d4d6">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ff9d9e8d919a8cbf98929e9693d19c9092">[email&#160;protected]</a></i>
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