var schedule={
	"focus_description" : function(e,id)
		{
			if(e.keyCode==13)
				{
					$("#schedule_description"+id).focus();
				}
		},
	"add_next_day" : function(e,id)
		{
			if(e.keyCode==13)
				{
					var next_id=parseInt(id)+1;
					var prev_id=parseInt(id)-1;
					if($("#schedule_day"+id).is(":visible"))
						{
							$("#schedule_day"+id).focus();
						}
					else
						{			
							$('.schedule-item-list:last').after("<tr class='schedule-item-list' id='schedule-item-list"+id+"' style='border:none;'><td><input type='text' name='schedule_day[]' id='schedule_day"+id+"' class='form-control schedule_day'  value='"+id+"' style='height:100px;border:none'></td><td><input type='text' name='schedule_title[]' id='schedule_title"+id+" style='height:100px;border:none' class='form-control' onkeydown='schedule.focus_description(event,"+id+")'></td><td><textarea name='schedule_description[]' id='schedule_description"+id+"' onkeydown='schedule.add_next_day(event,"+next_id+")' class='form-control' style='height:100px;border:none;'></textarea></td><td id='schedule_action"+id+"'></td></tr>");
							$('#schedule_title'+id).focus();
							$("#schedule_action"+prev_id).html("<div class='breadcrumb button btn-primary delete-btn' style='display:inline-block;' onclick='schedule.delete_day("+prev_id+")'><a style='color:white;' > <i class='fa fa-trash-o' title='Delete Day' aria-hidden='true'></i> </a></div>");
						}
				}
		},
	'delete_day' : function(id)
		{
			if(confirm("Sure ! You want to delete this day"))
				{
					$("#schedule-item-list"+id).remove();
				}
		}	
}

var faq={
	"focus_answer" : function(e,id)
		{
			if(e.keyCode==13)
				{
					$("#faq_answer"+id).focus();
				}
		},
	"add_next_faq" : function(e,id)
		{
			if(e.keyCode==13)
				{
					var next_id=parseInt(id)+1;
					var prev_id=parseInt(id)-1;
					if($("#faq_question"+id).is(":visible"))
						{
							$("#faq_question"+id).focus();
						}
					else
						{			
							$('.faq-item-list:last').after("<tr class='faq-item-list' id='faq-item-list"+id+"' style='border:none;'><td><input type='text' name='faq_no[]' id='faq_no"+id+"' class='form-control faq_no'  value='"+id+"' style='height:150px;border:none;'></td><td><input type='text' name='faq_question[]' id='faq_question"+id+"' class='form-control' onkeydown='faq.focus_answer(event,"+id+")' style='height:150px;border:none;'></td><td><textarea name='faq_answer[]' id='faq_answer"+id+"' onkeydown='faq.add_next_faq(event,"+next_id+")' class='form-control' style='height:150px;border:none;'></textarea></td><td id='faq_action"+id+"'</td></tr>");
							$('#faq_question'+id).focus();
							$("#faq_action"+prev_id).html("<div class='breadcrumb button btn-primary delete-btn' style='display:inline-block;' onclick='faq.delete("+prev_id+")'><a style='color:white;' > <i class='fa fa-trash-o' title='Delete FAQ' aria-hidden='true'></i> </a></div>");
						}
				}
		},
	'delete' : function(id)
		{
			if(confirm("Sure ! You want to delete this faq"))
				{
					$("#faq-item-list"+id).remove();
				}
		}	
}


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

var add_package={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"save":function()
		{
			if(confirm("Sure ! You want to save this package"))
				{
					$("#description").val($("#description").Editor("getText"));
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this package"))
				{
					$("#description").val($("#description").Editor("getText"));
					$("#submit").click();
				}
		},	
	'delete_photo':function(id)
		{
			$.ajax({
				url: "ajax/package/delete_gallery_pic.php?id="+id,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
				{
					$("#gallery_photo"+id).remove();
				},
				error: function() 
				{
				} 	        
		   });
		},
	"enable" : function(id)
		{
			if(confirm("Sure ! You want to enable this package"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/package/enable.php?id="+id,
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
			if(confirm("Sure ! You want to disable this package"))
				{
					$("#page-loader").css("display","flex");
					$.ajax({
						url: "ajax/package/disable.php?id="+id,
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
}