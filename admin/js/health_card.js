var health_card={
	
	"save":function()
		{
			if(confirm("Sure ! You want to make a health card"))
				{
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this pharmacist"))
				{
					$("#submit").click();
				}
		},
	"choose_plan":function()
		{
			var plan_id=$("#plan_id").val();
			$.ajax({
				url: "ajax/choose_plan.php?plan_id="+plan_id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#amount").val(data);				
				},
				error: function() 
				{
				} 	        
		   });
		}	
}
