var enquiry={
	"approve" : function(id)
		{
			if(confirm("Sure ! You want to approve this enquiry"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/enquiry/approve.php?id="+id,
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
									$("#"+id+" .status").html("<span class='badge badge-success'>Approved</span>");
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
	"unapprove" : function(id)
		{
			if(confirm("Sure ! You want to unapprove this enquiry"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/enquiry/unapprove.php?id="+id,
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
									$("#"+id+" .status").html("<span class='badge badge-danger'>Unapproved</span>");
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
						url: "ajax/enquiry/delete.php?id="+id,
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
}