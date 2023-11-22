<?php 

include_once 'connection.php';

$_SESSION['login'] = null;

$error="";
if (isset($_POST['login']))
{
	$user = $_POST['username'];
	$password = $_POST['password'];

	$sql_select_c = "select * from `user_register` where `username`='$user' and `password`='$password'";
	$data_c = mysqli_query($conn,$sql_select_c);
	$row_count = mysqli_num_rows($data_c);

	$sql_select = "select * from `user_register` where `username`='$user' and `password`='$password'";
	$data = mysqli_query($conn,$sql_select);
	$row = mysqli_fetch_assoc($data);

	if($row_count>0)
	{
		$_SESSION['login']=$row['id'];

		header('location:home.php');
	}
	else
	{
		$error = "Entered User-name or Password is invalid...!<br>Kindly enter correct User-name or Password...";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style type="text/css">
    	.logout{
    		height: 93vh;
    		background-color: #f4f2f2;
    	}
    </style>

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="#" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				<a href="index.php" title=""><img src="images/logo2.png" alt=""></a>
			</span>
			<span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
		</div>
	</div><!-- responsive header -->
	
	<div class="topbar stick">
		<div class="logo">
			<a title="" href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		
		<div class="top-area">
			<div class="login-form">
				<form method="post">
					<input type="text" placeholder="User Name" name="username">
					<input type="password" placeholder="Passoword" name="password">
					<button type="submit" name="login">Login</button>
				</form>
			</div>
		</div>
	</div><!-- topbar with logout -->
	

	<section>
		<div class="gap100 gray-bg logout">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div style="color: red; font-family: Muli,Segoe Ui; padding: 0px 0px 40px 0px; text-align: center;">
							<?php
								if($error==""){}
								else{echo $error;}
							?>
						</div>
						<div class="user-img text-center">
							<img src="images/resources/admin.jpg" alt="" class="rounded-circle">
						</div><br>
						<div class="logout-meta">
							<h2>logged out</h2>
							<span>Do you want to check Janice Griffith’s Profile?</span>
							<p>
								Please <a href="index.php" title="">Login</a> or <a href="register.php" title="">Register</a> now to create your own profile and have access to all the Winku awesome features!
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>