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

var slider={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"change_link_type" : function()
		{
			if($('#link_type').is(':checked')) 
				{ 
					$("#category-box").removeClass("inactive"); 
					$("#product-box").addClass("inactive"); 
				}
			else
				{
					$("#category-box").addClass("inactive"); 
					$("#product-box").removeClass("inactive"); 
				}				
		}	
}
