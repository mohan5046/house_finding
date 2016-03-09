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
?>
   
   <?php
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$ph=$_POST['ph'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$resultset=mysqli_query($con,"UPDATE user SET fname='$fname',lname='$lname',ph='$ph',email='$email',password='$password' WHERE u_id='$u_id'");
		if($resultset==1)
		{
			echo "<script>alert('your profile UPDATED successfully')</script>";
			echo "<script>window.location.assign('home.php')</script>";
		}
		else
		{
			echo "<script>alert('your profile NOT UPDATED')</script>";
			echo "<script>window.location.assign('home.php')</script>";
		}
	?>