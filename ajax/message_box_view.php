<?php 

include_once '../connection.php';

$user_id = $_SESSION['login'];

if (isset($_GET['m_id']))
{
	$m_id = $_GET['m_id'];
}


$sql_profile_details = "select * from user_register where id = $m_id";
$data_details = mysqli_query($conn,$sql_profile_details);
$row_details = mysqli_fetch_assoc($data_details);

$sql_select_m = "select * from message where message_by=$user_id and message_to=$m_id or message_by=$m_id and message_to=$user_id";
$data_m = mysqli_query($conn,$sql_select_m);

 ?>

 												<div class="conversation-head">
													<figure><img src="image/<?php echo $row_details['profile_pic']; ?>" alt=""></figure>
													<span><?php echo $row_details['name']; ?> 
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
														<textarea name="msg"></textarea>
														<input type="text" name="msg_by" value="<?php echo $user_id; ?>">
														<input type="text" name="m_id" value="<?php echo $m_id; ?>">

														<button class="button_msg my-4 mx-2" title="send"><i class="fa fa-paper-plane"></i></button>
														<!-- <a href="javascript:void(0)" attr_id_by="<?php echo $user_id; ?>" attr_id_to="<?php echo $m_id; ?>" class="button_msg my-4 mx-2 message_send" title="send"><i class="fa fa-paper-plane"></i></a> -->
														</div>
													</form>
												</div>