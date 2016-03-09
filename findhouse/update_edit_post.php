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
	$p_id=$_POST['p_id'];
	$title=$_POST['title'];
	$cat=$_POST['cat'];
	$fur=$_POST['fur'];
	$price=$_POST['price'];
	$address=$_POST['address'];
	$description=$_POST['description'];
	$resultset=mysqli_query($con,"UPDATE storeadd SET add_title='$title',cat='$cat',fur='$fur',price='$price',address='$address',description='$description' WHERE str_id='$p_id'");
	if($resultset==1)
	{
		echo "<script>alert('your AD UPDATED successfully')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
	else
	{
		echo "<script>alert('your AD NOT UPDATED')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
?>