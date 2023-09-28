<?php
	include("../../../db.php");
	$city=$_GET['city'];
	echo "<option value=''>Select Area</option>";
	$query=mysqli_query($con,"select * from pharmacy_area where district='$city'");
	while($res=mysqli_fetch_array($query))
		{
			$id=$res['id'];
			$area=$res['area'];
			echo "<option value='$id'>$area</option>";
		}
?>