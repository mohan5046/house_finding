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
   
   <form action="update_edit_profile_pic.php" method="post" enctype="multipart/form-data">
			<h3>Want to EDIT ur Profile Pic ??</h3> 
			<input type="file" name="file_up_pro">
			<input type="submit" value="Upload New Image">
	</form><br>
   
   <?php
		$query_img=mysqli_query($con,"select * from pro_image where u_id='$u_id'");
		while($row_img=mysqli_fetch_array($query_img))
		{
				$img_id=$row_img["img_id"];
		?>	
		
			<h3>Want to DELETE ur Profile Pic ?? <a href="#" onclick="myFunction('<?php echo $img_id; ?>')">Delete Pic here</a></h3>
				<script>
					function myFunction(img_id)
					{
						var r = confirm("Are you sure you want to delete this Pic?");
						if(r == true)
						{
							window.location.assign("my_delete_profile_pic.php?img_id=" + img_id);
						}
					}
				</script>
			
			<center><br>
			<img src="<?php echo $row_img["img_path"]; ?>" alt="no img to display" width="383" height="483" style="border:3px solid black"><br><br>
			</center>
			<?php
		}
		?>
		
<?php
		include "clear_content1.php";
		include "footer.php";
?>