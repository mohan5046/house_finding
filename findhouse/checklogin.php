<?php
	session_start();
	$user_id=$_POST['user_id'];
	$password2=$_POST['password2'];
	include "connection.php";
	$query=mysqli_query($con,"select * from user where user_id='$user_id'");
	$exists=mysqli_num_rows($query);
	if($exists>0)
	{
		while($row=mysqli_fetch_assoc($query))
		{
			$tableuser=$row['user_id'];
			$tablepass=$row['password'];
			$_SESSION['u_id'] = $row['u_id'];
			$_SESSION['u_name']=$row['fname'];
			$_SESSION['state']=$row['state_name'];
			$_SESSION['city']=$row['city_name'];
		}
		if(($user_id==$tableuser) && ($password2==$tablepass))
		{
			$_SESSION['user'] = $user_id;
			
			
			header("location: home.php");
		}
		else
		{
			echo "<script>alert('User Id and Password mismatch')</script>";
			echo "<script>window.location.assign('index.php')</script>";
		}
	}
	else
	{
		echo "<script>alert('incorrect username')</script>";
		echo "<script>window.location.assign('index.php')</script>";
	}
?>