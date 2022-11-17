<?php
session_start(); 
include("includes/conn.php");
if( ! isset($_SESSION['login']))
{
	$_SESSION['error']="You must login first" ;
	header("Location: login.php");
}
$id=$_SESSION['id'];
if($_SERVER['REQUEST_METHOD']=='POST')
{ 
$old=md5($_POST['old']);
$new=md5($_POST['new']);
$confirm=md5($_POST['confirm']);
$q="SELECT password FROM patient where id=$id";
$password=$conn->query($q);
foreach ($password as $p)
{
	 if ($p['password']!=$old)
	 {
		$_SESSION['error']="Old password is wrong";
	 }
	 else if ($old==$new)
	 {
		$_SESSION['error']="New Password must be different from old password";
	 }
	 else if ($new != $confirm)
	 {
		$_SESSION['error']="new password and confirm password don't match" ;	
	 }
	 else
	 {
      $qq="UPDATE `patient` SET `password`='$new' WHERE id=$id";
	  $update=$conn->query($qq);
	  $_SESSION['error']="your password is changed" ;
	  
	 }
}
}
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
				<!-- Header -->
				<header class="header">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn" href="javascript:void(0);">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</a>
							<a href="index.html" class="navbar-brand logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">
							<div class="menu-header">
								<a href="index.html" class="menu-logo">
									<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
								</a>
								<a id="menu_close" class="menu-close" href="javascript:void(0);">
									<i class="fas fa-times"></i>
								</a>
							</div>
							<ul class="main-nav">
								<li class="active">
									<a href="index.html">Home</a>
								</li>
								
								<li class="login-link">
									<a href="login.php">Login / Signup</a>
								</li>
							</ul>		 
						</div>		 
						<ul class="nav header-navbar-rht">
							<li class="nav-item contact-item">
								<div class="header-contact-img">
									<i class="far fa-hospital"></i>							
								</div>
								<div class="header-contact-detail">
									<p class="contact-header">Contact</p>
									<p class="contact-info-header"> +1 315 369 5943</p>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link header-login" href="login.php">login / Signup </a>
							</li>
						</ul>
					</nav>
				</header>
				<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						
						
							<!-- Profile Sidebar -->
							
						<?php include('includes/sidebar.php'); ?>
							<!-- /Profile Sidebar -->
							
						
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
                                      <?php
									  if(isset($_SESSION['error']))
									  {?>
									  <div class="alert alert-danger" role="alert">
										<?php
                                        echo $_SESSION['error'];
										unset($_SESSION['error']);
										?>
										</div>
									  <?php } ?>
                                           
											<!-- Change Password Form -->
											<form action="change-password.php" method="post">
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name='old'>
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name='new'>
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name='confirm'>
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
		
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
</html>