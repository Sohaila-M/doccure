<?php
include("includes/conn.php");
session_start();
$id=$_SESSION["id"];
echo $id ;
$a=$_GET['a'];
$qdelete="DELETE FROM `appointment` WHERE `appt-id`=$a";
$delete=$conn->query($qdelete);
if($delete)
{
	header("Location: patient-dashboard.php?id=$id");
} 
?>