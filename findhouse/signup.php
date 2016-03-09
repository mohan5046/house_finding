<?php
	include "connection.php";
   $result=mysqli_query($con,"select DISTINCT city_state from cities");
   
   include "only_header_index.php";
   include "left_content1_index.php";
   ?>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script language="javascript" type="text/javascript">
		

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }

function getState(countryId) { 
var strURL="findState_singup.php?country="+countryId;
var req = getXMLHTTP();
if (req) {
req.onreadystatechange = function() {
if (req.readyState == 4) {
// only if "OK"
if (req.status == 200) {
document.getElementById('statediv').innerHTML=req.responseText;
document.getElementById('citydiv').innerHTML='<select name="city">'+
      '<option>Select City</option>'+'</select>';
} else {
alert("Problem while using XMLHTTP:\n" + req.statusText);
}
}
}
req.open("GET", strURL, true);
req.send(null);
}
}

</script>


	<style>
			table, th, td {
			border-collapse: collapse;
			}
			th, td {
			padding: 23px;
			}
		</style>


	</head>

	<body><center>
		<u><h1>Registration</h1></u>
		<table border="2">
			<tr>
				<td  align="center"  width="638px">
					<h2><u>User Details</h2></u>
					<form action="signup.php" method="post">
					<table border="1" width="538px">
						<tr>
							<td>
								First Name:
							</td>
							<td>
								<input type="text" name="fname" placeholder="First Name" required/>
							</td>
						</tr>
						<tr>
							<td>
								Last Name:
							</td>
							<td>
								<input type="text" name="lname" placeholder="Last Name" required/>
							</td>
						</tr>
						<tr>
							<td>
								Gender:
							</td>
							<td>
								<input type="radio" name="r1" checked="checked" value="Male"/>Male    <input type="radio" name="r1" value="Female"/>Female
							</td>
						</tr>
						<tr>
							<td>
								Date Of Birth:
							</td>
							<td>
								<input type="date" name="dob"  placeholder="(YYYY-MM-DD)" min="1950-01-01" max="1999-12-31"required>
							</td>
						</tr>
						<tr>
							<td>
								Contact No:
							</td>
							<td>
								<input type="tel" name="ph" placeholder="Contact No" required/>
							</td>
						</tr>
						<tr>
							<td>
								Email Id:
							</td>
							<td>
								<input type="email" name="email" placeholder="Email Id" required/>
							</td>
						</tr>
						<tr>
							<td>
								State:
							</td>
							<td>
								<select name="state" onChange="getState(this.value)">
								<option value="">Select State</option>
								<?php while ($row=mysqli_fetch_array($result)) { ?>
								<option value=<?php echo $row['city_state']?>><?php echo $row['city_state']?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								city:
							</td>
							<td>
								<div id="statediv">
								<select name="city" >
								<option>Select City</option>
								</select>
								</div>
							</td>
						</tr>
					</table><br>
					<h2><u>Login Details</u></h2>
					<table border="1" width="538px">
						<tr>
							<td>
								User Id:
							</td>
							<td>
								<input type="text" name="user_id" placeholder="User Id" required/>
							</td>
						</tr>
						<tr>
							<td>
								Password:
							</td>
							<td>
								<input type="password" name="password1" placeholder="password" pattern=".{6,}" title="Password should contain Six or more characters" required/>
							</td>
						</tr>
						<tr>
							<td>				
								Confirm Password:
							</td>
							<td>
								<input type="password" name="password2" pattern=".{6,}" title="Password should contain Six or more characters" placeholder="password" required/>
							</td>
						</tr>
					</table><br>
					<input type="checkbox" name="agree" val="yes" required/> I accept the <u>Terms and Conditions</u><br/><br/>
					<input type="submit" value="register"/>
					<input type="reset" value="clear"/>
					</form>
				</td>
			</tr>
		</table>
		</center>
		<?php
		include "clear_content1.php";
		include "footer.php";
		?>
	</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['r1'];
		$dob=$_POST['dob'];
		$ph=$_POST['ph'];
		$email=$_POST['email'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$user_id=$_POST['user_id'];
		$password2=$_POST['password2'];
		$password1=$_POST['password1'];
		if($password1==$password2)
		{
		$bool=true;
		include "connection.php";
		$result=mysqli_query($con,"select * from user");
		while($row=mysqli_fetch_array($result))
		{
			$tablename=$row['user_id'];
			if($user_id==$tablename)
			{
				$bool=false;
				print '<script>alert("this user id is already registerd... plz reg with another id");</script>';
				}
		}
		if($bool)
		{
			$resultset=mysqli_query($con,"INSERT INTO user(fname,lname,gender,dob,ph,email,state_name,city_name,user_id,password) VALUES('$fname','$lname','$gender','$dob','$ph','$email','$state','$city','$user_id','$password2')");
			print '<script>alert("successfully registerd");</script>';
			echo "<script>window.location.assign('index.php')</script>";
		}
		}
		else
		{
			print '<script>alert("password mismatch");</script>';
			echo "<script>window.location.assign('signup.php')</script>";
		}
	}
?>