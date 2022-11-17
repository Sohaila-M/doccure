<?php
include('includes/conn.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{   $error="";
	$email=$_POST['email'];
	$password=$_POST['password'];
	$encpass=md5($password);
	$q="SELECT *  FROM doctor";
	$doctor=$conn->query($q);
	foreach($doctor as $d)
	{
		if ($email == $d['email'])
		{
			$_SESSION['error']="This email already exist";
		} }
		if (! isset($_SESSION['error'])){
		{
			$qq="INSERT into doctor (email , password,date) VALUES ('$email','$encpass',Now())";
			$insert=$conn->query($qq);
			header("Location: doctorlogin.php");
		}
	}
}

?>

<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-register.html  30 Nov 2019 04:12:15 GMT -->
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
	<body class="account-page">

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
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
									<?php 
									if(isset($_SESSION['error'])){?>
									<div class="alert alert-danger" role="alert">
										<?php
									echo $_SESSION['error'] ;
									unset($_SESSION['error']);?>
									</div>
								<?php  } ?>
										<div class="login-header">
											<h3>Doctor Register <a href="register.php">Not a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="doctor-register.php" method="post">
											
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name='email'>
												<label class="focus-label">Email Address</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating"name='password'>
												<label class="focus-label">Create Password</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="doctorlogin.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-register.html  30 Nov 2019 04:12:16 GMT -->
</html>