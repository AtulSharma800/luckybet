<?php
	include("../../db.php");
	ob_start();
	$error="";
	$user_id=$_COOKIE['id'];
	$item_price=mysqli_real_escape_string($con,$_POST['item_price']);
	$tax=mysqli_real_escape_string($con,$_POST['tax']);
	$discount=mysqli_real_escape_string($con,$_POST['discount']);
	$coupon_discount=mysqli_real_escape_string($con,$_POST['coupon_discount']);
	$delivery_fee=mysqli_real_escape_string($con,$_POST['delivery_fee']);
	$grand_total=mysqli_real_escape_string($con,$_POST['grand_total']);
	$delivery_type=mysqli_real_escape_string($con,$_POST['delivery_type']);
	$shipping_address_id=mysqli_real_escape_string($con,$_POST['shipping_address']);
	$payment_method=mysqli_real_escape_string($con,$_POST['payment_method']);
	$additional_note=mysqli_real_escape_string($con,$_POST['additional_note']);
	$coupon_code="";
	$payment_status="Unpaid";
	$order_status="Pending";
	$transaction_id="";
	$date=date("Y-m-d");
	$delivery_date=date("Y-m-d");
	$query2=mysqli_query($con,"select * from shipping_address where id='$shipping_address_id'");
	$res2=mysqli_fetch_assoc($query2);
	$shipping_address = json_encode($res2);
	
	
	$query=mysqli_query($con,"insert into orders(user_id,item_price,tax,discount,coupon_code,coupon_discount,delivery_fee,grand_total,delivery_type,shipping_address,payment_method,payment_status,additional_note,order_status,transaction_id,date,delivery_date) values('$user_id','$item_price','$tax','$discount','$coupon_code','$coupon_discount','$delivery_fee','$grand_total','$delivery_type','$shipping_address','$payment_method','$payment_status','$additional_note','$order_status','$transaction_id','$date','$delivery_date')");
	$res=mysqli_affected_rows($con);
	if($res>0)
		{
			$last_id=mysqli_insert_id($con);
			mysqli_query($con,"insert into order_history(order_id,date,status,remark) values('$last_id','$date','Pending','Order Placed')");
			$i=0;
			$total_price=0;
			$product_ids=unserialize($_COOKIE['product_ids']);
			$product_quantitys=unserialize($_COOKIE['product_quantitys']);
			foreach($product_ids as $product_id)
				{
					$query2=mysqli_query($con,"select id,name,image,price,tax,discount,unit from products where id='$product_id'");
					$res2=mysqli_fetch_assoc($query2);
					$final_price=$res2['price'];
					$price=$res2['price'];
					if($res2['discount']>0)
						{
							$discount_percent=$res2['discount'];   //Percent Discount
							$discount_amount=$price*$discount_percent/100;
							$final_price=$price-$discount_amount;
						}
					$quantity=$product_quantitys[$product_id];
					$variation='[{"type":null}]';
					$delivery_date=date("Y-m-d");
					$product_detail = json_encode($res2);
					$unit=$res2['unit'];
					mysqli_query($con,"insert into order_details(product_id,order_id,price,product_details,variation,discount_on_product,discount_type,quantity,tax_amount,variant,unit,is_stock_decreased,delivery_date) values('$product_id','$last_id','$final_price','$product_detail','$variation','0.00','discount_on_product','$quantity','0.00','null','$unit','1','$delivery_date')");	
				}			
			setcookie("product_ids", "", time() - 3600, "/");
			setcookie("product_quantitys", "", time() - 3600, "/");
			
			$response['order_id']=$last_id;
			$response['status']="Success";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-check-circle' aria-hidden='true'></i>&nbsp;&nbsp;Order placed successfully.</span>";
			$response['error']=$error;
		}
	else
		{	
			$response['order_id']="";
			$response['status']="Fail";
			$response['message']="<span style='font-size:15px;'><i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Some problem occured try again.</span>";
			$response['error']=$error;
		}
	echo json_encode($response);	
?>