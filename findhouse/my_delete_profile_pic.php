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
   
   
		$img_id = $_GET['img_id'];
      $resultset=mysqli_query($con,"DELETE FROM pro_image WHERE img_id='$img_id'");
	  if($resultset==1)
	{
		echo "<script>alert('your PIC DELETED successfully')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
	else
	{
		echo "<script>alert('your PIC NOT DELETED')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
  ?>