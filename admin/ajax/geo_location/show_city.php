<?php
	include("../../../db.php");
	$state=$_GET['state'];
	echo "<option value=''>Select City</option>";
	$query=mysqli_query($con,"select * from geo_locations where parent_id='$state'");
	while($res=mysqli_fetch_array($query))
		{
			$id=$res['id'];
			$name=$res['name'];
			echo "<option value='$id'>$name</option>";
		}
?>