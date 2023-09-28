let timerOn = true;

var member={

    "register":function()

		{

			var result=member.validation();

			if(result)

				{

					$("#submit-btn").html("Please Wait....");

					$("#submit-btn").removeAttr("onclick");

					var Form=$('#register-form')[0];

					$.ajax({

						url: "ajax/member/register.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

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

									setTimeout(function(){window.location.href='home.php';},1000);

								}

							else

								{

									$("#submit-btn").html("Verify &amp; Proceed");

									$("#submit-btn").attr("onclick","member.register()");

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



		},

	"register2":function()

		{

			var result=member.validation();

			if(result)

				{

					$('#toast-1').toast('show');

					$("input").attr("readonly","true");

					var Form=$('#register-form')[0];

					$.ajax({

						url: "ajax/member/register2.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

							$('#toast-1').toast('hide');

							if(data=='Success')

								{

									$('#menu-success-1').showMenu();

									$("input").val("");

								}

							else if(data=='Wrong Referral Code')

								{

									$('#menu-warning-1').showMenu();

									$("input").removeAttr("readonly");

								}

							else if(data=='Mobile Exist')

								{

									$('#menu-warning-2').showMenu();

									$("input").removeAttr("readonly");

									$("#mobile").focus();

									$("#mobile_em").html("<i class='fa fa-exclamation-triangle color-red2-light'></i>");

								}

							else

								{

									$('#menu-warning-3').showMenu();

									$("input").removeAttr("readonly");

								}

						},

						error: function()

						{

						}

				   });

				}

		},

	"login":function()

		{

			$("#submit-btn").html("Please Wait....");

			$("#submit-btn").removeAttr("onclick");

		    var Form=$('#login-form')[0];

			$.ajax({

				url: "ajax/member/login.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

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

							setTimeout(function(){window.location.href='home.php';},1000);

						}

					else

						{

							$("#submit-btn").html("Log In");

							$("#submit-btn").attr("onclick","member.login()");

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



		},

	"update_basic_details":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#basic-detail-form')[0];

			$.ajax({

				url: "ajax/member/update-basic-details.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$("#toast-1").removeClass('show');

					if(data=='Success')

						{

							$('#menu-success-1').showMenu();

						}

					else

						{

							$('#menu-warning-3').showMenu();

						}

				},

				error: function()

				{

				}

		   });



		},

	"update_address_details":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#address-detail-form')[0];

			$.ajax({

				url: "ajax/member/update-address-details.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').toast('hide');

					if(data=='Success')

						{

							$('#menu-success-2').showMenu();

						}

					else

						{

							$('#menu-warning-3').showMenu();

						}

				},

				error: function()

				{

				}

		   });



		},

	"update_bank_details":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#bank-detail-form')[0];

			$.ajax({

				url: "ajax/member/update-bank-details.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').toast('hide');

					if(data=='Success')

						{

							$('#menu-success-3').showMenu();

						}

					else

						{

							$('#menu-warning-3').showMenu();

						}

				},

				error: function()

				{

				}

		   });



		},

	"update_documents":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#document-detail-form')[0];

			$.ajax({

				url: "ajax/member/update-document-details.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').toast('hide');

					if(data=='Success')

						{

							$('#menu-success-3').showMenu();

						}

					else

						{

							$('#menu-warning-3').showMenu();

						}

				},

				error: function()

				{

				}

		   });



		},

	"verify_login_code":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#forgot-form')[0];

			$.ajax({

				url: "ajax/member/verify-login-code.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').toast('hide');

					if(data=='Failure')

						{

							$('#menu-warning-3').showMenu();

						}

					else

						{

							$('#menu-success-1').showMenu();

							$("#last_digit").html(data);

							$("#forgot-form").css("display","none");

							$("#code-form").css("display","inherit");

						}

				},

				error: function()

				{

				}

		   });



		},

	"verify_otp":function()

		{

			$("#submit-btn").html("Please Wait....");

			$("#submit-btn").removeAttr("onclick");

			var Form=$('#code-form')[0];

			$.ajax({

				url: "ajax/member/verify-otp.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

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

							setTimeout(function(){window.location.href='register.php';},1000);

						}

					else

						{

							$("#submit-btn").html("Verify &amp; Proceed");

							$("#submit-btn").attr("onclick","member.verify_otp()");

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



		},

	"verify_otp2":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#code-form')[0];

			$.ajax({

				url: "ajax/member/verify-otp.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					setTimeout(function(){$('#toast-1').removeClass('show');},2000);

					if(data=='Success')

						{

							$('#toast-2').toast('show');

							window.location.href="register.php";

						}

					else

						{

							$('#toast-3').toast('show');

							setTimeout(function(){$('#toast-3').removeClass('show');},2000);

						}

				},

				error: function()

				{

				}

		   });



		},

	"verify_otp3":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#code-form')[0];

			$.ajax({

				url: "ajax/member/verify-otp.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					setTimeout(function(){$('#toast-1').removeClass('show');},2000);

					if(data=='Success')

						{

							$('#toast-2').toast('show');

							window.location.href="add-member.php";

						}

					else

						{

							$('#toast-3').toast('show');

							setTimeout(function(){$('#toast-3').removeClass('show');},2000);

						}

				},

				error: function()

				{

				}

		   });



		},

	"change_password":function()

		{

			$('#toast-1').toast('show');

			var Form=$('#password-form')[0];

			$.ajax({

				url: "ajax/member/change-password.php",

				type: "POST",

				data:  new FormData(Form),

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').toast('hide');

					if(data=='Success')

						{

							$('#menu-success-2').showMenu();

						}

					else

						{

							$('#menu-warning-4').showMenu();

						}

				},

				error: function()

				{

				}

		   });



		},

	"show_activation_box":function(name,code,id)

		{

			$('#menu-activation-box').showMenu();

			$("#member_name").html(name);

			$("#member_code").html(code);

			$("#member_id").val(id);

		},

	"activate":function()

		{

			var member_code=$("#member_code").html();

			var amount=$("#amount").val();

			if(amount>=10000)

				{

					$('#toast-1').css('z-index',"9990 !important");

					$('#toast-1').toast('show');

					var Form=$('#activation-form')[0];

					$.ajax({

						url: "ajax/member/activate.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

							$('#toast-1').css('z-index',"0 !important");

							$('#toast-1').toast('hide');

							alert(data);

							if(data=='Success')

								{

									$('#menu-activation-box').hideMenu();

									$('#menu-success-1').showMenu();

									$('#success-id').html(member_code);

									$('#success-amount').html(amount);

									setTimeout(function(){window.location.reload();},2000);

								}

							else if(data=='low_balance')

								{

									$('#low-balance').css("display","inherit");

									setTimeout(function(){$('#menu-warning-3').css("display","none");},4000);

								}

							else

								{

									$('#menu-warning-3').css("display","inherit");

									setTimeout(function(){$('#menu-warning-3').css("display","none");},4000);

								}

						},

						error: function()

						{

						}

				   });

				}

			else

				{

					$('#alert-box').css('display',"inherit");

					setTimeout(function(){$('#alert-box').css("display","none");},4000);

				}

		},

	"validation":function()

		{

			var inputs = $(".required");

			for(var i = 0; i < inputs.length; i++)

				{

					if($(inputs[i]).val().length<1)

						{

							$.Toast("", 'Fill all the required fields.', "error", {

								has_icon:false,

								has_close_btn:true,

								stack: true,

								fullscreen:true,

								timeout:2000,

								sticky:false,

								has_progress:true,

								rtl:false,

							});

							return false;

						}

				}

			/*var mobile = $("#mobile").val();

			var validateMobNum= /^\d*(?:\.\d{1,2})?$/;

			if (!(validateMobNum.test(mobile) && mobile.length == 10))

				{

					$.Toast("", 'Fill all the required fields.', "error", {

						has_icon:false,

						has_close_btn:true,

						stack: true,

						fullscreen:true,

						timeout:2000,

						sticky:false,

						has_progress:true,

						rtl:false,

					});

					return false;

				}*/

			var password=$("#password").val();

			var confirm_password=$("#confirm_password").val();

			if (password != confirm_password)

				{

					$.Toast("", 'Password and confirm password does not match.', "error", {

						has_icon:false,

						has_close_btn:true,

						stack: true,

						fullscreen:true,

						timeout:2000,

						sticky:false,

						has_progress:true,

						rtl:false,

					});

					return false;

				}

			return true;

		},

	"search2":function()

		{

			var count=0;

			var a=$("#search2_bar").val().toLowerCase();

			$(".all_members").each(function(){

				var b=$(this).find(".name").html().toLowerCase();

				var c=$(this).find(".mobile").html();

				var d=$(this).find(".state").html().toLowerCase();

				var f=$(this).find(".city").html().toLowerCase();

				if(b.indexOf(a) != -1)

					{

						$(this).show();

						var index=$(this).index();

						$(".all_members_divider").eq(index).show();

						count++;

					}

				else if(c.indexOf(a) != -1)

					{

						$(this).show();

						var index=$(this).index();

						$(".all_members_divider").eq(index).show();

						count++;

					}

				else if(d.indexOf(a) != -1)

					{

						$(this).show();

						var index=$(this).index();

						$(".all_members_divider").eq(index).show();

						count++;

					}

				else

					{

						var index=$(this).index();

						$(".all_members_divider").eq(index).hide();

						$(this).hide();

					}

			});

			//$("#number_of_thekedar").html(count);

		},

	"next" : function()

		{

		    var success=0;

		    $('#basic-info .required').each(function(){

                if($(this).val().length==0)

                    {

                        $('#toast-4').toast('show');

                        success++;

                    }

            });

            if(success==0)

                {

			        $("#basic-info").addClass("hide-block");

			        $("#address-info").removeClass("hide-block");

                }

		},

	"back" : function()

		{

			$("#basic-info").removeClass("hide-block");

			$("#address-info").addClass("hide-block");

		},

	"change_login_type" : function()

		{

			if($('#login_type1').is(':checked'))

				{

					$("#otp-button").css('display','inline-block');

					$("#otp-block").removeClass('hide-block');

					$("#password-block").addClass('hide-block');

					$("#mobile-block").css("width","60%");

					$("#mobile-block").css("display","inline-block");

					$("#mobile").css("border-radius","10px 0px 0px 10px !important");



				}

			else if($('#login_type2').is(':checked'))

				{

					$("#otp-button").css('display','none');

					$("#otp-block").addClass('hide-block');

					$("#password-block").removeClass('hide-block');

					$("#mobile-block").css("width","100%");

					$("#mobile-block").css("display","block");

					$("#mobile").css("border-radius","10px");

				}

		},

	"get_otp":function()

		{

			if($("#mobile").val().length==10)

				{

					$("#mobile").css("box-shadow","none");

					$('#toast-1').toast('show');

					var Form=$('#login-form')[0];



					$.ajax({

						url: "ajax/member/send-otp.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

							$('#toast-1').toast('hide');

							timer(30);

						},

						error: function()

						{

						}

					});

				}

		},

	"get_otp2":function()

		{

			$('#toast-1').toast('show');

			$.ajax({

				url: "ajax/member/resend-otp2.php",

				type: "POST",

				data:  "",

				contentType: false,

				cache: false,

				processData:false,

				success: function(data)

				{

					$('#toast-1').removeClass('show');

					timer2(30);

				},

				error: function()

				{

				}

			});

		},

	"see_benifites" : function()

		{

			$('#benifites').showMenu();

		},

	"donate_now" : function()

		{

			if((parseInt($("#amount").val())>=1) && ($("#transaction_no").val().length>2))

				{

					$('#toast-1').toast('show');

					var Form=$('#donate-form')[0];

					$.ajax({

						url: "ajax/member/donate-now.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

							$('#toast-1').toast('hide');

							if(data=='Success')

								{

									$('#donate-success').showMenu();

								}

							else

								{

									$('#donate-failure').showMenu();

								}

						},

						error: function()

						{

						}

				   });

				}

		},

	"donate_now2" : function()

		{

			if((parseInt($("#amount").val())>=1) && ($("#transaction_no").val().length>2))

				{

					$('#toast-1').toast('show');

					var Form=$('#donate-form')[0];

					$.ajax({

						url: "ajax/member/donate-now2.php",

						type: "POST",

						data:  new FormData(Form),

						contentType: false,

						cache: false,

						processData:false,

						success: function(data)

						{

							$('#toast-1').toast('hide');

							if(data=='Success')

								{

									$('#donate-success').showMenu();

								}

							else

								{

									$('#donate-failure').showMenu();

								}

						},

						error: function()

						{

						}

				   });

				}

		},



	"verify_mobile":function()

    		{

				var mobile=$("#mobile").val();

				if($("#mobile").val().length==10)

				    {

						$("#submit-btn").html("Please Wait....");

						$("#submit-btn").removeAttr("onclick");

				        var Form=$('#mobile-form')[0];

        				$.ajax({

        					url: "ajax/member/verify-mobile.php",

        					type: "POST",

        					data:  new FormData(Form),

        					contentType: false,

        					cache: false,

        					processData:false,

        					success: function(data)

        					{
								var a=JSON.parse(data);
								console.log(data);
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

										setTimeout(function(){window.location.href='otp-confirm.php';},1000);

									}

								else

									{

										$("#submit-btn").html("Send OTP");

										$("#submit-btn").attr("onclick","member.verify_mobile()");
										console.log('ritik')

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

				else

				    {

						$("#mobile").focus();

				        $.Toast("", "Enter 10 digit mobile number", "error", {

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

    	"verify_mobile2":function()

    		{

    		    var mobile=$("#mobile").val();

				if($("#mobile").val().length==10)

				    {
        				$('#toast-1').toast('show');

        				$("input").attr("readonly","true");

        				var Form=$('#mobile-form')[0];

        				$.ajax({

        					url: "ajax/member/verify_mobile.php",

        					type: "POST",

        					data:  new FormData(Form),

        					contentType: false,

        					cache: false,

        					processData:false,

        					success: function(data)

        					{

        						$('#toast-1').toast('hide');

        						if(data=='Success')

        							{

        								$('#toast-2').toast('show');

        								window.location.href="otp-verification2.php";

        							}

        						else if(data=='Mobile Exist')

        							{

        								$('#menu-warning-2').showMenu();

        								$("input").removeAttr("readonly");

        								$("#mobile").focus();

        								$("#mobile_em").html("<i class='fa fa-exclamation-triangle color-red2-light'></i>");

        							}

        						else

        							{

        								$('#menu-warning-3').showMenu();

        								$("input").removeAttr("readonly");

        							}

        					},

        					error: function()

        					{

        					}

        			   });

				    }

				else

				    {

				        $("#toast-3").toast('show');

				        setTimeout(function(){$("#toast-3").removeClass('show');},1500);

				    }

    		},

    	"next_digit" : function(id,id2)

    	    {

    	        if($("#"+id).val().length>0)

    	            {

    	                if(id2=='digit0')

    	                    {

    	                        if(($("#digit1").val().length>0) && ($("#digit2").val().length>0) && ($("#digit3").val().length>0) && ($("#digit4").val().length>0))

    	                            {

    	                                member.verify_otp2();

    	                            }

    	                    }

    	                else

    	                    {

    	                        $("#"+id2).focus();

    	                    }



    	            }

    	    },

    	 "next_digit2" : function(id,id2)

    	    {

    	        if($("#"+id).val().length>0)

    	            {

    	                if(id2=='digit0')

    	                    {

    	                        if(($("#digit1").val().length>0) && ($("#digit2").val().length>0) && ($("#digit3").val().length>0) && ($("#digit4").val().length>0))

    	                            {

    	                                member.verify_otp3();

    	                            }

    	                    }

    	                else

    	                    {

    	                        $("#"+id2).focus();

    	                    }



    	            }

    	    } ,

		"update":function()

			{

				$("#submit-btn").html("Please Wait....");

				$("#submit-btn").removeAttr("onclick");

				var Form=$('#register-form')[0];

				$.ajax({

					url: "ajax/member/update.php",

					type: "POST",

					data:  new FormData(Form),

					contentType: false,

					cache: false,

					processData:false,

					success: function(data)

					{

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

							}

						else

							{

								$("#submit-btn").html("UPDATE");

								$("#submit-btn").attr("onclick","member.update()");

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

			} ,



		"update_password":function()

			{

				$("#submit-btn").html("Please Wait....");

				$("#submit-btn").removeAttr("onclick");

				var Form=$('#register-form')[0];

				$.ajax({

					url: "ajax/member/update-password.php",

					type: "POST",

					data:  new FormData(Form),

					contentType: false,

					cache: false,

					processData:false,

					success: function(data)

					{

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

							}

						else

							{

								$("#submit-btn").html("UPDATE");

								$("#submit-btn").attr("onclick","member.update_password()");

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



}

var documents=

	{

		"select_image" : function(id)

			{

				$("#"+id).click();

			},

		"upload_image" : function(input,placeToInsertImagePreview)

			{

				$(placeToInsertImagePreview).html("");

				var reader = new FileReader();

				reader.onload = function(event)

					{

						$($.parseHTML('<img class="img-thumbnail img-responsive" style="height:130px;width:130px;border-radius:50%;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

					}

				reader.readAsDataURL(input.files[0]);

			},

		"select_profile_image" : function(id)

			{

				$("#profile_image").click();

			},

		"upload_profile_image" : function()

			{

				$('#toast-1').toast('show');

				var Form=$('#profile-form')[0];

				$.ajax({

					url: "ajax/member/change-profile.php",

					type: "POST",

					data:  new FormData(Form),

					contentType: false,

					cache: false,

					processData:false,

					success: function(data)

					{

						$('#toast-1').toast('hide');

						var a=data.split("@@@@");

						if(a[0]=='Success')

							{

								$("#profile_image_src").attr('src',a[1]);

							}

					},

					error: function()

					{

					}

			   });

			}

	}



function timer(remaining)

	{

		var m = Math.floor(remaining / 60);

		var s = remaining % 60;

		m = m < 10 ? '0' + m : m;

		s = s < 10 ? '0' + s : s;

		document.getElementById('otp-button').innerHTML = m + ':' + s;

		remaining -= 1;

		if(remaining >= 0 && timerOn)

			{

				setTimeout(function() {timer(remaining);}, 1000);

				return;

			}

		if(!timerOn)

			{

				return;

			}

		// Do timeout stuff here

		$("#otp-button").html("Resend OTP");

		$("#otp-button").attr("onclick","user.get_otp()");

	}



function timer2(remaining)

	{

		var m = Math.floor(remaining / 60);

		var s = remaining % 60;

		m = m < 10 ? '0' + m : m;

		s = s < 10 ? '0' + s : s;

		document.getElementById('resend-text').innerHTML = m + ':' + s;

		remaining -= 1;

		if(remaining >= 0 && timerOn)

			{

				setTimeout(function() {timer2(remaining);}, 1000);

				return;

			}

		if(!timerOn)

			{

				return;

			}

		// Do timeout stuff here

		$("#resend-text").html("Resend OTP");

		$("#resend-text").attr("onclick","member.get_otp2()");

	}