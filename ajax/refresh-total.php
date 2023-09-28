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
	$tax=0;
	$discount=0;
	$coupon_discount=0;
	$delivery_fee=$_GET['delivery_fee'];
	$grand_total=$total_price+$tax-$discount-$coupon_discount+$delivery_fee;
	?>
		<input type="hidden" id="item_price" value="<?=$total_price;?>">
		<input type="hidden" id="tax" value="<?=$tax;?>">
		<input type="hidden" id="discount" value="<?=$discount;?>">
		<input type="hidden" id="coupon_discount" value="<?=$coupon_discount;?>">
		<input type="hidden" id="delivery_fee" value="<?=$delivery_fee;?>">
		<input type="hidden" id="grand_total" value="<?=$grand_total;?>">
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:15px">Items Price</h5><span style='display:inline-block;font-size:15px;color:black;'>₹<?=number_format($total_price,2);?></span>
		</div>
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:15px">Vat/Tax</h5><span style='display:inline-block;font-size:15px;color:black;'>(+)₹ <?=number_format($tax,2);?></span>
		</div>
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:15px">Discount</h5><span style='display:inline-block;font-size:15px;color:black;'>(-)₹ <?=number_format($discount,2);?></span>
		</div>
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:15px">Coupon Discount</h5><span style='display:inline-block;font-size:15px;color:black;'>(-)₹ <?=number_format($coupon_discount,2);?></span>
		</div>
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:15px">Delivery Fee</h5><span style='display:inline-block;font-size:15px;color:black;'>(+)₹ <span id='delivery_fee_text'><?=number_format($delivery_fee,2);?></span></span>
		</div>
		<hr style="margin-top: 5px; margin-bottom: 5px;border: 2px dashed #ED0A0A;background-color:transparent;opacity:1;">
		<div class="d-flex align-items-center justify-content-between" style="margin-bottom:10px;">
		  <h5 class="total-price mb-0" style="font-size:18px;color:#ED0A0A;">Total Amount</h5><span style='display:inline-block;font-size:18px;color:#ED0A0A;'>₹ <span id='grand_total_text'><?=number_format($grand_total,2);?></span></span>
		</div>
	
	<?php
	echo "@@@@@";
	echo count(unserialize($_COOKIE['product_ids']));
?>	  