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
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysqli_query($con,"select loc_name FROM locality WHERE loc_name like '%$q%' LIMIT 5");
//echo $sql_res;
while($row=mysqli_fetch_array($sql_res))
{
$username=$row['loc_name'];
$b_username='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
?>
<div class="show" align="center">
<span class="name"><?php echo $final_username; ?></span>
</div>
<?php
}
}
?>
