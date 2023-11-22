<?php 

	// header('location:home.php');
	$profile_pic = $_FILES['file']['name'];

	$path = 'image/'.$profile_pic;

	move_uploaded_file($_FILES['file']['tmp_name'],$path);

	$sql_update = "update `user_register` set `profile_pic`='$profile_pic' where `id`='$user_id'";
	mysqli_query($conn,$sql_update);



 ?>