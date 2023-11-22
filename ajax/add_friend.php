<?php 

include_once '../connection.php';

$user_id = $_SESSION['login'];

if(isset($_GET['a_id']))
{
	$to_id = $_GET['a_id'];

	$sql_insert = "insert into `friend_request` (`to`,`from`)values('$to_id','$user_id')";
	mysqli_query($conn,$sql_insert);
}

if (isset($_GET['c_id'])) {
	
	$c_id = $_GET['c_id'];

	$sql_delete = "delete from `friend_request` where `from`='$user_id' and `to`='$c_id'";
	mysqli_query($conn,$sql_delete);
}

if (isset($_GET['d_id'])) {
	
	$d_id = $_GET['d_id'];

	$sql_delete = "delete from `friend_request` where `from`='$d_id' and `to`='$user_id'";
	mysqli_query($conn,$sql_delete);
}

if (isset($_GET['con_id']))
{
	$confirm_id = $_GET['con_id'];

	$sql_insert = "insert into `friend`(`user`,`friend_id`) values ('$user_id','$confirm_id')";
	mysqli_query($conn,$sql_insert);

	$sql_insert = "insert into `friend`(`user`,`friend_id`) values ('$confirm_id','$user_id')";
	mysqli_query($conn,$sql_insert);

	$sql_delete = "delete from `friend_request` where `from`='$confirm_id' and `to`='$user_id'";
	mysqli_query($conn,$sql_delete);
}

if (isset($_GET['un_id'])) 
{
	$unfriend_id = $_GET['un_id'];

	$sql_delete = "delete from `friend` where `friend_id`='$unfriend_id' and `user`='$user_id'";
	mysqli_query($conn,$sql_delete);
}

$sql_select_add = "select * from `user_register` where `id` not in (select `friend_id` from `friend` where `user` = '$user_id') and `id` not in (select `from` from `friend_request` where `to` = '$user_id') and `id` != '$user_id'";
$data_add = mysqli_query($conn,$sql_select_add);

$sql_select_from = "select * from `friend_request` where `to`='$user_id'";
$data_from = mysqli_query($conn,$sql_select_from);
$total_request = mysqli_num_rows($data_from);

$sql_select_con = "select * from `friend` where `user`='$user_id'";
$data_con = mysqli_query($conn,$sql_select_con);
$total_friends = mysqli_num_rows($data_con);

 ?>


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
														<a href="time-line.html" title=""><img src="image/<?php echo $row['profile_pic']; ?>" alt=""></a>
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

										  

<script type="text/javascript">

		$('.add_friend').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);
			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'a_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);
				}
			});
		});

		$('.cancel_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'c_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);
				}
			})
		});

		$('.delete_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'d_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			});
		});

		$('.confirm_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'con_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			})
		});

		$('.unfriend').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'un_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			});
		});

	</script>