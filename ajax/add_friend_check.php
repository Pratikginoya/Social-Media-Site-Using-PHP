<?php 

include_once '../connection.php';

$user_id = $_SESSION['login'];

if(isset($_GET['v_id']))
{
	$view_profile = $_GET['v_id'];
}

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
	
	$sql_select_check_frd = "select * from friend inner join user_register on friend.user = $view_profile and friend.friend_id = user_register.id";
	$data_check_frd = mysqli_query($conn,$sql_select_check_frd);

	$sql_select_user = "select * from `user_register` where `id`='$view_profile'";
	$data_user = mysqli_query($conn,$sql_select_user);
	$row_user = mysqli_fetch_assoc($data_user);

	$sql_select_con = "select * from `friend` where `user`='$view_profile'";
	$data_con = mysqli_query($conn,$sql_select_con);
	$total_friends = mysqli_num_rows($data_con);



	


 ?>



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

<script type="text/javascript">
	
	$('.add_friend_check').click(function(){

			var id = $(this).attr('attr_id');
			var id2 = $(this).attr('attr_id2');

			// alert(id);
			// alert(id2);
			$.ajax({

				type: 'get',
				url: 'ajax/add_friend_check.php',
				data: {'a_id':id,'v_id':id2},

				success:function(res)
				{
					$('#display_friend_check').html(res);
				}
			});
		});

		$('.cancel_request_check').click(function(){

			var id = $(this).attr('attr_id');
			var id2 = $(this).attr('attr_id2');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend_check.php',
				data: {'c_id':id,'v_id':id2},

				success:function(res)
				{
					$('#display_friend_check').html(res);
				}
			})
		});

</script>