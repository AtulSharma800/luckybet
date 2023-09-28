<?php
	include("../db.php");
	include("../function.php");
	include("../common-details.php");
	include("../check-login.php");
	
	$a=urldecode($_GET['a']);
	$query=mysqli_query($con,"select * from speciality where  id='".$_GET['speciality_id']."'");
	$res=mysqli_fetch_array($query);
	$main_speciality=$res['name'];
	
	$query=mysqli_query($con,"select * from speciality where  LOWER(`name`) = LOWER('$a')");
	$num=mysqli_num_rows($query);
	if($num>0)
		{
			$res=mysqli_fetch_array($query);
			$speciality_id=$res['id'];
?>
			<div class="row" style="padding:0px 20px; padding-top:30px;background:#E0EDD0;padding-bottom:20px">
				<div class="col-12">
					<center><img src="img/icons/male-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/female-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/surgeon.png" style="width:60px"></center>
					<p style="text-align:center;margin-top:20px;font-size:16px;">Sorry, we couldn't find any doctors that matches your search. </p>
					<p style="text-align:center;"><a href="doctors.php?speciality_id=<?=$speciality_id;?>"><span class="see-all">See all doctors</span></a></p>
				</div>
				
			</div>
			
			<div class="row g-3" style="padding:0px 20px;">
				<div class="col-lg-12">
					<div class="d-flex align-items-center justify-content-between" style="padding:0px;padding-top: 20px;">
						<p id='searching-text'>Showing result for <span style="color:#ED0A0A">"<?=$a;?>"</span> in other specialities</p>
					</div>
					<div class='alert alert-danger' style="padding:10px 15px;border-radius:20px;margin-top:15px;"><span style="display:inline-block;vertical-align:super;width:38px;"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size:24px;vertical-align:super;"></i></span><span style="display:inline-block;width:calc(100% - 40px);font-size:12px;">Please note: You had selected '<b><?=@$main_speciality;?></b>' as the speciality. Doctors below are from different specialities.</span></div>
				</div>
				<?php
					
					$query=mysqli_query($con,"select * from doctor where speciality='$speciality_id'");
					$num=mysqli_num_rows($query);
					if($num>0)
						{
							while($res=mysqli_fetch_array($query))
								{
									$hospital_id=$res['hospital'];
									$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
									$res2=mysqli_fetch_array($query2);
									$city_id=$res2['city'];
									$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
									$res3=mysqli_fetch_array($query3);
									$city=$res3['name'];
									
									$speciality_id=$res['speciality'];
									$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
									$res3=mysqli_fetch_array($query3);
									$speciality=$res3['name'];
									$language=unserialize($res['language']);
									$languages=implode(",",$language);
							
				?>
							<div class="col-lg-12 doctor-box">
								<div class='row'>
									<div class="col-lg-5 col-5">
										<img src="admin/upload/doctor/<?=$res['profile'];?>" class="profile-pic">
										<p style="text-align:center;"> <span class="experience"><?=$res['exp'];?> years exp</span></p>
									</div>
									<div class="col-lg-7 col-7 doctor-sub-box">
										<p class="hospital"><img src="admin/upload/hospital/<?=$res2['image'];?>"><span class="devider">&nbsp;</span><span class="name"><span class="single-line"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
										<h6 class='doctor-name'><?=$res['name'];?></h6>
										<p class="single-line education"><?=$res['education'];?></p>
										<p class="single-line speciality"><?=$speciality;?></p>
										<p class="single-line language"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;<?=$languages;?></p>
										<p style='color:black;'>₹<?=$res['fees'];?></p>
									</div>
									<div class="col-lg-12 col-12">
										<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
										<span class="consult-now">Consult Now</span>
									</div>
								</div>
							</div>
				<?php
								}
						}
					else
						{
				?>
							<div class="row" style="padding:0px 20px; padding-top:30px;background:#E0EDD0;padding-bottom:20px">
								<div class="col-12">
									<center><img src="img/icons/male-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/female-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/surgeon.png" style="width:60px"></center>
									<p style="text-align:center;margin-top:20px;font-size:16px;">Sorry, we couldn't find any doctors that matches your search. </p>
									<p style="text-align:center;"><a href="doctors.php?speciality_id=<?=$speciality_id;?>"><span class="see-all">See all doctors</span></a></p>
								</div>
								
							</div>
					
							<div class="row g-3" style="padding:0px 20px;">
								<div class="col-lg-12">
									<div class="d-flex align-items-center justify-content-between" style="padding:0px;padding-top: 20px;">
										<p id='searching-text'>Here are other available doctors</p>
									</div>
								</div>
								<?php
									if(isset($_GET['speciality_id']))
										{
											$speciality_id=$_GET['speciality_id'];
											$a='i:.*;s:.*:"'.$speciality_id.'";';
											$query=mysqli_query($con,"select * from doctor where speciality='".$_GET['speciality_id']."' or additional_speciality REGEXP '$a'");
										}
									while($res=mysqli_fetch_array($query))
										{
											$hospital_id=$res['hospital'];
											$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
											$res2=mysqli_fetch_array($query2);
											$city_id=$res2['city'];
											$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
											$res3=mysqli_fetch_array($query3);
											$city=$res3['name'];
											
											$speciality_id=$res['speciality'];
											$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
											$res3=mysqli_fetch_array($query3);
											$speciality=$res3['name'];
											$language=unserialize($res['language']);
											$languages=implode(",",$language);
											
								?>
											<div class="col-lg-12 doctor-box">
												<div class='row'>
													<div class="col-lg-5 col-5">
														<img src="admin/upload/doctor/<?=$res['profile'];?>" class="profile-pic">
														<p style="text-align:center;"> <span class="experience"><?=$res['exp'];?> years exp</span></p>
													</div>
													<div class="col-lg-7 col-7 doctor-sub-box">
														<p class="hospital"><img src="admin/upload/hospital/<?=$res2['image'];?>"><span class="devider">&nbsp;</span><span class="name"><span class="single-line"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
														<h6 class='doctor-name'><?=$res['name'];?></h6>
														<p class="single-line education"><?=$res['education'];?></p>
														<p class="single-line speciality"><?=$speciality;?></p>
														<p class="single-line language"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;<?=$languages;?></p>
														<p style='color:black;'>₹<?=$res['fees'];?></p>
													</div>
													<div class="col-lg-12 col-12">
														<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
														<span class="consult-now">Consult Now</span>
													</div>
												</div>
											</div>
								<?php
										}						
								?>
							</div>
				<?php
						}						
				?>
			</div>
<?php
			
		}
	else
		{
			$citys="0,";
			$speciality_id=$_GET['speciality_id'];
			$b='i:.*;s:.*:"'.$speciality_id.'";';
			$language='i:.*;s:.*:"*";';
			
			$query=mysqli_query($con,"select * from geo_locations where name like '%$a%'");
			while($res=mysqli_fetch_array($query))
				{
					$citys.=$res['id'].",";
				}
			$citys=trim($citys,",");
			$query=mysqli_query($con,"select doctor.* from doctor left join hospital on doctor.hospital=hospital.id where doctor.speciality='$speciality_id' and (doctor.name like '%$a%' or doctor.language like '%$a%' or hospital.name like '%$a%' or hospital.city in ($citys))");
			$num=mysqli_num_rows($query);
			if($num>0)
				{
?>
					<div class="row g-3" style="padding:0px 20px;">
						<div class="col-lg-12">
							<div class="d-flex align-items-center justify-content-between" style="padding:0px;padding-top: 20px;">
								<p id='searching-text'>showing result for <span style="color:#ED0A0A">"<?=$a;?>"</span></p>
							</div>
						</div>
						<?php
							while($res=mysqli_fetch_array($query))
								{
									$hospital_id=$res['hospital'];
									$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
									$res2=mysqli_fetch_array($query2);
									$city_id=$res2['city'];
									$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
									$res3=mysqli_fetch_array($query3);
									$city=$res3['name'];
									
									$speciality_id=$res['speciality'];
									$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
									$res3=mysqli_fetch_array($query3);
									$speciality=$res3['name'];
									$language=unserialize($res['language']);
									$languages=implode(",",$language);
									
						?>
									<div class="col-lg-12 doctor-box">
										<div class='row'>
											<div class="col-lg-5 col-5">
												<img src="admin/upload/doctor/<?=$res['profile'];?>" class="profile-pic">
												<p style="text-align:center;"> <span class="experience"><?=$res['exp'];?> years exp</span></p>
											</div>
											<div class="col-lg-7 col-7 doctor-sub-box">
												<p class="hospital"><img src="admin/upload/hospital/<?=$res2['image'];?>"><span class="devider">&nbsp;</span><span class="name"><span class="single-line"><?=str_replace($a,"<span style='color:#ED0A0A;'>".$a."</span>",$res2['name']);?></span><span><?=str_replace($a,"<span style='color:#ED0A0A;'>".$a."</span>",$city);?></span></span></p>
												<h6 class='doctor-name'><?=str_replace($a,"<span style='color:#ED0A0A;'>".$a."</span>",$res['name']);?></h6>
												<p class="single-line education"><?=$res['education'];?></p>
												<p class="single-line speciality"><?=$speciality;?></p>
												<p class="single-line language"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;<?=str_replace($a,"<span style='color:#ED0A0A;'>".$a."</span>",$languages);?></p>
												<p style='color:black;'>₹<?=$res['fees'];?></p>
											</div>
											<div class="col-lg-12 col-12">
												<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
												<span class="consult-now">Consult Now</span>
											</div>
										</div>
									</div>
						<?php
								}						
						?>
					</div>
<?php
				}
			else
				{
?>
					<div class="row" style="padding:0px 20px; padding-top:30px;background:#E0EDD0;padding-bottom:20px">
						<div class="col-12">
							<center><img src="img/icons/male-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/female-doctor.png" style="width:60px"> &nbsp;&nbsp;<img src="img/icons/surgeon.png" style="width:60px"></center>
							<p style="text-align:center;margin-top:20px;font-size:16px;">Sorry, we couldn't find any doctors that matches your search. </p>
							<p style="text-align:center;"><a href="doctors.php?speciality_id=<?=$speciality_id;?>"><span class="see-all">See all doctors</span></a></p>
						</div>
						
					</div>
			
					<div class="row g-3" style="padding:0px 20px;">
						<div class="col-lg-12">
							<div class="d-flex align-items-center justify-content-between" style="padding:0px;padding-top: 20px;">
								<p id='searching-text'>Here are other available doctors</p>
							</div>
						</div>
						<?php
							if(isset($_GET['speciality_id']))
								{
									$speciality_id=$_GET['speciality_id'];
									$a='i:.*;s:.*:"'.$speciality_id.'";';
									$query=mysqli_query($con,"select * from doctor where speciality='".$_GET['speciality_id']."' or additional_speciality REGEXP '$a'");
								}
							while($res=mysqli_fetch_array($query))
								{
									$hospital_id=$res['hospital'];
									$query2=mysqli_query($con,"select * from hospital where id='$hospital_id'");
									$res2=mysqli_fetch_array($query2);
									$city_id=$res2['city'];
									$query3=mysqli_query($con,"select * from geo_locations where id='$city_id'");
									$res3=mysqli_fetch_array($query3);
									$city=$res3['name'];
									
									$speciality_id=$res['speciality'];
									$query3=mysqli_query($con,"select * from speciality where id='$speciality_id'");
									$res3=mysqli_fetch_array($query3);
									$speciality=$res3['name'];
									$language=unserialize($res['language']);
									$languages=implode(",",$language);
									
						?>
									<div class="col-lg-12 doctor-box">
										<div class='row'>
											<div class="col-lg-5 col-5">
												<img src="admin/upload/doctor/<?=$res['profile'];?>" class="profile-pic">
												<p style="text-align:center;"> <span class="experience"><?=$res['exp'];?> years exp</span></p>
											</div>
											<div class="col-lg-7 col-7 doctor-sub-box">
												<p class="hospital"><img src="admin/upload/hospital/<?=$res2['image'];?>"><span class="devider">&nbsp;</span><span class="name"><span class="single-line"><?=$res2['name'];?></span><span><?=$city;?></span></span></p>
												<h6 class='doctor-name'><?=$res['name'];?></h6>
												<p class="single-line education"><?=$res['education'];?></p>
												<p class="single-line speciality"><?=$speciality;?></p>
												<p class="single-line language"><i class="fa fa-language" aria-hidden="true"></i>&nbsp;&nbsp;<?=$languages;?></p>
												<p style='color:black;'>₹<?=$res['fees'];?></p>
											</div>
											<div class="col-lg-12 col-12">
												<a href="doctor-detail.php?doctor_id=<?=$res['id'];?>"><span class="know-more"><i class="fa fa-play-circle" aria-hidden="true"></i>&nbsp;&nbsp;Know More</span></a>
												<span class="consult-now">Consult Now</span>
											</div>
										</div>
									</div>
						<?php
								}						
						?>
					</div>			
<?php
				}
		}		
?>