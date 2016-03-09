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
   
   $state=$_POST['state'];
   $city=$_POST['city'];
   $locality=$_POST['locality'];
   
	$result=mysqli_query($con,"select city_id FROM cities WHERE city_name='$city'");
	while ($row=mysqli_fetch_array($result)) 
	{
		$city_id=$row['city_id'];
	}
	
	$loc_check=mysqli_query($con,"select loc_name FROM locality WHERE loc_name='$locality' AND loc_city_id='$city_id'");
	$loc_count=mysqli_num_rows($loc_check);
	if($loc_count>0)
	{
	while ($row=mysqli_fetch_array($loc_check)) 
	{
		$tab_loc_name=$row['loc_name'];
	}
	if($tab_loc_name != $locality)
	{
		mysqli_query($con,"INSERT INTO locality(loc_name,loc_city_id) VALUES('$locality','$city_id')");
	}
	}
	else
	{
		mysqli_query($con,"INSERT INTO locality(loc_name,loc_city_id) VALUES('$locality','$city_id')");
	}
	
	$title=$_POST['title'];
	$cat=$_POST['cat'];
	$fur=$_POST['fur'];
	$typ=$_POST['typ'];
	$rooms=$_POST['rooms'];
	$price=$_POST['price'];
	$address=$_POST['address'];
	$description=$_POST['description'];
	
	
	$dir_name="images/$user";
	if (!file_exists($dir_name)) 
	{
		mkdir($dir_name, 0777);
	}
	
	$file_upload1="true";
	$file_name1=$_FILES["file_up1"]["name"];
	$add1="$dir_name/$file_name1";
	if(move_uploaded_file($_FILES["file_up1"]["tmp_name"], $add1))
	{
		//header("location:home.php");
	}
	else
	{
		echo "sorry some errors";
	}
	
	$file_upload2="true";
	$file_name2=$_FILES["file_up2"]["name"];
	$add2="$dir_name/$file_name2";
	if(move_uploaded_file($_FILES["file_up2"]["tmp_name"], $add2))
	{
		//header("location:home.php");
	}
	else
	{
		echo "sorry some errors";
	}
	
	$file_upload3="true";
	$file_name3=$_FILES["file_up3"]["name"];
	$add3="$dir_name/$file_name3";
	if(move_uploaded_file($_FILES["file_up3"]["tmp_name"], $add3))
	{
		//header("location:home.php");
	}
	else
	{
		echo "sorry some errors";
	}
	
	$file_upload4="true";
	$file_name4=$_FILES["file_up4"]["name"];
	$add4="$dir_name/$file_name4";
	if(move_uploaded_file($_FILES["file_up4"]["tmp_name"], $add4))
	{
		//header("location:home.php");
	}
	else
	{
		echo "sorry some errors";
	}
	

	$result1=mysqli_query($con,"INSERT INTO storeadd(add_title,cat,fur,typ,rooms,price,state,city,locality,address,description,image1,image2,image3,image4,image5,u_id) VALUES('$title','$cat','$fur','$typ','$rooms','$price','$state','$city','$locality','$address','$description','$add1','$add2','$add3','$add4','','$u_id')");
	if($result1==1)
	{
		echo "<script>alert('your post ADDED successfully')</script>";
		echo "<script>window.location.assign('home.php')</script>";
	}
	else
	{
		echo "<script>alert('your post NOT added')</script>";
		echo "<script>window.location.assign('add_post.php')</script>";
	}
		
?>