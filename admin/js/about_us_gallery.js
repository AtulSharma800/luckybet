

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

var gallery={
		
	'delete_gallery':function(id)
		{
			$("#gallery_photo"+id+" i").removeClass("fa-trash-o");
			$("#gallery_photo"+id+" i").addClass("fa-spin fa-spinner");
			$.ajax({
				url: "ajax/delete_about_us_gallery_pic.php?id="+id,
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
	"save":function()
		{
			if(confirm("Sure ! You want to save this gallery"))
				{
					$("#submit").click();
				}
		}	
	
}
