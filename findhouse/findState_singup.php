<?php
include "connection.php";
	$country=$_GET['country'];
	$result=mysqli_query($con,"select * FROM cities WHERE city_state='$country'");		
?>
<select name="city" onchange="getCity(<?php echo $country?>,this.value)">
<option>Select City</option>
<?php while ($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['city_name']?>><?php echo $row['city_name']?></option>
<?php } ?>
</select>