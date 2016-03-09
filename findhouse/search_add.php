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
   $state=$_SESSION['state'];
   $city=$_SESSION['city'];
   include "connection.php";
   include "only_header.php";
   include "left_content1.php";
      $result=mysqli_query($con,"select DISTINCT city_name from cities ORDER BY city_name");

   ?>
    <head>
	<title>House Finding PHP Website</title>
		<style>
			table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			}
			th, td {
			padding: 23px;
			}
		</style>

		<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script language="javascript" type="text/javascript">

$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});


</script>
		
	<style type="text/css">

	#result
	{
		position:absolute;
		width:300px;
		padding:8px;
		display:none;
		margin-top:0px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.show
	{
		padding:8px; 
		border-bottom:1px #999 dashed;
		font-size:13px; 
		height:30px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
	</style>
	</head>
		
	<body>
		<form action="search_add_result.php" method="post">
		<center><br><br>
		<table>
			<tr>
				<td>
					searching location:
				</td>
				<td>City: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Locality(Area):<br>
					<select name="city">
						<option value=<?php echo $city ?> > <?php echo $city ?> </option>
						<?php while ($row=mysqli_fetch_array($result)) { ?>
						<option value=<?php echo $row['city_name']?>><?php echo $row['city_name']?></option>
						<?php } ?>
					</select>
					
					&emsp;&emsp;
					<input type="text" name="locality" class="search" id="searchid" placeholder="locality" />
					<div id="result">
				</td>
			</tr>
			<tr>
				<td>
					Category:
				</td>
				<td>
					<input type="checkbox" name="lease" value="lease"/>Lease
					<input type="checkbox" name="rent" value="rent" checked/>Rent
				</td>
			</tr>
			<tr>
				<td>
					Furnished:
				</td>
				<td>
					<input type="radio" name="fur" value="no" checked/>No
					<input type="radio" name="fur" value="yes"/>Yes
				</td>
			</tr>
			<tr>
				<td>
					Type of House:
				</td>
				<td>
					<input type="checkbox" name="individual" value="individual" checked/>Individual
					<input type="checkbox" name="apartment" value="apartment"/>Apartment
					<input type="checkbox" name="villa" value="villa"/>Villa
				</td>
			</tr>
			<tr>
				<td>
					No of Rooms:
				</td>
				<td>
					<input type="checkbox" name="room1" value="1" checked/>1
					<input type="checkbox" name="room2" value="2"/>2
					<input type="checkbox" name="room3" value="3"/>3
					<input type="checkbox" name="room4" value="4"/>4
					<input type="checkbox" name="room5" value="5+"/>5+
				</td>
			</tr>
			<tr>
				<td>
					price range:
				</td>
				<td>
					<input type="number" name="price_min" placeholder="min" required/>&nbsp;-
					<input type="number" name="price_max" placeholder="max" required/><br>
					</td>
		</table><br>
		<input type="submit" value="Search">&emsp;
		<input type="reset" value="reset">
		</center>
		</form>
   </body>
 
 <?php
		include "clear_content1.php";
		include "footer.php";
?>