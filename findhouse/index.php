
	<?php
	include "only_header_index.php";
	include "slide_header.php";
	include "left_content1_index.php";
	?>
	<head>
	<style>
			table, th, td {
			border-collapse: collapse;
			}
			th, td {
			padding: 18px;
			}
		</style>
	</head>
	<center><br><br><br><br><br>
	<table border="2" width="538px">
	<tr>
	<td align="center">
	<u><h1>Login Details</h1></u><br/>
		 
		<form action="checklogin.php" method="POST">
		<table border="1" width="438px">
			<tr>
				<td>
					Enter User Id:
				</td>
				<td>
					<input type="text" name="user_id" required="required"/>
				</td>
			</tr>
			<tr>
				<td>
					Enter password: 
				</td>
				<td>
					<input type="password" name="password2" required="required" />
				</td>
			</tr>
		</table><br>
           <input type="submit" value="Login"/>
		   <input type="reset" value="clear"/><br>
		   </form>
			new user - <a href="signup.php">Sign Up</a><br><br>
		</td>
		</tr>
		</table>
		</center>
		<?php 
		include "clear_content1.php";
	include "footer.php";
	?>

