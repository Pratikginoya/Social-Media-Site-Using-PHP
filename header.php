<?php 

include_once 'connection.php';

if (isset($_SESSION['login']))
{
	$user_id = $_SESSION['login'];

	$style = "border: 1px solid green";

	$sql_select_user = "select * from `user_register` where `id`='$user_id'";
	$data_user = mysqli_query($conn,$sql_select_user);
	$row_user = mysqli_fetch_assoc($data_user);

	$sql_select_con = "select * from `friend` where `user`='$user_id'";
	$data_con = mysqli_query($conn,$sql_select_con);
	$total_friends = mysqli_num_rows($data_con);
}
else
{
	header('location:index.php');
}

$sql_select_pro_pic = "select * from `user_register` where `id`='$user_id'";
$data_user_pro_pic = mysqli_query($conn,$sql_select_pro_pic);
$row_user_pro_pic = mysqli_fetch_assoc($data_user_pro_pic);


// Notification count (except messages)
// $sql_select_status_1 = "select * from `friend` where `user`='$user_id' and `status`='1'";
// $sql_select_status_2 = "select * from `friend_request` where `to`='$user_id' and `status`='1'";
// $sql_select_status_3 = "select * from post_comment inner join post on post.user_id=$user_id and post_comment.post_id = post.p_id and post_comment.status=1";

// $data_status_1 = mysqli_query($conn,$sql_select_status_1);
// $data_status_2 = mysqli_query($conn,$sql_select_status_2);
// $data_status_3 = mysqli_query($conn,$sql_select_status_3);

// $n1 = mysqli_num_rows($data_status_1);
// $n2 = mysqli_num_rows($data_status_2);
// $n3 = mysqli_num_rows($data_status_3);

// $notification_n = $n1 + $n2 + $n3;

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
    <link rel="stylesheet" href="css/styleses.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsives.css">
    <style type="text/css">
    	.user-setting{
    		left: -50px;
    	}
    </style>
</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				<a href="index.php" title=""><img src="images/logo2.png" alt=""></a>
			</span>
			<span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
		</div>
		<div class="mh-head second">
			<form class="mh-form">
				<input placeholder="search" />
				<a href="#/" class="fa fa-search"></a>
			</form>
		</div>
		<nav id="menu" class="res-menu">
			<ul>
				<li><span>Home</span>
					<ul>
<!-- 						<li><a href="index.php" title="">Home</a></li>
						<li><a href="login.php" title="">Login page</a></li>
						<li><a href="logout.php" title="">Logout Page</a></li> -->
						<li><a href="index.php" title="">New Posts</a></li>
					</ul>
				</li>
				<li><span>Time Line</span>
					<ul>
						<li><a href="time-line.php" title="">timeline</a></li>
						<li><a href="timeline-friends.php" title="">timeline friends</a></li>
						<li><a href="timeline-groups.php" title="">timeline groups</a></li>
						<li><a href="timeline-pages.php" title="">timeline pages</a></li>
						<li><a href="timeline-photos.php" title="">timeline photos</a></li>
						<li><a href="timeline-videos.php" title="">timeline videos</a></li>
						<li><a href="fav-page.php" title="">favourit page</a></li>
						<li><a href="groups.php" title="">groups page</a></li>
						<li><a href="page-likers.php" title="">Likes page</a></li>
						<li><a href="people-nearby.php" title="">people nearby</a></li>
						
						
					</ul>
				</li>
				<li><span>Account Setting</span>
					<ul>
						<li><a href="create-fav-page.php" title="">create fav page</a></li>
						<li><a href="edit-account-setting.php" title="">edit account setting</a></li>
						<li><a href="edit-interest.php" title="">edit-interest</a></li>
						<li><a href="edit-password.php" title="">edit-password</a></li>
						<li><a href="edit-profile-basic.php" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation.php" title="">edit work educations</a></li>
						<li><a href="messages.php" title="">message box</a></li>
						<li><a href="inbox.php" title="">Inbox</a></li>
						<li><a href="notifications.php" title="">notifications page</a></li>
					</ul>
				</li>
				<!-- <li><span>forum</span>
					<ul>
						<li><a href="forum.html" title="">Forum Page</a></li>
						<li><a href="forums-category.html" title="">Fourm Category</a></li>
						<li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
						<li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
					</ul>
				</li>
				<li><span>Our Shop</span>
					<ul>
						<li><a href="shop.html" title="">Shop Products</a></li>
						<li><a href="shop-masonry.html" title="">Shop Masonry Products</a></li>
						<li><a href="shop-single.html" title="">Shop Detail Page</a></li>
						<li><a href="shop-cart.html" title="">Shop Product Cart</a></li>
						<li><a href="shop-checkout.html" title="">Product Checkout</a></li>
					</ul>
				</li>
				<li><span>Our Blog</span>
					<ul>
						<li><a href="blog-grid-wo-sidebar.html" title="">Our Blog</a></li>
						<li><a href="blog-grid-right-sidebar.html" title="">Blog with R-Sidebar</a></li>
						<li><a href="blog-grid-left-sidebar.html" title="">Blog with L-Sidebar</a></li>
						<li><a href="blog-masonry.html" title="">Blog Masonry Style</a></li>
						<li><a href="blog-list-wo-sidebar.html" title="">Blog List Style</a></li>
						<li><a href="blog-list-right-sidebar.html" title="">Blog List with R-Sidebar</a></li>
						<li><a href="blog-list-left-sidebar.html" title="">Blog List with L-Sidebar</a></li>
						<li><a href="blog-detail.html" title="">Blog Post Detail</a></li>
					</ul>
				</li>
				<li><span>Portfolio</span>
					<ul>
						<li><a href="portfolio-2colm.html" title="">Portfolio 2col</a></li>
						<li><a href="portfolio-3colm.html" title="">Portfolio 3col</a></li>
						<li><a href="portfolio-4colm.html" title="">Portfolio 4col</a></li>
					</ul>
				</li>
				<li><span>Support & Help</span>
					<ul>
						<li><a href="support-and-help.html" title="">Support & Help</a></li>
						<li><a href="support-and-help-detail.html" title="">Support & Help Detail</a></li>
						<li><a href="support-and-help-search-result.html" title="">Support & Help Search Result</a></li>
					</ul>
				</li>
				<li><span>More pages</span>
					<ul>
						<li><a href="careers.html" title="">Careers</a></li>
						<li><a href="career-detail.html" title="">Career Detail</a></li>
						<li><a href="404.html" title="">404 error page</a></li>
						<li><a href="404-2.html" title="">404 Style2</a></li>
						<li><a href="faq.html" title="">faq's page</a></li>
						<li><a href="insights.html" title="">insights</a></li>
						<li><a href="knowledge-base.html" title="">knowledge base</a></li>
					</ul>
				</li> -->
				<li><a href="about.php" title="">about</a></li>
				<li><a href="contact.php" title="">contact</a></li>
				<li><a href="faq.php" title="">faq's page</a></li>
				<li><a href="insights.php" title="">insights</a></li>
				<li><a href="widgets.php" title="">Widgts</a></li>
			</ul>
		</nav>
		<nav id="shoppingbag">
			<div>
				<div class="">
					<form method="post">
						<div class="setting-row">
							<span>use night mode</span>
							<input type="checkbox" id="nightmode"/> 
							<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notifications</span>
							<input type="checkbox" id="switch2"/> 
							<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notification sound</span>
							<input type="checkbox" id="switch3"/> 
							<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>My profile</span>
							<input type="checkbox" id="switch4"/> 
							<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show profile</span>
							<input type="checkbox" id="switch5"/> 
							<label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
					<h4 class="panel-title">Account Setting</h4>
					<form method="post">
						<div class="setting-row">
							<span>Sub users</span>
							<input type="checkbox" id="switch6" /> 
							<label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>personal account</span>
							<input type="checkbox" id="switch7" /> 
							<label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Business account</span>
							<input type="checkbox" id="switch8" /> 
							<label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show me online</span>
							<input type="checkbox" id="switch9" /> 
							<label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Delete history</span>
							<input type="checkbox" id="switch10" /> 
							<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Expose author name</span>
							<input type="checkbox" id="switch11" /> 
							<label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div><!-- responsive header -->
	
	<div class="topbar stick">
		<div class="logo">
			<a title="" href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		
		<div class="top-area">
			<ul class="main-menu">
				<li><span>Home</span>
					<ul>
<!-- 						<li><a href="index.php" title="">Home</a></li>
						<li><a href="login.php" title="">Login page</a></li>
						<li><a href="logout.php" title="">Logout Page</a></li> -->
						<li><a href="index.php" title="">New Posts</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">timeline</a>
					<ul>
						<li><a href="time-line.php" title="">timeline</a></li>
						<li><a href="timeline-friends.php" title="">timeline friends</a></li>
						<li><a href="timeline-groups.php" title="">timeline groups</a></li>
						<li><a href="timeline-pages.php" title="">timeline pages</a></li>
						<li><a href="timeline-photos.php" title="">timeline photos</a></li>
						<li><a href="timeline-videos.php" title="">timeline videos</a></li>
						<li><a href="fav-page.php" title="">favourit page</a></li>
						<li><a href="groups.php" title="">groups page</a></li>
						<li><a href="page-likers.php" title="">Likes page</a></li>
						<li><a href="people-nearby.php" title="">people nearby</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">account settings</a>
					<ul>
						<li><a href="create-fav-page.php" title="">create fav page</a></li>
						<li><a href="edit-account-setting.php" title="">edit account setting</a></li>
						<li><a href="edit-interest.php" title="">edit-interest</a></li>
						<li><a href="edit-password.php" title="">edit-password</a></li>
						<li><a href="edit-profile-basic.php" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation.php" title="">edit work educations</a></li>
						<li><a href="messages.php" title="">message box</a></li>
						<li><a href="inbox.php" title="">Inbox</a></li>
						<li><a href="notifications.php" title="">notifications page</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">more pages</a>
					<ul>
						<li><a href="about.php" title="">about</a></li>
						<li><a href="contact.php" title="">contact</a></li>
						<li><a href="faq.php" title="">faq's page</a></li>
						<li><a href="insights.php" title="">insights</a></li>
						<li><a href="widgets.php" title="">Widgts</a></li>
					</ul>
				</li>
			</ul>
			<ul class="setting-area" style="margin-top: 17px;">
				<li>
					<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Friend">
							<button data-ripple><i class="ti-search"></i></button>
						</form>
					</div>
				</li>
				<li><a href="index.php" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
				<li>
					<a href="#" title="Notification" data-ripple="">
						<i class="ti-bell"></i><span>20</span>
					</a>
					<div class="dropdowns">
						<span>4 New Notifications</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="notifications.php" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li>
					<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
					<div class="dropdowns">
						<span>5 New Messages</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.php" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="messages.php" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
					<div class="dropdowns languages">
						<a href="#"><i class="ti-check"></i>English</a>
						<a href="#">Arabic</a>
						<a href="#">Dutch</a>
						<a href="#">French</a>
					</div>
				</li>
			</ul>
			<div class="user-img">
				<div style=" border-radius: 50%; width: 40px; height: 40px;">
					<img src="image/<?php echo $row_user_pro_pic['profile_pic']; ?>"  alt="" style="border: 3px solid #52BE80; border-radius: 50%; width:100%; height: 100%; object-fit: cover; object-position: top;">
				</div>
				<div class="user-setting">
					<!-- <a href="#"><span class="status f-online"></span>online</a>
					<a href="#"><span class="status f-away"></span>away</a>
					<a href="#"><span class="status f-off"></span>offline</a> -->
					<a href="time-line.php" disable>Hello..! <?php echo $row_user['name']; ?></a>
					<a href="time-line.php"><i class="ti-user"></i> view profile</a>
					<a href="edit-profile-basic.php"><i class="ti-pencil-alt"></i>edit profile</a>
					<a href="time-line.php"><i class="ti-target"></i>activity log</a>
					<a href="edit-account-setting.php"><i class="ti-settings"></i>account setting</a>
					<a href="logout.php"><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
			<!-- <span class="ti-menu main-menu" data-ripple=""></span> -->
		</div>
	</div><!-- topbar -->

</div>


