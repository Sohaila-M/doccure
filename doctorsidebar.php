<?php
include('includes/conn.php');

$id =$_SESSION['doctorid'];
$q="SELECT * FROM doctor WHERE id =$id";
$doctor = $conn->query($q);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<div class="profile-sidebar">
<?php 
                            foreach($doctor as $d){ ?>
                              
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?=$d['image']?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Dr.<?=$d['firstname']." ".$d['lastname']?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0"><?=$d['title']?></h5>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="appointments.php">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											
										
											<li>
												<a href="doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											
											<li>
												<a href="index-2.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
</body>
</html>