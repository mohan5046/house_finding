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
   
   <head>
		<style>
			table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			}
			th, td {
			padding: 23px;
			}
		</style>
	</head>
	<body>
   
   <?php
		$result=mysqli_query($con,"select * from user where u_id='$u_id'");
		while($row=mysqli_fetch_array($result))
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$gender=$row['gender'];
			$dob=$row['dob'];
			$ph=$row['ph'];
			$email=$row['email'];
			$user_id=$row['user_id'];
			$password=$row['password'];
		}
	?>
	
	<center>
	<h2 align="center"><u>Edit Profile Details</u></h2>
	<form action="update_edit_profile.php" method="post">
	<table border="2" width="683px">
	<tr>
	<td align="center">
	<u><h3>Login Details</h3></u><br>
	<table border="1" width="500px">
		<tr>
			<td>
				User Id:
			</td>
			<td>
				<input type="text" name="user_id" value="<?php echo $user_id; ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<input type="text" name="password" value="<?php echo $password; ?>" >
			</td>
		</tr>
	</table><br><br><br>
	
	
	<u><h3>User Details</h3></u>
   <table border="1" width="500px"><br>
		<tr>
			<td>
				First Name:
			</td>
			<td>
				<input type="text" name="fname" value="<?php echo $fname; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				Last Name:
			</td>
			<td>
				<input type="text" name="lname" value="<?php echo $lname; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				Contact No:
			</td>
			<td>
				<input type="tel" name="ph" value="<?php echo $ph; ?>" >
			</td>
		</tr>
		<tr>
			<td>
				Email Id:
			</td>
			<td>
				<input type="email" name="email" value="<?php echo $email; ?>" >
			</td>
		</tr>
	</table><br>
	</tr>
	</td>
	</table><br>
	<input type="submit" value="UPDATE">
	</form>
	</center>
	</body>

<?php
	include "clear_content1.php";
	include "footer.php";
?>