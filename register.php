<?php 

include_once 'connection.php';

$error = "";
// if (isset($_POST['register'])) {
	
// 	$name = $_POST['name'];
// 	$user = $_POST['username'];
// 	$password1 = $_POST['password1'];
// 	$password2 = $_POST['password2'];
// 	$gender = $_POST['radio'];
// 	$email = $_POST['email'];

// 	if($password1 == $password2)
// 	{
		// $sql_select_u = "select * from `user_register` where `username`='$user'";
		// $data_u = mysqli_query($conn,$sql_select_u);
		// $row_u = mysqli_num_rows($data_u);

		// $sql_select_e = "select * from `user_register` where `email`='$email'";
		// $data_e = mysqli_query($conn,$sql_select_e);
		// $row_e = mysqli_num_rows($data_e);

// 		if($row_u==0)
// 		{
// 			if ($row_e==0)
// 			{
// 				$_SESSION['name'] = $name;
// 				$_SESSION['username'] = $user;
// 				$_SESSION['password1'] = $password1;
// 				$_SESSION['radio'] = $gender;
// 				$_SESSION['email'] = $email;

// 				header('location:mail/smtp.php');
// 			}
// 			else
// 			{
// 				$error = "Entered Email ID is already exist..!<br>Kindly enter correct Email or User 'Already have an account' option...";
// 			}
// 		}
// 		else
// 		{
// 			$error = "Entered User-name is already exist..!<br>Kindly enter another User-name...";
// 		}

		
// 	}
// 	else
// 	{
// 		$error = "Re-entered password is not match..!<br>Kindly enter same password in both field...";
// 	}
// }

if (isset($_POST['register'])) {
	
	$name = $_POST['name'];
	$user = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$gender = $_POST['radio'];
	$email = $_POST['email'];

	if($password1 == $password2)
	{
		$sql_select_u = "select * from `user_register` where `username`='$user'";
		$data_u = mysqli_query($conn,$sql_select_u);
		$row_u = mysqli_num_rows($data_u);

		if($row_u==0)
		{
			$sql_insert = "insert into `user_register` (`name`,`username`,`password`,`gender`,`email`) values ('$name','$user','$password1','$gender','$email')";
			mysqli_query($conn,$sql_insert);

			header('location:index.php');
		}
		else
		{
			$error = "Entered User-name is already exist..!<br>Kindly enter another User-name...";
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
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Winku Yet? <a href="index.php" title="">Take the tour</a> or <a href="register.php" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="text" required="required" name="name" maxlength="30">
							  <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name="username" maxlength="30">
							  <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password1" maxlength="15" minlength="6">
							  <label class="control-label" for="input">Password (6-15 digit)</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password2" maxlength="15" minlength="6">
							  <label class="control-label" for="input">Re-enter Password (6-15 digit)</label><i class="mtrl-select"></i>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" checked="checked" value="Male"><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" value="Female"><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
							<div class="form-group">	
							  <input type="email" required="required" name="email">
							  <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c29010d05002c">Email&#160;[Protected]</a></label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" required><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
							<a href="recover-acc.php" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<button type="submit" name="register" value="register" class="mtr-btn"><span style="color: whitesmoke;">Submit</span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>