
<?php include_once 'header_profile.php'; 

// if (isset($_POST['post']))
// {
// 	$text = $_POST['text'];
// 	$time = $_POST['time'];
// 	if ($_FILES['music']['name']==""){$music="";} else{$music = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['music']['name'];}
// 	if ($_FILES['image']['name']==""){$image="";} else{$image = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['image']['name'];}
// 	if ($_FILES['video']['name']==""){$video="";} else{$video = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['video']['name'];}
// 	if ($_FILES['camera']['name']==""){$camera="";} else{$camera = rand(1,10000).date('d-m-Y-H-i-s').$_FILES['camera']['name'];}
	
// 	$path_m = 'image/'.$music;
// 	$path_i = 'image/'.$image;
// 	$path_v = 'image/'.$video;
// 	$path_c = 'image/'.$camera;

// 	move_uploaded_file($_FILES['music']['tmp_name'],$path_m);
// 	move_uploaded_file($_FILES['image']['tmp_name'],$path_i);
// 	move_uploaded_file($_FILES['video']['tmp_name'],$path_v);
// 	move_uploaded_file($_FILES['camera']['tmp_name'],$path_c);

// 	$sql_insert = "insert into `post` (`user_id`,`text`,`time`,`music`,`image`,`video`,`camera`) values ('$user_id','$text','$time','$music','$image','$video','$camera')";
// 	mysqli_query($conn,$sql_insert);

// 	header('location:home.php');
// }

// $sql_select = "select * from `post` where `user_id`='$user_id' order by `id` desc";
// $data = mysqli_query($conn,$sql_select);

?>

<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							
							<div class="col-lg-6 m-auto">
								<!-- <div class="loadMore"> -->
									<div class="central-meta item">
										<div class="new-postbox">
											<figure>
												<img src="images/resources/admin2.jpg" alt="">
											</figure>
											<div class="newpst-input">
												<form method="post" enctype="multipart/form-data" id="post_data">
												<textarea rows="8" placeholder="write something" name="text"></textarea>
												<div class="attachments">

													<div>
														<img src="image/<?php echo $row['image']; ?><?php echo $row['camera']; ?>" alt="">
												<?php if ($row['video']!="") { ?>
													<video width="450px" height="350px" controls>
														<source src="image/<?php echo $row['video']; ?>" type="video/mp4">
													</video>
												<?php } ?>
													</div>
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


								<!-- </div> -->
							</div><!-- centerl meta -->
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<?php include_once 'footer.php'; ?>
	
	<?php include_once 'scripts.php'; ?>