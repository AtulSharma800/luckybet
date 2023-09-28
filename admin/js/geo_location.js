var geo_location=
	{
		"show_city":function()
			{
				var state=$("#state").val();
				$.ajax({
					url: "https://mudraswasthyaseva.in/app/admin/ajax/geo_location/show_city.php?state="+state,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#city").html(data);
					},
					error: function() 
					{
					} 	        
			   });
			},
		"show_area":function()
			{
				var city=$("#city").val();
				$.ajax({
					url: "ajax/geo_location/show_area.php?city="+city,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{
						$("#area").html(data);
					},
					error: function() 
					{
					} 	        
			   });
			}	
	}
