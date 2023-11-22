<?php 

include_once '../connection.php';

$user_id = $_SESSION['login'];

$sql_select_user = "select * from `user_register` where `id`='$user_id'";
$data_user = mysqli_query($conn,$sql_select_user);
$row_user = mysqli_fetch_assoc($data_user);

$sql_select_con = "select * from `friend` where `user`='$user_id'";
$data_con = mysqli_query($conn,$sql_select_con);
$total_friends = mysqli_num_rows($data_con);

if (isset($_POST['cmt'])) 
{
	$cmt = $_POST['cmt'];
	$post_id = $_POST['post_id'];
	$cmt_by = $_POST['cmt_id'];

	$sql_insert = "insert into `post_comment` (`post_id`,`cmt_by`,`cmt`) values ('$post_id','$cmt_by','$cmt')";
	mysqli_query($conn,$sql_insert);
}

if (isset($_GET['cmt_id_d']))
{
	$dlt_cmt = $_GET['cmt_id_d'];

	$sql_delete = "delete from post_comment where cmt_id = $dlt_cmt";
	mysqli_query($conn,$sql_delete);
}

if (isset($_POST['new_cmt']))
{
	$new_cmt = $_POST['new_cmt'];
	$id = $_POST['cmt_id'];

	$sql_update = "update `post_comment` set `cmt` = '$new_cmt' where `cmt_id` = '$id'";
	mysqli_query($conn,$sql_update);
}

$sql_select = "select * from post inner join friend on post.user_id=friend.friend_id and friend.user=$user_id inner join user_register on post.user_id = user_register.id order by post.p_id desc";
$data = mysqli_query($conn,$sql_select);


 ?>


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


<script type="text/javascript">

	function get_cmt(id)
	{
		 cmt = document.getElementsByClassName('cmt')[id].value;

			// alert(cmt);
	}
	
	
		$('.comment').click(function(){

			var post_id = $(this).attr('attr_id_post');
			var cmt_id = $(this).attr('attr_id_cmt');
	
			// alert(post_id);
			// alert(cmt_id);
			// alert(cmt);
		
			if(cmt!='')
			{
			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'post',
				data: 'cmt='+cmt+'&post_id='+post_id+'&cmt_id='+cmt_id,

				success:function(res)
				{
					$('#display_post_comment').html(res);
				}
			});
			}
		});

		$('.delete_home_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'get',
				data: {'cmt_id_d':id},

				success:function(res)
				{
					$('#display_post_comment').html(res);
				}
			});
		});

		$('.edit_home_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home_update.php',
				type: 'get',
				data: {'cmt_id_e':id},
				dataType: 'json',

				success:function(res)
				{
					// $('#display_post_comment').html(res);

					$('#update_cmt_data').val(res.cmt);
					$('#cmt_id').val(res.cmt_id);

					$("#exampleModal").modal("show");
				}
			});
		});

		$('.save_new_cmt').click(function(e){
			e.preventDefault();

			var edit = $('#edited_cmt').serialize();

			// alert(data);
			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'post',
				data: edit,

				success:function(res)
				{
					$('#display_post_comment').html(res);

					$("#exampleModal").modal("hide");
				}
			});
		});

		$('.close_model').click(function(){
			$("#exampleModal").modal("hide");
		});

</script>