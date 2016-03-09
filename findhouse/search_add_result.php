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
	include "only_header.php";
   include "left_content1.php";
  ?>

<?php

 $city=$_POST['city'];
   $locality=$_POST['locality'];
   $fur=$_POST['fur'];
   $price_min=$_POST['price_min'];
   $price_max=$_POST['price_max'];

   $str="Select * from storeadd where ";
   $count=0;
   $count1=0;
   
   
   $str.="city='$city' AND ";
   
	if(!$locality==null)
   {   
		$str.="locality='$locality' AND (";
   }
   else
	   $str.="(";
   
 
 if(isset($_POST['rent']) && !isset($_POST['lease']))
{
	$str.="cat='rent'";
}


if(!isset($_POST['rent']) && isset($_POST['lease']))
{
	$str.="cat='lease'";
}


if(isset($_POST['rent']) && isset($_POST['lease']))
{
	$str.="cat='rent' OR cat='lease'";
}
 
 $str.=") AND (";
 
 $str.="fur='$fur'";
 
 $str.=") AND (";
 
 if(isset($_POST['individual']))
 {
	$str.="typ='individual'";
	$count1++;
 }
 
 if(isset($_POST['apartment']))
 {
	if($count1>0)
		$str.=" OR typ='apartment'";
	else
		$str.="typ='apartment'";
	$count1++;
 }
 
 if(isset($_POST['villa']))
 {
	if($count1>0)
		$str.=" OR typ='villa'";
	else
		$str.="typ='villa'";
	$count1++;
 }
 
 $str.=") AND (";
 
 if(isset($_POST['room1']))
 {
	$str.="rooms='1'";
	$count++;
 }
 if(isset($_POST['room2']))
 {
	if($count>0)
		$str.=" OR rooms='2'";
	else
		$str.="rooms='2'";
	$count++;
 }
 if(isset($_POST['room3']))
 {
	if($count>0)
		$str.=" OR rooms='3'";
	else
		$str.="rooms='3'";
	$count++;
 }
 if(isset($_POST['room4']))
 {
	if($count>0)
		$str.=" OR rooms='4'";
	else
		$str.="rooms='4'";
	$count++;
 }
 if(isset($_POST['room5']))
 {
	if($count>0)
		$str.=" OR rooms='5+'";
	else
		$str.="rooms='5+'";
	$count++;
 }
 
$str.=") AND (";

$str.="price >= $price_min AND price <= $price_max";

$str.=");";

 //echo $str."<br>";
 
 $result=mysqli_query($con,"$str");
 
 $result_count=mysqli_num_rows($result);
 
 
 if($result_count==0)
 {
	 echo "<br><br><center><h1>".$result_count;
	 echo " : No Result found for this Search</h1></center>";
 }
 
 else
 {
	echo "<h2>Total No of Results Found : ".$result_count."</h2>";
	while($row=mysqli_fetch_array($result))
	{
		?><center><table border="2" width="800px" height="133px">
		<?php
			echo "<tr width='800px' height='133px'><td width='138px' height='133px'><img src=".$row['image1']." alt='no img to display' width='138px' height='133px'/></td><td width='500px'><h3>".$row['add_title']."</h3><br><br>House Type : ".$row['typ']."<br><br>".$row['description']."</td><td><h1 align='center'>Rs.".$row['price']."</h1><h1 align='center'><a href='view_post.php?p_id=".$row['str_id']."'>view</a></h1></td></tr>";
		?>
		</table></center>
		<?php
	}
}
?>
 
<?php
		include "clear_content1.php";
		include "footer.php";
?>