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
					$image3=$row['image3'];
				}
				
?>
			<head>
			<style>
			table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			}
			th, td {
			padding: 8px;
			}
			</style>
			</head>
			<body>
			Image3:
			<center><br>
				<table border="3">
					<tr>
						<td align="center">
							<img src="<?php echo $image3; ?>" alt='no img to display' width='883px' height='583px'/></a>
						</td>
					</tr>
				</table>
			</center>
			
<?php
				
			}
			else
			{
				header("location:home.php");
			}
			
		}
?>
</body>
<?php
		include "clear_content1.php";
		include "footer.php";
?>