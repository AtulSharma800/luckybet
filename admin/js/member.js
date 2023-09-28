var member={
	"update":function()
		{
			if(confirm("Sure ! You want to Update this member"))
				{
					$("#submit").click();
				}
		},
	"enable" : function(id)
		{
			if(confirm("Sure ! You want to enable this member"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/member/enable.php?id="+id,
						type: "POST",
						data:  "",
						contentType: false,
						cache: false,
						processData:false,
						success: function(data)
						{
							$("#page-loader").css("display","none");
							if(data=='Success')
								{
									$("#"+id+" .status").html("<span class='badge badge-success'>Enable</span>");
								}
							else
								{
									alert("Can't update status, Try again.");
								}					
						},
						error: function() 
						{
						} 	        
				   });
				}
		},
	"disable" : function(id)
		{
			if(confirm("Sure ! You want to disable this member"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/member/disable.php?id="+id,
						type: "POST",
						data:  "",
						contentType: false,
						cache: false,
						processData:false,
						success: function(data)
						{
							$("#page-loader").css("display","none");
							if(data=='Success')
								{
									$("#"+id+" .status").html("<span class='badge badge-danger'>Disable</span>");
								}
							else
								{
									alert("Can't update status, Try again.");
								}					
						},
						error: function() 
						{
						} 	        
				   });
				}
		},	
	"delete" : function(id)
		{
			if(confirm("Sure ! You want to delete this member. All the details related to this member like package,hotels etc. will be deleted."))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/member/delete.php?id="+id,
						type: "POST",
						data:  "",
						contentType: false,
						cache: false,
						processData:false,
						success: function(data)
						{
							$("#page-loader").css("display","none");
							if(data=='Success')
								{
									$("#"+id).remove();
								}
							else
								{
									alert("Can't delete this member, Try again.");
								}					
						},
						error: function() 
						{
						} 	        
				   });
				}
		},
	"login" : function(id)
		{
			$("#page-loader").css("display","flex");
				$.ajax({
					url: "member-login.php?id="+id,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#page-loader").css("display","none");
						if(data=='Success')
							{
								window.location.href="../member/index.php";
							}
						else
							{
								alert("Can't login this member is inactive, Try again.");
							}					
					},
					error: function() 
					{
					} 	        
			   });
		},	
		
}