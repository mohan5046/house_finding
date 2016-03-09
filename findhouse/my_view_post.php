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
	$p_id=$_GET['p_id'];	
	
	if(!empty($_GET['p_id']))
		{
			$result=mysqli_query($con,"select * from storeadd where str_id='$p_id'");
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				 while($row=mysqli_fetch_array($result))
				{
					$title=$row['add_title'];
					$cat=$row['cat'];
					$fur=$row['fur'];
					$typ=$row['typ'];
					$rooms=$row['rooms'];
					$price=$row['price'];
					$state=$row['state'];
					$city=$row['city'];
					$locality=$row['locality'];
					$address=$row['address'];
					$description=$row['description'];
					$image1=$row['image1'];
					$image2=$row['image2'];
					$image3=$row['image3'];
					$image4=$row['image4'];
					$image5=$row['image5'];
					$you_id=$row['u_id'];
				}
				?>
				
			<head>
			<style>
					#nav img {
					opacity: 0.68;
					filter: alpha(opacity=40); /* For IE8 and earlier */
					}

					#nav img:hover {
					opacity: 1.0;
					filter: alpha(opacity=100); /* For IE8 and earlier */
					height:363px;
					width: 543px;
					} 
					
					table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
					}
					th, td {
					padding: 8px;
					}
				</style>
			</head>
			<body><br>
				<h3>Want to EDIT this post ?? <a href="edit_post.php?p_id=<?php echo $p_id; ?>">EDIT POST</a></h3><br>
				<h3>Want to DELETE this post ?? <a href="#" onclick="myFunction('<?php echo $p_id; ?>')">DELETE POST</a></h3><br>
				<script>
					function myFunction(p_id)
					{
						var r = confirm("Are you sure you want to delete this record?");
						if(r == true)
						{
							window.location.assign("my_delete_post.php?p_id=" + p_id);
						}
					}
				</script>
				
				<center>
				<h3><u>HOUSE IMAGES</u></h3><br>
				<table border="1" width="900px" height="300px">
					<tr>
						<td width="400px" align="center">
							<div id="nav">
							<?php echo "<a href='image1.php?p_id=".$p_id."'>"; ?><img src="<?php echo $image1; ?>" alt='no img to display' width='393px' height='283px' /></a>
							</div>
						</td>
						<td width="400px" align="center">
							<div id="nav">
							<?php echo "<a href='image2.php?p_id=".$p_id."'>"; ?><img src="<?php echo $image2; ?>" alt='no img to display' width='393px' height='283px'/>
							</div>
						</td>
					</tr>
					<tr>
						<td width="400px" align="center">
							<div id="nav">
							<?php echo "<a href='image3.php?p_id=".$p_id."'>"; ?><img src="<?php echo $image3; ?>" alt='no img to display' width='393px' height='283px'/>
							</div>
						</td>
						<td width="400px" align="center">
							<div id="nav">
							<?php echo "<a href='image4.php?p_id=".$p_id."'>"; ?><img src="<?php echo $image4; ?>" alt='no img to display' width='393px' height='283px'/>
							</div>
						</td>
					</tr>
				</table><br><br>
				<h3><u>HOUSE DETAILS</u></h3><br>
				<table border="1">
					<tr>
						<td>
							Title:
						</td>
						<td>
							<?php echo $title; ?>
						</td>
					</tr>
					<tr>
						<td>
							Category:
						</td>
						<td>
							<?php echo $cat; ?>
						</td>
					</tr>
					<tr>
						<td>
							Furnished:
						</td>
						<td>
							<?php echo $fur; ?>
						</td>
					</tr>
					<tr>
						<td>
							Type of House:
						</td>
						<td>
							<?php echo $typ; ?>
						</td>
					</tr>
					<tr>
						<td>
							No of Rooms:
						</td>
						<td>
							<?php echo $rooms; ?>
						</td>
					</tr>
					<tr>
						<td>
							Price:
						</td>
						<td>
							<?php echo $price; ?> .Rs
						</td>
					</tr>
					<tr>
						<td>
							State:
						</td>
						<td>
							<?php echo $state; ?>
						</td>
					</tr>
					<tr>
						<td>
							City:
						</td>
						<td>
							<?php echo $city; ?>
						</td>
					</tr>
					<tr>
						<td>
							Locality:
						</td>
						<td>
							<?php echo $locality; ?>
						</td>
					</tr>
					<tr>
						<td>
							Address:
						</td>
						<td>
							<?php echo $address; ?>
						</td>
					</tr>
					<tr>
						<td>
							Description:
						</td>
						<td>
							<?php echo $description; ?>
						</td>
					</tr>
				</table><br><br>
				
			</center>
			</body>
				<?php
				
			}
			else
			{
				header("location:home.php");
			}
			
		}
?>
<?php
		include "clear_content1.php";
		include "footer.php";
?>
