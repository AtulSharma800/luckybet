<?php
	$product_id=$_GET['product_id'];
	$quantity=$_GET['quantity'];
	if(!empty($_COOKIE['product_ids']))
		{
			$product_ids=unserialize($_COOKIE['product_ids']);
			$product_quantitys=unserialize($_COOKIE['product_quantitys']);
			if(in_array($product_id, $product_ids))
				{
					$product_quantitys[$product_id]+=$quantity;
				}
			else
				{
					array_push($product_ids,$product_id);
					$product_quantitys[$product_id]=$quantity;
				}				
		}
	else
		{
			$product_ids=array();
			$product_quantitys=array();
			array_push($product_ids,$product_id);
			$product_quantitys[$product_id]=$quantity;
		}		
	setcookie("product_ids", serialize($product_ids), time() + (86400 * 30), "/");
	setcookie("product_quantitys", serialize($product_quantitys), time() + (86400 * 30), "/");
?>