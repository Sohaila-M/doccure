<?php
session_start();
include("includes/conn.php");
if( ! isset($_SESSION['login']))
{
	$_SESSION['error']="You must login first" ;
	header("Location: login.php");
}
$doctorid=$_SESSION['doctorid'];
$q="SELECT * FROM `appointment` WHERE (`doctor-id`=$doctorid && `status`='pending') ORDER BY `appt-date` DESC,`appt-time` DESC" ;
$appts=$conn->query($q);
$appointmentsnum=($appts->num_rows)."<hr>";
/*$qq="SELECT COUNT('appt-id') FROM `appointment` WHERE `doctor-id`=$doctorid";
$count=$conn->query($qq);
foreach($count as $c)
{
	
	echo($c["COUNT('appt-id')"]);
}*/
$qq="SELECT `patient-id`, COUNT(`patient-id`) FROM `appointment` WHERE `doctor-id`=$doctorid GROUP BY `patient-id`HAVING COUNT(`patient-id`)>0";
$results=$conn->query($qq);
$patientsnum=($results->num_rows);

?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<?php
							include("includes/doctorsidebar.php");
							?>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3><?=$patientsnum?></h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												
												
												<div class="col-md-12 col-lg-6">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3><?=$appointmentsnum?></h3>
															<p class="text-muted"><?=date(" jS F Y ")?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointments">
							
										<!-- Appointment List -->
										<?php 
										foreach($appts as $a) {
											$patientid=$a['patient-id'];
											$qpatient="SELECT 	`first name`,`last name`,`state`,`country`,`email`,`phone`,`image` FROM patient WHERE id=$patientid";
											$patient=$conn->query($qpatient) ;
							                foreach ($patient as $p) {
											?>

										<div class="appointment-list">
											<div class="profile-info-widget">
												<a href="patient-profile.html" class="booking-doc-img">
													<img src="<?=$p['image']?>" alt="User Image">
												</a>
												<div class="profile-det-info">
													<h3><a href="patient-profile.html"><?=$p['first name']." ".$p['last name']?></a></h3>
													<div class="patient-details">
														<h5><i class="far fa-clock"></i><?=$a['appt-date'].",".$a['appt-time']?></h5>
														<h5><i class="fas fa-map-marker-alt"></i> <?=$p['state']."," .$p['country']?></h5>
														<h5><i class="fas fa-envelope"></i> <?=$p['email']?></h5>
														<h5 class="mb-0"><i class="fas fa-phone"></i> <?=$p['phone']?></h5>
													</div>
												</div>
											</div>
											<div class="appointment-action">
												
												<a href="accept.php?accept=true&apptid=<?=$a['appt-id']?>" class="btn btn-sm bg-success-light">
													<i class="fas fa-check"></i> Accept
												</a>
												<a href="accept.php?accept=false&apptid=<?=$a['appt-id']?>" class="btn btn-sm bg-danger-light">
													<i class="fas fa-times"></i> Cancel
												</a>
											</div>
										</div>	
										<?php } }?>
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
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>