</div>

		
	  <div class="main">  
	   <div class="wrap">  		 
	       <div class="sidebar">
		   <div class="sidebar_left_top">
		   <div class="services">
		<h3>hello, <?php echo $u_name; ?></h3> 
		<?php
		$query_img=mysqli_query($con,"select img_path from pro_image where u_id='$u_id'");
		$exists=mysqli_num_rows($query_img);
		//echo $exists;
		while($row_img=mysqli_fetch_array($query_img))
		{
		?>	
			<center><a href="edit_profile_pic.php">
			<img src="<?php echo $row_img["img_path"]; ?>" alt="no img to display" width="148" height="183" style="border:3px solid black">
			</a>
			</center>
		<?php
		}
		if($exists!=1)
		{
		//	echo "<script>alert('Plz upload ur PROFILE Pic')</script>";
			
		?>
		<center>
		<img src="images/profile_empty.jpg" width="148" height="183" style="border:5px solid black"><br/>
		</center>
		<form action="pro_image.php" method="post" enctype="multipart/form-data"><br>
			&emsp;&emsp;Upload your Profile Pic !!
			<input type="file" name="file_up_pro">
			<input type="submit" value="Upload Image">
		</form>
		
		<?php
		}
		?>
		
	          
	      	     
	      			<h3>Services</h3>
					
				      	<div class="services_list">
				      		<ul>
						  		<li><a href="view_profile.php">My Account</a></li>
						  		<li><a href="edit_profile.php">Edit Profile</a></li>
						  		<li><a href="my_post.php">My AD's</a></li>
						  		<li><a href="add_post.php">Post Free AD</a></li>
						  		<li><a href="search_add.php">Search House</a></li>
								<li><a href="#">Contact Us</a></li>
				    		</ul>
				      </div>
	   			</div>
	 		</div>
	    		 <div class="sidebar_left_bottom">
			    	<div class="projects">
			    		<h3>Advertisements</h3>
			    		<div class="project_img">
				    	   <img src="images/project1.jpg">
				    	   <img src="images/project2.jpg">
				    	    <div class="view-all"><a href="#">See All</a></div>
			    	   </div>
			    	</div>
	    		</div>
	  		</div> 
			
			<div class="content1">
			