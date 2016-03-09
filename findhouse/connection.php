<?php

	$con=mysqli_connect('localhost','root','','find_house');
	if(!$con)
	{
		die('could not connect'.mysql_error());
	}
?>