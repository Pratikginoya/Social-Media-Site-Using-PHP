<?php 

include_once 'connection.php';

$error = "";
if (isset($_POST['otp']))
{
	$email = $_POST['email'];

	$sql_select = "select * from `user_register` where `email`='$email'";
	$data = mysqli_query($conn,$sql_select);
	$row_count = mysqli_num_rows($data);
	$row = mysqli_fetch_assoc($data);

	if($row_count>0)
	{
		$_SESSION['email2'] = $email;
		$_SESSION['username2'] = $row['username'];
		$_SESSION['name2'] = $row['name'];

		header('location:mail/smtp_active.php');
	}
	else
	{
		$error = "Entered email is not registered..<br>Kindly register your self with join-now....";
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
						<h2 class="log-title">Enter your Email</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="text" required="required" name="email">
							  <label class="control-label" for="input">Enter your registered email...</label><i class="mtrl-select"></i>
							</div>
							
							<div class="submit-btns">
								<button type="submit" name="otp" class="mtr-btn"><span style="color: whitesmoke;">Send OTP</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>