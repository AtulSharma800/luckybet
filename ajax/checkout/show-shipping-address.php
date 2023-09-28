<?php
	include("../../db.php");
	ob_start();
	$error="";
	$user_id=$_COOKIE['id'];
	$query2=mysqli_query($con,"select * from shipping_address where user_id='$user_id' order by id desc");
	$num2=mysqli_num_rows($query2);
	if($num2>0)
		{
			while($res2=mysqli_fetch_array($query2))
				{
?>
					<div style="border-radius:10px;box-shadow:1px 1px 1px 1px lightgray;padding:10px;margin-bottom:12px;">
						<div style='display:inline-block;width:25px;vertical-align:top;'>
							<input type='radio' name="shipping_address" id="shipping_address" value="<?=$res2['id'];?>" style="transform:scale(1.1);">
						</div>
						<div style='display:inline-block;width:calc(100% - 35px)'>
							<p style="margin-bottom:0px;font-weight:bold"><?=$res2['address_type'];?></p>
							<p style="margin-bottom:0px;"><?=$res2['address'];?></p>
						</div>	
					</div>
<?php
				}
		}
?>