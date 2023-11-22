<?php 

include_once 'connection.php';

$user = $_SESSION['username2'];

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
						<h2 class="log-title">Your User-name</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">
								<div style="margin-bottom: 15px;"><b>Your User-name is...</b></div>
								<div style="border-bottom: 1px solid #E6E6E6; padding: 5px 10px;"><?php echo @$user; ?></div>
							</div>
							
							<div class="submit-btns">
								<a href="password_change.php" type="submit" name="change_pass" class="mtr-btn"><span style="color: whitesmoke; font-weight: 600;">Update New Password</span></a>
								<a href="index.php" type="submit" name="login" class="mtr-btn"><span style="color: whitesmoke; font-weight: 600;">Login</span></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>