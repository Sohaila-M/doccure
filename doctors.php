<?php 
session_start();
include('includes/conn.php');
if( ! isset($_SESSION['login']))
{
	$_SESSION['error']="You must login first" ;
	header("Location: login.php");
}
$q="SELECT * FROM doctor";
$doctors =$conn->query($q);

?>


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/favourites.html  30 Nov 2019 04:12:16 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Doctors</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctors</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<?php 
						include('includes/sidebar.php');
						?>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">
								<?php
								foreach($doctors as $d){
									?>
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.php?doctorid=<?=$d['id']?>">
												<img class="img-fluid" alt="User Image" src="<?=$d['image']?>">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.php?doctorid=<?=$d['id']?>"><?=$d['firstname']." ".$d['lastname']?></a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality"><?=$d['title']?></p>
											
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i><?=$d['country']?>
												</li>
												
												<li>
													<i class="far fa-money-bill-alt"></i> <?=$d['pricing']?> <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												<div class="col-6">
													<a href="doctor-profile.php?doctorid=<?=$d['id']?>" class="btn view-btn">View Profile</a>
												</div>
												<div class="col-6">
													<a href="booking.php?doctorid=<?=$d['id']?>" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
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

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->
</html>