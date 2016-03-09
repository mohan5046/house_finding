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
	
	$dir_name="images/$user";
	if (!file_exists($dir_name)) 
	{
		mkdir($dir_name, 0777);
	}
	
	$file_upload1="true";
	$file_name1=$_FILES["file_up_pro"]["name"];
	$add1="$dir_name/$file_name1";
	if(move_uploaded_file($_FILES["file_up_pro"]["tmp_name"], $add1))
	{
		header("location:home.php");
	}
	else
	{
		echo "<script>alert('some problem in uploading your profile pic')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
		
		$result1=mysqli_query($con,"INSERT INTO pro_image(img_path,u_id) VALUES ('$add1','$u_id')");
	
   ?>