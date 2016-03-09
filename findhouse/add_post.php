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
   $result=mysqli_query($con,"select DISTINCT city_state from cities");
   include "only_header.php";
   include "left_content1.php";
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
var strURL="findState.php?country="+countryId;
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
   <form action="store_post.php" method="post" enctype="multipart/form-data">
	<center>
		<table>
			<tr>
				<td>
					Add Title:
				</td>
				<td>
					<input type="text" name="title" placeholder="Title" size="60" required/><br/>
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
					Type of House:
				</td>
				<td>
					<input type="radio" name="typ" checked="checked" value="individual"/>Individual
					<input type="radio" name="typ" value="apartment"/>Apartment
					<input type="radio" name="typ" value="villa"/>Villa
				</td>
			</tr>
			<tr>
				<td>
					No of Rooms:
				</td>
				<td>
					<input type="radio" name="rooms" checked="checked" value="1"/>1
					<input type="radio" name="rooms" value="2"/>2
					<input type="radio" name="rooms" value="3"/>3
					<input type="radio" name="rooms" value="4"/>4
					<input type="radio" name="rooms" value="5+"/>5+
				</td>
			</tr>
			<tr>
				<td>
					price:
				</td>
				<td>
					<input type="number" name="price" placeholder="price" required/>
				</td>
			</tr>
			<tr>
				<td>
					Images:
				</td>
				<td>
					1.<input type="file" name="file_up1" required/>
					2.<input type="file" name="file_up2" required/><br>
					3.<input type="file" name="file_up3" required/>
					4.<input type="file" name="file_up4" required/><br>
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
			<tr>
				<td>
					Locality:
				</td>
				<td>
				    <input type="text" name="locality" class="search" id="searchid" placeholder="locality" />
					<div id="result">
					
				</td>
			</tr>
			<tr>
				<td>
					Address:
				</td>
				<td>
					<textarea name="address" maxlength="500" placeholder="enter text here..." rows="8" cols="53" required></textarea>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td>
					<textarea name="description" maxlength="500" placeholder="enter text here..." rows="8" cols="53" required></textarea>
				</td>
			</tr>
			
			
		</table></br>
		
		<input type="submit" value="submit">  
		<input type="reset" value="reset">
	</center>
</form>
</body>
<?php
	include "clear_content1.php";
	include "footer.php";
?>