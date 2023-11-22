<?php 

include_once 'connection.php';

if (isset($_SESSION['login']))
{
	header('location:home.php');
}

$error = "";
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

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Winku</h1>
						<p>
							Winku is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<div style="color: red; font-family: Muli,Segoe Ui; padding: 0px 0px 40px 0px">
							<?php
								if($error==""){}
								else{echo $error;}
							?>
						</div>
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="text" id="input" required="required" name="username">
							  <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password">
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox"><i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
							<a href="pass-forgot.php" title="" class="forgot-pwd">Forgot Password?</a>
							<div class="submit-btns">
								<button type="submit" name="login" value="login" class="mtr-btn"><span style="color: whitesmoke;">Login</span></button>
							</div>
						</form>
						<br>

						<a href="register.php" class="mtr-btn" style="font-weight: 600;" type="button" name="register"><span>Register</span></a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>