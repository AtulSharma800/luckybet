<?php
	$product_id=$_GET['product_id'];
	$product_ids=unserialize($_COOKIE['product_ids']);
	$product_quantitys=unserialize($_COOKIE['product_quantitys']);
	$a=array_values(array_diff($product_ids, array($product_id)));
	unset($product_quantitys[$product_id]);
	setcookie("product_ids", serialize($a), time() + (86400 * 30), "/");
	setcookie("product_quantitys", serialize($product_quantitys), time() + (86400 * 30), "/");
?>