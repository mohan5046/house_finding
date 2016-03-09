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

   ?>
   
   <?php
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
					$price=$row['price'];
					$address=$row['address'];
					$description=$row['description'];
				}
			}
			else
			{
				header("location:home.php");
			}
		}
	?>
	<head>
	<title>House Finding PHP Website</title>
		<style>
			table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			}
			th, td {
			padding: 13px;
			}
		</style>
	</head>
	<body>
	<center>
	<form action="update_edit_post.php" method="post">
	<h3>Edit Post</h3>
   <table border="1">
		<tr>
			<td>
				Title:
			</td>
			<td>
				<input type="text" name="title" size="60" value="<?php echo $title; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				Category:
			</td>
			<td>
				<input type="radio" name="cat" checked="checked" value="rent"/>Rent
				<input type="radio" name="cat" value="lease"/>Lease
			</td>
		</tr>
		<tr>
			<td>
				Furnished:
			</td>
			<td>
				<input type="radio" name="fur" checked="checked" value="no"/>No
				<input type="radio" name="fur" value="yes"/>Yes
			</td>
		</tr>
		<tr>
			<td>
				Price:
			</td>
			<td>
				<input type="number" name="price" value="<?php echo $price; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				Address:
			</td>
			<td>
				<textarea name="address" maxlength="500" rows="8" cols="63" required><?php echo $address; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Description:
			</td>
			<td>
				<textarea name="description" maxlength="500" rows="8" cols="63" required><?php echo $description; ?></textarea>
			</td>
		</tr>
	</table><br>
	<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
	<input type="submit" value="submit">
	</form>
	</center>
	</body>
	
<?php
	include "clear_content1.php";
	include "footer.php";
?>