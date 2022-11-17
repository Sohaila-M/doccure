<?php
session_start();
include("includes/conn.php");
$accept = $_GET['accept'];
$apptid =$_GET['apptid'];
echo $accept .$apptid ;
if($accept=='true')
{
    $q ="UPDATE `appointment` SET `status`='confirm' WHERE `appt-id`=$apptid ";
    $confirm=$conn->query($q);
    if($confirm)
    {
       header("Location: doctor-dashboard.php");
    }
}
else if ($accept=='false')
{
    $q ="UPDATE `appointment` SET `status`='cancelled' WHERE `appt-id`=$apptid ";
    $cancel=$conn->query($q);
    if($cancel)
    {
      header("Location: doctor-dashboard.php");
    }
}