var review={
	"enable" : function(id)
		{
			if(confirm("Sure ! You want to enable this review"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/review/enable.php?id="+id,
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
			if(confirm("Sure ! You want to disable this review"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/review/disable.php?id="+id,
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
			if(confirm("Sure ! You want to delete this enquiry."))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/review/delete.php?id="+id,
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
									alert("Can't delete this review, Try again.");
								}					
						},
						error: function() 
						{
						} 	        
				   });
				}
		},
}