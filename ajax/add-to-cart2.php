<?php
	$product_id=$_GET['product_id'];
	$quantity=$_GET['quantity'];
	$product_ids=unserialize($_COOKIE['product_ids']);
	$product_quantitys=unserialize($_COOKIE['product_quantitys']);
	$product_quantitys[$product_id]=$quantity;
	
	setcookie("product_ids", serialize($product_ids), time() + (86400 * 30), "/");
	setcookie("product_quantitys", serialize($product_quantitys), time() + (86400 * 30), "/");
	$error="";
	$response['status']="Success";
	$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Product Added successfully.</span>";
	$response['error']=$error;
	
	echo json_encode($response);
?>