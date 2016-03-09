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
   $city=$_SESSION['city'];
   include "connection.php";
   include "only_header.php";
   include "left_content1.php";
   ?>
   
   <?php
		$result=mysqli_query($con,"SELECT * FROM storeadd where city='$city' ORDER BY str_id DESC");
		$count=mysqli_num_rows($result);
		echo "<h2>Recently Posted AD's in your City</h2>";
		while($row=mysqli_fetch_array($result))
		{
		?><center><table border="2" width="800px" height="133px">
		<?php
			
			echo "<tr width='800px' height='133px'><td width='138px' height='133px'><img src=".$row['image1']." alt='no img to display' width='138px' height='133px'/></td><td width='500px'><h3>".$row['add_title']."</h3><br><br>House Type : ".$row['typ']."<br><br>".$row['description']."</td><td><h1 align='center'>Rs.".$row['price']."</h1><h1 align='center'><a href='view_post.php?p_id=".$row['str_id']."'>view</a></h1></td></tr>";
		
		?>
		</table></center>
		<?php
		}
?>
	
<?php
		include "clear_content1.php";
		include "footer.php";
?>