<?php
include('includes/conn.php');

$id =$_SESSION['id'];
$q="SELECT * FROM patient WHERE id =$id";
$patient = $conn->query($q);

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
    <!-- Profile Sidebar -->
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
                                <?php 
                            foreach($patient as $p){ ?>
                              
                                
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="<?=$p['image']?>" alt="User Image">
										</a>
                                         
                                       
										<div class="profile-det-info">
											<h3><?=$p['first name'].' '.$p['last name']?></h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i><?=$p['dob']?></h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?= $p['state'].", ".$p['country']?></h5>
											</div>
										</div>
                                        
									</div>
								</div>
                               <?php } ?>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="doctors.php">
													<i class="fas fa-user-md"></i>
													<span>Doctors</span>
												</a>
											</li>
											<li>
												<a href="profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
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
						</div>
						<!-- / Profile Sidebar -->
						
</body>
</html>