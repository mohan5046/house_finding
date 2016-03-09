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
			$state=$row['state_name'];
			$city=$row['city_name'];
		}
	?>
	
	<h2 align="right"><a href="edit_profile.php">Edit Profile</a></h2>
  <center>
	<h2><u>Account Details</u></h2>
	<table border="2" width="683px">
	<tr>
	<td align="center">
	
	<u><h3>User Details</h3></u><br>
   <table border="1" width="538px">
		<tr>
			<td>
				First Name:
			</td>
			<td>
				<?php echo $fname; ?>
			</td>
		</tr>
		<tr>
			<td>
				Last Name:
			</td>
			<td>
				<?php echo $lname; ?>
			</td>
		</tr>
		<tr>
			<td>
				Gender:
			</td>
			<td>
				<?php echo $gender; ?>
			</td>
		</tr>
		<tr>
			<td>
				D.O.B:
			</td>
			<td>
				<?php echo $dob; ?>
			</td>
		</tr>
		<tr>
			<td>
				Contact No:
			</td>
			<td>
				<?php echo $ph; ?>
			</td>
		</tr>
		<tr>
			<td>
				Email Id:
			</td>
			<td>
				<?php echo $email; ?>
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
				State:
			</td>
			<td>
				<?php echo $state; ?>
			</td>
		</tr>
	</table><br>
	
	<u><h3>Login Details</h3></u><br>
	<table border="1" width="538px">
		<tr>
			<td>
				User Id:
			</td>
			<td>
				<?php echo $user_id; ?>
			</td>
		</tr>
		<tr>
			<td>
				Password:
			</td>
			<td>
				<?php echo $password; ?>
			</td>
		</tr>
	</table><br><br>
	
	</td>
	</tr>
	</table>
	</center>
	</body>
<?php
		include "clear_content1.php";
		include "footer.php";
?>