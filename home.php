<?php include_once 'header.php';

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

$sql_select = "select * from post inner join friend on post.user_id=friend.friend_id and friend.user=$user_id inner join user_register on post.user_id = user_register.id order by post.p_id desc";
$data = mysqli_query($conn,$sql_select);


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
												<a href="home.php" title="">News feed</a>
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
									<div class="widget">
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
									</div><!-- recent activites -->
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
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
											<img src="image/<?php echo $row_user['profile_pic']; ?>" alt="">
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
								<!-- <div class="loadMore"> -->

						<div id="display_post_comment">
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
											<ul class="we-comet" >
												<!-- <li>
													<div class="comet-avatar">
														<img src="images/resources/comet-1.jpg" alt="">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="#" title="">Jason borne</a></h5>
															<span>1 year ago</span>
															<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
														</div>
														<p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
													</div>
													<ul>
														<li>
															<div class="comet-avatar">
																<img src="images/resources/comet-2.jpg" alt="">
															</div>
															<div class="we-comment">
																<div class="coment-head">
																	<h5><a href="#" title="">alexendra dadrio</a></h5>
																	<span>1 month ago</span>
																	<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
																</div>
																<p>yes, really very awesome car i see the features of this car in the official website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)</p>
															</div>
														</li>
														<li>
															<div class="comet-avatar">
																<img src="images/resources/comet-3.jpg" alt="">
															</div>
															<div class="we-comment">
																<div class="coment-head">
																	<h5><a href="#" title="">Olivia</a></h5>
																	<span>16 days ago</span>
																	<a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
																</div>
																<p>i like lexus cars, lexus cars are most beautiful with the awesome features, but this car is really outstanding than lexus</p>
															</div>
														</li>
													</ul>
												</li> -->

										<!-- <div id="display_post_comment"> -->
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
														<?php if($row_cmt['cmt_by']==$user_id || $row_cmt['id']==$user_id) { ?>
															<a class="we-reply delete_home_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> title="Reply">Delete-Comment</a>
														<?php } ?>
														<?php if($row_cmt['cmt_by']==$user_id) { ?>
															<a class="we-reply edit_home_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?> title="Reply">Edit</a>
														<?php } ?>
														</div>
														<p><?php echo $row_cmt['cmt']; ?></p>
													</div>
												</li>
												<br>
										<?php } ?>
										<!-- </div> -->

												<!-- <li>
													<a href="#" title="" class="showmore underline">more comments</a>
												</li> -->

												<li class="post-comment">
													<div class="comet-avatar">
														<img src="image/<?php echo $row_user['profile_pic']; ?>" alt="">
													</div>
													<div class="post-comt-box">
														<form method="post" class="comment_post">
															<textarea placeholder="Post your comment" name="" class="cmt" required></textarea>
																													
															<a href="javascript:void(0)" class="comment a_button" onclick="get_cmt(<?php echo $i; ?>)" attr_id_post=<?php echo $row['p_id']; ?> attr_id_cmt=<?php echo $user_id; ?> attr_id="<?php echo $i; ?>">Comment</a>
														</form>	
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							<?php $i++;} ?>
						</div>


<!-- Edit Comment Model Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding: 13px 17px;">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 16px;">Edit Comment</h1>
      </div> 
      <div class="modal-body" style="padding: 5px; padding-bottom: 0;">

    <form method="post" id="edited_cmt"> 
      <input type="hidden" name="cmt_id" id="cmt_id">
      <textarea placeholder="Post your comment" name="new_cmt" class="cmt" id="update_cmt_data" required style="font-size: 14px;     font-family: Muli, Segoe Ui; border: 1px solid #EAECEE; border-radius: 10px;"></textarea>
    </form>

      </div>
      <div class="modal-footer" style="padding: 10px 17px;">
        <button type="button" class="btn btn-secondary close_model" data-bs-dismiss="modal" style="font-size: 13px; padding: 3px 9px;">Close</button>
        <button type="button" class="btn btn-primary save_new_cmt" style="font-size: 13px; padding: 3px 9px; background-color: #088dcd;">Save changes</button>
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
										<h4 class="widget-title">Your page</h4>	
										<div class="your-page">
											<figure>
												<a href="#" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>
											</figure>
											<div class="page-meta">
												<a href="#" title="" class="underline">My page</a>
												<span><i class="ti-comment"></i><a href="insight.php" title="">Messages <em>9</em></a></span>
												<span><i class="ti-bell"></i><a href="insight.php" title="">Notifications <em>2</em></a></span>
											</div>
											<div class="page-likes">
												<ul class="nav nav-tabs likes-btn">
													<li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
													 <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
												  <div class="tab-pane active fade show " id="link1" >
													<span><i class="ti-heart"></i>884</span>
													  <a href="#" title="weekly-likes">35 new likes this week</a>
													  <div class="users-thumb-list">
														<a href="#" title="Anderw" data-toggle="tooltip">
															<img src="images/resources/userlist-1.jpg" alt="">  
														</a>
														<a href="#" title="frank" data-toggle="tooltip">
															<img src="images/resources/userlist-2.jpg" alt="">  
														</a>
														<a href="#" title="Sara" data-toggle="tooltip">
															<img src="images/resources/userlist-3.jpg" alt="">  
														</a>
														<a href="#" title="Amy" data-toggle="tooltip">
															<img src="images/resources/userlist-4.jpg" alt="">  
														</a>
														<a href="#" title="Ema" data-toggle="tooltip">
															<img src="images/resources/userlist-5.jpg" alt="">  
														</a>
														<a href="#" title="Sophie" data-toggle="tooltip">
															<img src="images/resources/userlist-6.jpg" alt="">  
														</a>
														<a href="#" title="Maria" data-toggle="tooltip">
															<img src="images/resources/userlist-7.jpg" alt="">  
														</a>  
													  </div>
												  </div>
												  <div class="tab-pane fade" id="link2" >
													  <span><i class="ti-eye"></i>440</span>
													  <a href="#" title="weekly-likes">440 new views this week</a>
													  <div class="users-thumb-list">
														<a href="#" title="Anderw" data-toggle="tooltip">
															<img src="images/resources/userlist-1.jpg" alt="">  
														</a>
														<a href="#" title="frank" data-toggle="tooltip">
															<img src="images/resources/userlist-2.jpg" alt="">  
														</a>
														<a href="#" title="Sara" data-toggle="tooltip">
															<img src="images/resources/userlist-3.jpg" alt="">  
														</a>
														<a href="#" title="Amy" data-toggle="tooltip">
															<img src="images/resources/userlist-4.jpg" alt="">  
														</a>
														<a href="#" title="Ema" data-toggle="tooltip">
															<img src="images/resources/userlist-5.jpg" alt="">  
														</a>
														<a href="#" title="Sophie" data-toggle="tooltip">
															<img src="images/resources/userlist-6.jpg" alt="">  
														</a>
														<a href="#" title="Maria" data-toggle="tooltip">
															<img src="images/resources/userlist-7.jpg" alt="">  
														</a>  
													  </div>
												  </div>
												</div>
											</div>
										</div>
									</div><!-- page like widget -->
									<div class="widget">
										<div class="banner medium-opacity bluesh">
											<div class="bg-image" style="background-image: url(images/resources/baner-widgetbg.jpg)"></div>
											<div class="baner-top">
												<span><img alt="" src="images/book-icon.png"></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>like them all</span>
												<a data-ripple="" title="" href="#">start now!</a>
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
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0d7c9ced4c5d2d3cfccc4c5d2e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b4d6d5c6dad1c7f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar3.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">jason borne</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1d777c6e72737f5d7a707c7471337e7270">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												<figure>
													<img src="images/resources/friend-avatar4.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Cameron diaz</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bed4dfcdd1d0dcfed9d3dfd7d290ddd1d3">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="553f34263a3b37153238343c397b363a38">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar6.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">andrew</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar7.jpg" alt="">
													<span class="status f-off"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">amy watson</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5933382a36373b193e34383035773a3634">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar5.jpg" alt="">
													<span class="status f-online"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">daniel warber</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dbb1baa8b4b5b99bbcb6bab2b7f5b8b4b6">[email&#160;protected]</a></i>
												</div>
											</li>
											<li>
												
												<figure>
													<img src="images/resources/friend-avatar2.jpg" alt="">
													<span class="status f-away"></span>
												</figure>
												<div class="friendz-meta">
													<a href="#">Sarah Loren</a>
													<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2644475448435566414b474f4a0845494b">[email&#160;protected]</a></i>
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