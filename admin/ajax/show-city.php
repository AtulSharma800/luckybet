<?php
	include("../../db.php");
	$state_id=$_POST['state'];
	$query=mysqli_query($con,"select * from geo_locations where location_type='DISTRICT' and parent_id='$state_id' order by name");
	while($res=mysqli_fetch_array($query))
		{
			$id=$res['id'];
			$name=$res['name'];
			echo "<option value='$id'>$name</option>";
		}
?>
