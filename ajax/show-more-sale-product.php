<?php
	include("../db.php");
	include("../function.php");
	include("../common-details.php");
	include("../check-login.php");
	$count = $_GET['count'];
	$div="";
	$error="";
	$query=mysqli_query($con,"select * from products where status='1' and discount!='' limit $count,20");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			while($res=mysqli_fetch_array($query))
				{
					$product_id=$res['id'];
					$name=$res['name'];
					$image="admin/upload/product/".$res['image'];
					$price=$res['price'];
					$price_text="<p class='sale-price'>₹".number_format($price)."</p>";
					if($res['discount']>0)
						{
							$discount_percent=$res['discount'];   //Percent Discount
							$discount_amount=$price*$discount_percent/100;
							$final_price=$price-$discount_amount;
							$price_text="<p class='sale-price'>₹".number_format($price)."<span class='real-price'>₹".number_format($final_price)."</span></p>";
						}

					$div.="<div class='col-6 col-md-4 col-lg-3'><div class='card product-card'><div class='card-body count'>";
					if(!empty(!empty($res['discount'])))
						{
							$discount=$res['discount'];
							$div.="<span class='badge rounded-pill badge-warning'>$discount%</span>";
						}
					$div.="<a class='wishlist-btn' href='#'><i class='lni lni-heart'></i></a><a class='product-thumbnail d-block' href='product-detail.php?product_id=$product_id'><img class='mb-2' src='$image' alt=''></a><a class='product-title d-block' href='product-detail.php?product_id=$product_id'>$name</a>$price_text<div class='product-rating'><i class='lni lni-star-filled'></i><i class='lni lni-star-filled'></i><i class='lni lni-star-filled'></i><i class='lni lni-star-filled'></i><i class='lni lni-star-filled'></i></div><a class='btn btn-success btn-sm' href='#'><i class='lni lni-plus'></i></a></div></div></div>";
				}
			$response['status']="Success";
			$response['message']=$div;
			$response['error']=$error;		
		}
	else
		{
			$response['status']="Error";
			$response['message']="";
			$response['error']=$error;
		}
	
	echo json_encode($response);
?>
