<?php 

include_once 'connection.php';

$error = "";
if (isset($_POST['otp'])) {
	
	$get_otp = $_SESSION['otp2'];
	$enter_otp = $_POST['otp_enter'];

	if($get_otp == $enter_otp)
	{
		$_SESSION['otp2'] = "";
		header('location:username_check.php');
	}
	else
	{
		$error = "Entered OTP is invalid..!<br>Kindly enter correct OTP...";
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
			<div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
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
			<div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<div style="color: red; font-family: Muli,Segoe Ui; padding: 0px 0px 40px 0px">
						<?php
						if($error==""){}
						else{echo $error;}
						?>
						</div>
						<h2 class="log-title">OTP Verification</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="text" required="required" name="otp_enter" maxlength="6" minlength="6">
							  <label class="control-label" for="input">Enter 6 Digit OTP</label><i class="mtrl-select"></i>
							</div>
							
							<div class="submit-btns">
								<button type="submit" name="otp" class="mtr-btn"><span style="color: whitesmoke;">Verify OTP</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>