<?php
	include("../db.php");
	$total_price=0;
	$product_ids=unserialize($_COOKIE['product_ids']);
	$product_quantitys=unserialize($_COOKIE['product_quantitys']);
	foreach($product_ids as $product_id)
		{
			$query=mysqli_query($con,"select * from products where id='$product_id'");
			$res=mysqli_fetch_array($query);
			$final_price=$res['price'];
			$price=$res['price'];
			if($res['discount']>0)
				{
					$discount_percent=$res['discount'];   //Percent Discount
					$discount_amount=$price*$discount_percent/100;
					$final_price=$price-$discount_amount;
				}
			$sub_price=$product_quantitys[$product_id]*$final_price;		
			$total_price+=$sub_price;
		}
	echo "<p><span class='span1'><i class='fa fa-shopping-cart' aria-hidden='true'></i> ".count(unserialize($_COOKIE['product_ids']))." Items | ₹ ".number_format($total_price,2)."</span><a href='cart.php' style='color:white;'><span class='span2'>View Cart <i class='fa fa-caret-right' aria-hidden='true'></i></span></a></p>";
	echo "@@@@@";
	echo count(unserialize($_COOKIE['product_ids']));
?>	  