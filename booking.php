<?php
session_start();
include('includes/conn.php');
if( ! isset($_SESSION['login']))
{
	$_SESSION['error']="You must login first" ;
	header("Location: login.php");
}

if($_SERVER['REQUEST_METHOD']=='GET')
{ 
	
$doctorid=$_GET['doctorid'];
$_SESSION['doctorid'] =$doctorid ;
$patientid= $_SESSION['id'] ;
$q="SELECT * FROM doctor WHERE id=$doctorid";
$doctor=$conn->query($q);  }

if($_SERVER['REQUEST_METHOD']=='POST')
{ $doctorid=$_SESSION['doctorid'] ;
	$patientid= $_SESSION['id'] ;
	$date=$_POST['date'];
	$time=$_POST['time'];
	$q="SELECT * FROM doctor WHERE id=$doctorid";
$doctor=$conn->query($q);
	foreach($doctor as $d) $pricing=$d['pricing'] ;
	$qinsert="INSERT INTO `appointment`(`doctor-id`, `patient-id`, `appt-date`, `appt-time`, `booking-date`, `status`, `amount`) VALUES
	('$doctorid' , '$patientid' , '$date' , '$time' , Now() , 'pending' , '$pricing' )";
	$insert=$conn->query($qinsert);
	if($insert)
	{
		header("Location: booking-success.php?date=$date&time=$time");
	}
}

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						<?php foreach ($doctor as $d) {
							$doctorid=$d['id'];
							?>
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.php" class="booking-doc-img">
											<img src="<?=$d['image']?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.php">Dr. <?=$d['firstname']." ".$d['lastname']?></a></h4>
										
											<p class="text-muted mb-3"><i class="fas fa-map-marker-alt"></i> <?=$d['country']?></p>
											<p class="doc-location">
												<i class="far fa-money-bill-alt"></i> <?=$d['pricing']?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<form  action="booking.php" method="post">
							
								<div class="row">
									<div class="col-md-6">
										<div class="card">
										<div class="card-body">
											<h3>Choose your Appointment Date</h3>
											<input type="date" class="form-control" name='date'required >
										</div>
									</div>
									</div>
									<div class="col-md-6">
										<div class="card">
										<div class="card-body">
											<h3>Choose your Appointment Time</h3>
											<input type="time" class="form-control" name='time' required >
										</div>
									</div>
									</div>
								</div>
								
							
							
							<!-- Schedule Widget -->
							
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<button type="submit" class="btn btn-primary submit-btn">Make Appointment</button>
							</div>
							<!-- /Submit Section -->
						</form>
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

<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
</html>