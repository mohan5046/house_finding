<?php 
	session_start();
   if($_SESSION['user'])
   {	   
   }
   else
   {
      header("location: index.php");
   }
   $user = $_SESSION['user'];
   $u_id=$_SESSION['u_id'];
   $u_name=$_SESSION['u_name'];
   include "connection.php";
   
   
		$p_id = $_GET['p_id'];
      $resultset=mysqli_query($con,"DELETE FROM storeadd WHERE str_id='$p_id'");
	  if($resultset==1)
	{
		echo "<script>alert('your AD DELETED successfully')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
	else
	{
		echo "<script>alert('your AD NOT DELETED')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
  ?>