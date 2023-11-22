<?php 

include_once '../connection.php';

$user_id = $_SESSION['login'];

if(isset($_POST['msg']))
{
	$msg = $_POST['msg'];
	$user_id = $_POST['msg_by'];
	$m_id = $_POST['m_id'];

	$sql_insert = "insert into `message` (`message_by`,`message_to`,`message`) values ('$user_id','$m_id','$msg')";
	mysqli_query($conn,$sql_insert);

}

$sql_select_m = "select * from message where message_by=$user_id and message_to=$m_id or message_by=$m_id and message_to=$user_id";
$data_m = mysqli_query($conn,$sql_select_m);

 ?>


												

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


												