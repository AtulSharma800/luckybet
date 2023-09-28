

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-thumbnail img-responsive">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});

//Add Main Image
$(function() {
    // Multiple images preview in browser
    var mainimagesPreview = function(input, placeToInsertImagePreview) {
		
        if (input.files) {
			$(".main_image").html("");	
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-thumbnail img-responsive" style="width:100%;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#main_image').on('change', function() {
        mainimagesPreview(this, 'div.main_image');
    });
});

var course={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"select_any_image":function(id_no)
		{
			$("#near-by-place-image-"+id_no+"-"+id_no+" .near_by_image_file").click();
		},	
	"save":function()
		{
			if(confirm("Sure ! You want to save this course"))
				{
					$("#overview").val(CKEDITOR.instances.overview.getData());
					$("#requirment").val(CKEDITOR.instances.requirment.getData());
					$("#career").val(CKEDITOR.instances.career.getData());
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this course"))
				{
					$("#overview").val(CKEDITOR.instances.overview.getData());
					$("#requirment").val(CKEDITOR.instances.requirment.getData());
					$("#career").val(CKEDITOR.instances.career.getData());
					$("#submit").click();
				}
		},	
	'delete_gallery':function(id)
		{
			$("#page-loader").css("display","flex");
			$.ajax({
				url: "ajax/project/delete_gallery_pic.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#page-loader").css("display","none");
					$("#gallery_photo"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		},
	'upload_multiple' : function(input, placeToInsertImagePreview)
		{
			if (input.files) 
				{
					$(placeToInsertImagePreview).html("");
					var filesAmount = input.files.length;
					for (i = 0; i < filesAmount; i++) 
						{
							var reader = new FileReader();
							reader.onload = function(event) 
								{
									$($.parseHTML('<img class="img-thumbnail img-responsive">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
								}
							reader.readAsDataURL(input.files[i]);
						}
				}
		},
	'add_nearby_place' : function(number)
		{
			var a=parseInt(number)+1;
			$("#add-new-nearby-btn").before("<div class='row' id='near-by-place-image-"+number+"-"+number+"' style='padding:20px;background:aliceblue;margin-bottom:20px;'><div class='col-md-6'><div class='col-md-12'><div class='form-group'><label>Title</label><input type='text' name='near_by_place_title[]'  class='form-control'></div></div><div class='col-md-12'><div class='form-group'><label>Distance</label><input type='text' name='near_by_place_distance[]' class='form-control'></div>	</div></div><div class='col-md-6'><input type='file' name='near_by_place_image[]' class='near_by_image_file' onchange=project.upload_multiple(this,'#near-by-place-image"+number+"')><div class='near-by-place-image img-thumbnail' id='near-by-place-image"+number+"' onclick='project.select_any_image("+number+")'><p style='font-size:24px;text-align:center;'><img src='img/icon/upload.png' style='width:150px;display:block'></br></p></div></div></div>");
			$("#add-new-nearby-btn span").attr("onclick","project.add_nearby_place("+a+")");
		},
	'delete' : function(course_id)
		{
			if(confirm("Sure to delete ! "))
				{
					window.location.href="courses.php?course_id="+course_id;
				}
		},
	'delete_offer':function(id)
		{
			$("#page-loader").css("display","flex");
			$.ajax({
				url: "ajax/project/delete_offer.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#page-loader").css("display","none");
					$("#offer"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		},
	'delete_floor_plan':function(id)
		{
			$("#page-loader").css("display","flex");
			$.ajax({
				url: "ajax/project/delete_floor_plan.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#page-loader").css("display","none");
					$("#floor-plan"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		},
	'delete_floor_plan':function(id)
		{
			$("#page-loader").css("display","flex");
			$.ajax({
				url: "ajax/project/delete_floor_plan.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#page-loader").css("display","none");
					$("#floor-plan"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		},
	'delete_nearby_places':function(id)
		{
			$("#page-loader").css("display","flex");
			$.ajax({
				url: "ajax/project/delete_nearby_places.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#page-loader").css("display","none");
					$("#near-by-place-image-"+id+"-"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		}
}

