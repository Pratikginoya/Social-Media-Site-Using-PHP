<?php include_once 'header_profile.php'; 

if (isset($_POST['post']))
{
	$text = $_POST['text'];
	$time = $_POST['time'];
	if ($_FILES['music']['name']==""){$music="";} else{$music = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['music']['name'];}
	if ($_FILES['image']['name']==""){$image="";} else{$image = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['image']['name'];}
	if ($_FILES['video']['name']==""){$video="";} else{$video = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['video']['name'];}
	if ($_FILES['camera']['name']==""){$camera="";} else{$camera = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['camera']['name'];}
	
	$path_m = 'image/'.$music;
	$path_i = 'image/'.$image;
	$path_v = 'image/'.$video;
	$path_c = 'image/'.$camera;

	move_uploaded_file($_FILES['music']['tmp_name'],$path_m);
	move_uploaded_file($_FILES['image']['tmp_name'],$path_i);
	move_uploaded_file($_FILES['video']['tmp_name'],$path_v);
	move_uploaded_file($_FILES['camera']['tmp_name'],$path_c);

	$sql_insert = "insert into `post` (`user_id`,`text`,`time`,`music`,`image`,`video`,`camera`) values ('$user_id','$text','$time','$music','$image','$video','$camera')";
	mysqli_query($conn,$sql_insert);

	header('location:home.php');
}

if(isset($_GET['v_id']))
{
	$view_profile = $_GET['v_id'];

	$sql_select_profile = "select * from user_register where id = $view_profile";
	$data_profile = mysqli_query($conn,$sql_select_profile);
	$row_profile = mysqli_fetch_assoc($data_profile);

	$sql_select = "select * from post inner join user_register on post.user_id=$view_profile and user_register.id=post.user_id order by post.p_id desc";
	$data = mysqli_query($conn,$sql_select);
}
else
{
	$sql_select_profile = "select * from user_register where id = $user_id";
	$data_profile = mysqli_query($conn,$sql_select_profile);
	$row_profile = mysqli_fetch_assoc($data_profile);

	$sql_select = "select * from post inner join user_register on post.user_id=$user_id and user_register.id=post.user_id order by post.p_id desc";
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
											<h4 class="widget-title">Socials</h4>
											<ul class="socials">
												<li class="facebook">
													<a href="https://www.facebook.com/" target="blank"><i class="fa fa-facebook"></i> <span>facebook</span> <ins>45 likes</ins></a>
												</li>
												<li class="twitter">
													<a href="https://twitter.com/login?lang=en" target="blank"><i class="fa fa-twitter"></i> <span>twitter</span><ins>25 likes</ins></a>
												</li>
												<li class="google">
													<a href="https://www.google.com/" target="blank"><i class="fa fa-google"></i> <span>google</span><ins>35 likes</ins></a>
												</li>
											</ul>
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

									<!-- <div class="widget">
										<h4 class="widget-title">Recent Activity</h4>
										<ul class="activitiez">
											<li>
												<div class="activity-meta">
													<i>10 hours Ago</i>
													<span><a href="#" title="">Commented on Video posted </a></span>
													<h6>by <a href="#">black demon.</a></h6>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>30 Days Ago</i>
													<span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>2 Years Ago</i>
													<span><a href="#" title="">Share a video on her timeline.</a></span>
													<h6>"<a href="#">you are so funny mr.been.</a>"</h6>
												</div>
											</li>
										</ul>
									</div> -->

									<div class="widget stick-widget">
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
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<!-- <div class="loadMore"> -->

								<?php if($row_profile['id'] == $user_id) { ?>
									<div class="central-meta item">
										<div class="new-postbox">
											<figure>
												<img src="image/<?php echo $row_profile['profile_pic']; ?>" alt="">
											</figure>
											<div class="newpst-input">
												<form method="post" enctype="multipart/form-data" id="post_data">
												<textarea rows="2" placeholder="write something" name="text"></textarea>
												<div class="attachments">
													<ul>
														<li>
															<i class="fa fa-music"></i>
															<label class="fileContainer">
																<input type="file" name="music">
															</label>
														</li>
														<li>
															<i class="fa fa-image"></i>
															<label class="fileContainer">
																<input type="file" name="image">
															</label>
														</li>
														<li>
															<i class="fa fa-video-camera"></i>
															<label class="fileContainer">
																<input type="file" name="video">
															</label>
														</li>
														<li>
															<i class="fa fa-camera"></i>
															<label class="fileContainer">
																<input type="file" name="camera">
															</label>
															<input type="hidden" name="time" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date('M,d Y h:i:s A'); ?>">
														</li>
														<li>
															<button type="submit" name="post">Post</button>
														</li>
													</ul>
												</div>
											</form>
											</div>
										</div>
									</div><!-- add post new box -->
								<?php } ?>

						<div id="display_post_timeline_comment">
							<?php $i=0; while ($row = mysqli_fetch_assoc($data)) { ?>
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure>
												<img src="image/<?php echo $row['profile_pic']; ?>" alt="">
											</figure>
											<div class="friend-name">
												<ins><a href="time-line.php?v_id=<?php echo $row['id']; ?>" title=""><?php echo $row['name']; ?></a></ins>
												<span><?php echo $row['time']; ?></span>
											</div>
											<div class="post-meta">
												<img src="image/<?php echo $row['image']; ?><?php echo $row['camera']; ?>" alt="">
												
												<?php if ($row['video']!="") { ?>
													<video width="450px" height="350px" controls>
														<source src="image/<?php echo $row['video']; ?>" type="video/mp4">
													</video>
												<?php } ?>
												
												
												<div class="we-video-info">
													<ul>
														<li>
															<span class="views" data-toggle="tooltip" title="views">
																<i class="fa fa-eye"></i>
																<ins>1.2k</ins>
															</span>
														</li>
														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="fa fa-comments-o"></i>
																<ins>52</ins>
															</span>
														</li>
														<li>
															<span class="like" data-toggle="tooltip" title="like">
																<i class="ti-heart"></i>
																<ins>2.2k</ins>
															</span>
														</li>
														<li>
															<span class="dislike" data-toggle="tooltip" title="dislike">
																<i class="ti-heart-broken"></i>
																<ins>200</ins>
															</span>
														</li>
														<li class="social-media">
															<div class="menu">
															  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
																</div>
															  </div>
																<div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
																</div>
															  </div>
															  <div class="rotater">
																<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
																</div>
															  </div>

															</div>
														</li>
													</ul>
												</div>
												<div class="description">
													
													<p>
														<?php echo $row['text']; ?>
													</p>
												</div>
											</div>
										</div>
										<div class="coment-area">
											<ul class="we-comet">
										<?php 
										$post_id = $row['p_id'];
										$sql_select_row = "select * from post_comment inner join user_register on post_comment.cmt_by = user_register.id and post_comment.post_id = $post_id";

										$data_row = mysqli_query($conn,$sql_select_row);

										while ($row_cmt = mysqli_fetch_assoc($data_row)) { ?>
 												<li>
													<div class="comet-avatar profile_image_div">
														<img src="image/<?php echo $row_cmt['profile_pic']; ?>" alt="" class="profile_image_img">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="time-line.php?v_id=<?php echo $row_cmt['id']; ?>" title=""><?php echo $row_cmt['name']; ?></a></h5>
															<span>1 week ago</span>
															<a class="we-reply" href="#" title="Reply">
																<!-- <i class="fa fa-reply"></i> -->
															</a>
													<?php if(isset($_GET['v_id'])) { 
														if($row_cmt['cmt_by']==$user_id || $row['id']==$user_id) { ?>
															<a class="we-reply delete_timeline_cmt_v" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> attr_id_v=<?php echo $view_profile; ?> title="Reply">Delete-Comment</a>
														<?php } 
														if($row_cmt['cmt_by']==$user_id) { ?>
															<a class="we-reply edit_timeline_cmt_v" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> attr_id_v=<?php echo $view_profile; ?> title="Reply">Edit</a>
														<?php } 
													}
													else
													{ 
														if($row_cmt['cmt_by']==$user_id || $row['id']==$user_id) { ?>
															<a class="we-reply delete_timeline_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> title="Reply">Delete-Comment</a>
														<?php } 
														if($row_cmt['cmt_by']==$user_id) { ?>
															<a class="we-reply edit_timeline_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> title="Reply">Edit</a>
														<?php } 
													} ?>
														</div>
														<p><?php echo $row_cmt['cmt']; ?></p>
													</div>
												</li>
												<br>
										<?php } ?>

												<!-- <li>
													<a href="#" title="" class="showmore underline">more comments</a>
												</li> -->
												<li class="post-comment">
													<div class="comet-avatar">
														<img src="image/<?php echo $row['profile_pic']; ?>" alt="">
													</div>
													<div class="post-comt-box">
														<form method="post" class="comment_post">
															<textarea placeholder="Post your comment" name="" class="timeline_cmt" required></textarea>
														
														<?php if(isset($_GET['v_id'])) { ?>	
															<a href="javascript:void(0)" class="timeline_comment_v a_button" onclick="get_timeline_cmt(<?php echo $i; ?>)" attr_id_post_t=<?php echo $row['p_id']; ?> attr_id_cmt_t=<?php echo $user_id; ?> attr_id=<?php echo $view_profile; ?> >Comment</a>
														<?php }
														else { ?>
															<a href="javascript:void(0)" class="timeline_comment a_button" onclick="get_timeline_cmt(<?php echo $i; ?>)" attr_id_post_t=<?php echo $row['p_id']; ?> attr_id_cmt_t=<?php echo $user_id; ?>>Comment</a>
														<?php } ?>
														</form>	
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							<?php $i++; } ?>
						</div>

<!-- Edit Comment Model Start -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding: 13px 17px;">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 16px;">Edit Comment</h1>
      </div> 
      <div class="modal-body" style="padding: 5px; padding-bottom: 0;">

    <form method="post" id="edited_cmt_timeline">
   	<?php if(isset($_GET['v_id'])) { ?>
   		<input type="hidden" name="v_id" value="<?php echo $view_profile; ?>">
   	<?php } ?>
      <input type="hidden" name="cmt_id_t" id="cmt_id_t">
      <textarea placeholder="Post your comment" name="new_cmt_t" class="cmt" id="update_cmt_data_t" required style="font-size: 14px;     font-family: Muli, Segoe Ui; border: 1px solid #EAECEE; border-radius: 10px;"></textarea>
    </form>

      </div>
      <div class="modal-footer" style="padding: 10px 17px;">
        <button type="button" class="btn btn-secondary close_model" data-bs-dismiss="modal" style="font-size: 13px; padding: 3px 9px;">Close</button>
        <button type="button" class="btn btn-primary save_new_cmt_t" style="font-size: 13px; padding: 3px 9px; background-color: #088dcd;">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Comment Model End -->

								<!-- </div> -->
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<div class="banner medium-opacity bluesh">
											<div style="background-image: url(images/resources/baner-widgetbg.jpg)" class="bg-image"></div>
											<div class="baner-top">
												<span><img src="images/book-icon.png" alt=""></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>like them all</span>
												<a href="#" title="" data-ripple="">start now!</a>
											</div>
										</div>											
									</div>
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
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4136282f352433322e2d25243301262c20282d6f222e2c">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a585b48545f497a5d575b535614595557">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="127873617d7c7052757f737b7e3c717d7f">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="620803110d0c0022050f030b0e4c010d0f">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0963687a66676b496e64686065276a6664">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b313a283435391b3c363a323775383436">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="472d263428292507202a262e2b6924282a">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7a101b091514183a1d171b131654191517">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c1e1d0e12190f3c1b111d1510521f1311">[email&#160;protected]</a></i>
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