<?php 

include_once 'connection.php';

$error = "";
if (isset($_POST['submit'])) {
	
	$user = $_SESSION['username2'];
	$email = $_SESSION['email2'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($password1 == $password2)
	{
		$sql_select = "select * from `user_register` where `username`='$user' and `email`='$email'";
		$data = mysqli_query($conn,$sql_select);
		$row = mysqli_fetch_assoc($data);

		if ($row['password'] != $password1)
		{
			$sql_update = "update `user_register` set `password`='$password1' where `username`='$user' and `email`='$email'";
			mysqli_query($conn,$sql_update);

			$_SESSION['username2'] = "";
			$_SESSION['email2'] = "";
			$_POST['password1'] = "";
			$_POST['password2'] = "";

			header('location:index.php');
		}
		else
		{
			$error = "Entered Password is already used...!<br>Kindly enter another password...";
		}
		
	}
	else
	{
		$error = "Re-entered password is not match..!<br>Kindly enter same password in both field...";
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
						<h2 class="log-title">Set New Password</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="password" required="required" name="password1" maxlength="15" minlength="6">
							  <label class="control-label" for="input">New Password (6-15 digit)</label><i class="mtrl-select"></i>
							</div>

							<div class="form-group">	
							  <input type="password" required="required" name="password2" maxlength="15" minlength="6">
							  <label class="control-label" for="input">Re-enter New Password (6-15 digit)</label><i class="mtrl-select"></i>
							</div>
							
							<div class="submit-btns">
								<button type="submit" name="submit" class="mtr-btn"><span style="color: whitesmoke;">Submit</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>