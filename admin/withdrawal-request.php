<?php
	include("../db.php");
	include("common/check_login.php");
	include("../common-details.php");
	$delete_status=2;
	if(isset($_GET['id']))
		{
			$query=mysqli_query($con,"delete from add_withdrawal where id='".$_GET['id']."'");
			$res=mysqli_affected_rows($con);
			if($res)
				{
					$delete_status="1";					
				}
			else
				{
					$delete_status="0";
				}
		}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:06:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Withdrawal Request :: <?=$co_name;?></title>

	<!-- Global stylesheets -->
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/datatables_basic.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- /theme JS files -->
	<link rel="shortcut icon" href="<?=@$co_favicon;?>"/>
	<style>
		.Rejected
			{
				background:#FCE4E4;
			}
		.Approved
			{
				background:#C6E2AD;
			}
		.Pending
			{
				background:orange;
			}	
		.detail-box
			{
				position:fixed;
				left:0px;
				top:0px;
				height:100%;
				width:100%;
				background:rgba(0,0,0,0.5);
				display:none;
				justify-content:center;
				align-items:center;
			}
		.detail-box .col-md-4
			{
				background:white;
				border-radius:10px;
				padding:30px 50px;
				position:relative;
			}	
		.close-btn
			{
				position:absolute;
				right:20px;
				top:10px;
				color:tomato;
				font-size:18px;				
			}		
	</style>
</head>

<body>

	<!-- Main navbar -->
	<?php
		include("common/header.php");
	?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php
			include("common/sidebar.php");
		?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Withdrawal Request</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Withdrawal Request</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Marketing campaigns -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<h6 class="card-title">Withdrawal Request</h6>
							</div>


							<div class="table-responsive">
								<table class="table datatable-save-state">
									<thead>
										<tr>
											<th style="width:5%">S.No.</th>
											<th style="width:15%">Name</th>
											<th style="width:10%">Mobile</th>
											<th style="width:10%">Method</th>
											<th style="width:10%">Detail</th>
											<th style="width:10%">Amount</th>
											<th style="width:10%">Status</th>
											<th style="width:11%">Added On</th>
											<th style="width:11%">Updated On</th>
											<th class="text-center" style="width:8%">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i=0;
											$query=mysqli_query($con,"select * from add_withdrawal order by created_at");
											while($res=mysqli_fetch_array($query))
												{
													$detail="";
													$i++;
													$id=$res['id'];
													$user_id=$res['user_id'];
													$query2=mysqli_query($con,"select * from users where id='$user_id'");
													$res2=mysqli_fetch_array($query2);
													$name=@$res2['name'];
													$mobile=@$res2['mobile'];
													$a=date_create_from_format("Y-m-d H:i:s",$res['created_at']);
													$created_at=date_format($a,"d-m-Y h:i:s a");
													$b=date_create_from_format("Y-m-d H:i:s",$res['modified_at']);
													$modified_at=date_format($a,"d-m-Y h:i:s a");
													$status=$res['status'];
													if($res['withdrawal_method']=='bank')
														{
															$detail.=$res['bank_name']."</br>";
															$detail.=$res['ifsc_code']."</br>";
															$detail.=$res['account_no']."</br>";
															$detail.=$res['account_name']."</br>";
														}
													else
														{
															$detail=$res['upi_id'];
														}														
										?>
													<tr>
														<td><?=$i;?></td>
														<td><?=$name;?></td>
														<td><?=$mobile;?></td>
														<td><?=$res['withdrawal_method'];?></td>
														<td><?=$detail;?></td>
														<td>₹<?=number_format($res['amount'],0);?></td>
														<td><span class='<?=$status;?> btn' id="status<?=$id;?>"><?=$status;?></span></td>
														<td><?=$created_at;?></td>
														<td><?=$modified_at;?></td>
														<td class="text-center">
															<div class="list-icons">
																<div class="dropdown">
																	<a href="#" class="list-icons-item" data-toggle="dropdown">
																		<i class="icon-menu9"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a style="cursor:pointer;" href="edit-withdrawal.php?id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-eye"></i> Edit</a>
																		<a href="withdrawal-request.php?id=<?=$res['id'];?>" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
																	</div>
																</div>
															</div>
														</td>
													</tr>
										<?php
												}
										?>										
							
									</tbody>
								</table>
							</div>
						</div>
						<!-- /marketing campaigns -->


						<!-- Quick stats boxes -->
						
						<!-- /latest posts -->

					</div>

				</div>
				<!-- /dashboard content -->
			</div>
			<!-- /content area -->


			<!-- Footer -->
			<?php
				include("common/footer.php");
			?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<div class="detail-box">
		<div class="col-md-4">
			<span class="close-btn" onclick="close_detail_box()"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
			<form method="post" id="update-form">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" id="name" class="form-control" readonly>
					<input type="hidden" name="fund_id" id="fund_id" class="form-control">
					<input type="hidden" name="user_id" id="user_id" class="form-control">
				</div>
				<div class="form-group" id="txn_id_box">
					<label>Transaction Id</label>
					<input type="text" name="txn_id" id="txn_id" class="form-control" readonly>
				</div>
				<div class="form-group" id="screen_shot_box">
					<label>Screen Shot</label>
					<center><a href="" target="__blank"><img src="" style="max-height:100px;"></a></center>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select name="status" id="status" class="form-control">
						<option value="Pending">Pending</option>
						<option value="Rejected">Rejected</option>
						<option value="Approved">Approved</option>
					</select>
				</div>
				<div class="form-group">
					<label>Remark</label>
					<textarea name="remark" id="remark" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="button" id="submit-button" class="btn btn-info" onclick="update_fund()">UPDATE</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /page content -->
	<link rel="stylesheet" href="plugins/toast/toast.style.min.css">
	<script src="plugins/toast/toast.script.js"></script>
	<script>
		function view_detail(id,user_id)
			{
				$("#txn_id_box").css("display","none");
				$("#screen_shot_box").css("display","none");
				$.ajax({
					url: "ajax/show_withdrawal_detail.php?withdrawal_id="+id,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						var a=JSON.parse(data);
						$(".detail-box").css("display","flex");
						$("#name").val(a.name);									
						if(a.txn_id.length>0)
							{
								$("#txn_id_box").css("display","block");
								$("#txn_id").val(a.txn_id);
							}
						if(a.screen_shot.length>0)
							{
								$("#screen_shot_box").css("display","block");
								$("#screen_shot_box img").attr("src",a.screen_shot);
								$("#screen_shot_box a").attr("href",a.screen_shot);
							}
						$("#status").val(a.status);		
						$("#remark").val(a.remark);		
						$("#withdrawal_id").val(id);		
						$("#user_id").val(user_id);		
					},
					error: function() 
					{
					} 	        
			   });
			}
		function update_fund()
			{
				var fund_id=$("#fund_id").val();
				var status=$("#status").val();
				$("#submit-button").html("Please Wait....");
				$("#submit-button").removeAttr("onclick");
				var Form=$('#update-form')[0];
				$.ajax({
					url: "ajax/update-fund.php",
					type: "POST",
					data:  new FormData(Form),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#submit-button").html("Please Wait....");
						$("#submit-button").attr("onclick","update_fund()");
						var a=JSON.parse(data);
						if(a.status=='Success')
							{
								$.Toast("", a.message, "success", {
									has_icon:false,
									has_close_btn:true,
									stack: true,
									fullscreen:true,
									timeout:2000,
									sticky:false,
									has_progress:true,
									rtl:false,
								});
								$(".detail-box").slideUp(500);
								$("#status"+fund_id).removeClass($("#status"+fund_id).html());
								$("#status"+fund_id).addClass(status);
								$("#status"+fund_id).html(status);
							}
						else	
							{
								$.Toast("", a.message, "error", {
									has_icon:false,
									has_close_btn:true,
									stack: true,
									fullscreen:true,
									timeout:2000,
									sticky:false,
									has_progress:true,
									rtl:false,
								});
							}								
					},
					error: function() 
					{
					} 	        
			   });
			}	
		function close_detail_box()
			{
				$(".detail-box").css("display","none");
			}		
	</script>
	<?php
		if($delete_status==1)
			{
				echo "<script>$.Toast('', 'Fund request deleted successfully.', 'success', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
						</script>";
			}
		else if($delete_status==0)
			{
				echo "<script>$.Toast('', 'Some problem occured. Try again.', 'error', {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});</script>";
			}	
	?>
	
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Jan 2021 12:21:06 GMT -->
</html>
