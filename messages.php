<?php include_once 'header_profile.php'; 

$sql_select_frnd = "select * from friend inner join user_register on friend.user = $user_id and friend.friend_id = user_register.id";
$data_frnd = mysqli_query($conn,$sql_select_frnd);


if (isset($_GET['m_id']))
{
	$m_id = $_GET['m_id'];

}
else
{
	$sql_select_frnd_s = "select * from friend inner join user_register on friend.user = $user_id and friend.friend_id = user_register.id";
	$data_frnd_s = mysqli_query($conn,$sql_select_frnd_s);
	$row = mysqli_fetch_assoc($data_frnd_s);
	$m_id = $row['id'];
}

$sql_profile_details = "select * from user_register where id = $m_id";
$data_details = mysqli_query($conn,$sql_profile_details);
$row_details = mysqli_fetch_assoc($data_details);

$sql_select_m = "select * from message where message_by=$user_id and message_to=$m_id or message_by=$m_id and message_to=$user_id";
$data_m = mysqli_query($conn,$sql_select_m);

?>

		<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<!-- <div class="col-lg-3">
								<aside class="sidebar static">
									<div class="advertisment-box">
										<h4 class="">advertisment</h4>
										<figure>
											<a href="#" title="Advertisment"><img src="images/resources/ad-widget.jpg" alt=""></a>
										</figure>
									</div>
									<div class="widget stick-widget">
										<h4 class="widget-title">Shortcuts</h4>
										<ul class="naves">
											<li>
												<i class="ti-clipboard"></i>
												<a href="newsfeed.html" title="">News feed</a>
											</li>
											<li>
												<i class="ti-mouse-alt"></i>
												<a href="inbox.html" title="">Inbox</a>
											</li>
											<li>
												<i class="ti-files"></i>
												<a href="fav-page.html" title="">My pages</a>
											</li>
											<li>
												<i class="ti-user"></i>
												<a href="timeline-friends.html" title="">friends</a>
											</li>
											<li>
												<i class="ti-image"></i>
												<a href="timeline-photos.html" title="">images</a>
											</li>
											<li>
												<i class="ti-video-camera"></i>
												<a href="timeline-videos.html" title="">videos</a>
											</li>
											
										</ul>
									</div>									
								</aside>
							</div> -->
							<div class="col-lg-10 m-auto">
								<div class="central-meta">
									<div class="messages">
										<h5 class="f-title"><i class="ti-bell"></i> All Messages</h5>
										<div class="message-box d-flex">
											<ul class="peoples">
											<?php while ($row = mysqli_fetch_assoc($data_frnd)) { ?>
												<li>
													<figure>
														<img src="image/<?php echo $row['profile_pic']; ?>" alt="">
													</figure>
													<div class="people-name">
														<!-- <a href="javascript:void(0)" class="messages_open" attr_id="<?php echo $row['id']; ?>"><span><?php echo $row['name']; ?></span></a> -->
														<a href="messages.php?m_id=<?php echo $row['id']; ?>"><span><?php echo $row['name']; ?></span></a>
													</div>
												</li>
											<?php } ?>
											</ul>

											<div class="peoples-mesg-box" id="view_message_box">
												<div class="conversation-head">
													<figure><img src="image/<?php echo $row_details['profile_pic']; ?>" alt=""></figure>
													<span><?php echo $row_details['name']; ?> <a class="we-reply" href="time-line.php?v_id=<?php echo $row_details['id']; ?>" title="Reply" style="font-weight: 500; margin-left: 20px;" >View  <?php echo $row_details['name']; ?>'s Profile</a>
														<!-- <i>online</i> -->
													</span>

												</div>
												
												<ul class="chatting-area" id="messages_data">
												<?php while ($row = mysqli_fetch_assoc($data_m)) { ?>
													<li class="
													<?php if ($row['message_by']==$user_id) {
														echo "me";
													}
													else
													{
														echo "you";
													} ?>">
														<figure class="profile_pic_msg"><img src="image/
															<?php if ($row['message_by']==$user_id)
															{
																$sql_select = "select * from user_register where id = $user_id";
																$data = mysqli_query($conn,$sql_select);
																$row_p = mysqli_fetch_assoc($data);

																echo $row_p['profile_pic'];
															}
															else
															{
																$sql_select = "select * from user_register where id = $m_id";
																$data = mysqli_query($conn,$sql_select);
																$row_p = mysqli_fetch_assoc($data);

																echo $row_p['profile_pic'];
															} ?>" alt=""></figure>
														<p><?php echo $row['message']; ?></p>
													</li>
												<?php } ?>
												</ul>

												<div class="message-text-container">
													<form method="post" class="message_send">
														<div class="d-flex">
														<textarea name="msg" id="msg"></textarea>
														<input type="hidden" name="msg_by" value="<?php echo $user_id; ?>">
														<input type="hidden" name="m_id" value="<?php echo $m_id; ?>">

														<button class="button_msg my-4 mx-2" title="send"><i class="fa fa-paper-plane"></i></button>
														<!-- <a href="javascript:void(0)" attr_id_by="<?php echo $user_id; ?>" attr_id_to="<?php echo $m_id; ?>" class="button_msg my-4 mx-2 message_send" title="send"><i class="fa fa-paper-plane"></i></a> -->
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<!-- <div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
											<h4 class="widget-title">Socials</h4>
											<ul class="socials">
												<li class="facebook">
													<a title="" href="#"><i class="fa fa-facebook"></i> <span>facebook</span> <ins>45 likes</ins></a>
												</li>
												<li class="twitter">
													<a title="" href="#"><i class="fa fa-twitter"></i> <span>twitter</span><ins>25 likes</ins></a>
												</li>
												<li class="google">
													<a title="" href="#"><i class="fa fa-google"></i> <span>google</span><ins>35 likes</ins></a>
												</li>
											</ul>
										</div>
									<div class="widget stick-widget">
										<h4 class="widget-title">Who's follownig</h4>
										<ul class="followers">
											<li>
												<figure><img src="images/resources/friend-avatar2.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Kelly Bill</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar4.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Issabel</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar6.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Andrew</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar8.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Sophia</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
											<li>
												<figure><img src="images/resources/friend-avatar3.jpg" alt=""></figure>
												<div class="friend-meta">
													<h4><a href="time-line.html" title="">Allen</a></h4>
													<a href="#" title="" class="underline">Add Friend</a>
												</div>
											</li>
										</ul>
									</div>
								</aside>
							</div> -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<?php include_once 'footer.php'; ?>
	<?php include_once 'scripts.php'; ?>