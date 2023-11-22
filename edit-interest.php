
<?php include_once 'header_profile.php'; ?>

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
													<p>Hi, i am jhon kates, i am 32 years old and worked as a web developer in microsoft </p>
												</li>
												<li>
													<span>fav tv show</span>
													<p>Sacred Games, Spartcus Blood, Games of Theron </p>
												</li>
												<li>
													<span>favourit music</span>
													<p>Justin Biber, Shakira, Nati Natasah</p>
												</li>
											</ul>
										</div>
										<div class="widget stick-widget">
										<h4 class="widget-title">Edit info</h4>
										<ul class="naves">
											<li>
												<i class="ti-info-alt"></i>
												<a href="edit-profile-basic.php" title="">Basic info</a>
											</li>
											<li>
												<i class="ti-mouse-alt"></i>
												<a href="edit-work-eductation.php" title="">Education & Work</a>
											</li>
											<li>
												<i class="ti-heart"></i>
												<a href="edit-interest.php" title="">My interests</a>
											</li>
											<li>
												<i class="ti-settings"></i>
												<a href="edit-account-setting.php" title="">account setting</a>
											</li>
											<li>
												<i class="ti-lock"></i>
												<a href="edit-password.php" title="">change password</a>
											</li>
										</ul>
									</div><!-- settings widget -->										
									</aside>
								</div><!-- sidebar -->
								<div class="col-lg-6">
									<div class="central-meta">
										<div class="editing-interest">
											<h5 class="f-title"><i class="ti-heart"></i>My interests</h5>
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
											<form method="post">
												<label>Add interests: </label>
												<input type="text" placeholder="Photography, Cycling, traveling.">
												<button type="submit">Add</button>
												<ol class="interest-added">
													<li><a href="#" title="">bycicling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
													<li><a href="#" title="">traveling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
													<li><a href="#" title="">photography</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
													<li><a href="#" title="">shopping</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
													<li><a href="#" title="">eating</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
													<li><a href="#" title="">hoteling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
												</ol>
												<div class="submit-btns">
													<button type="button" class="mtr-btn"><span>Cancel</span></button>
													<button type="button" class="mtr-btn"><span>Update</span></button>
												</div>
											</form>
										</div>
									</div>	
								</div><!-- centerl meta -->
								<div class="col-lg-3">
									<aside class="sidebar static">
										<div class="widget">
											<h4 class="widget-title">Recent Activity</h4>
											<ul class="activitiez">
												<li>
													<div class="activity-meta">
														<i>10 hours Ago</i>
														<span><a title="" href="#">Commented on Video posted </a></span>
														<h6>by <a href="#">black demon.</a></h6>
													</div>
												</li>
												<li>
													<div class="activity-meta">
														<i>30 Days Ago</i>
														<span><a title="" href="#">Posted your status. “Hello guys, how are you?”</a></span>
													</div>
												</li>
												<li>
													<div class="activity-meta">
														<i>2 Years Ago</i>
														<span><a title="" href="#">Share a video on her timeline.</a></span>
														<h6>"<a href="#">you are so funny mr.been.</a>"</h6>
													</div>
												</li>
											</ul>
										</div>
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
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>


<?php include_once 'footer.php'; ?>
<?php include_once 'scripts.php'; ?>