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

var speciality={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"save":function()
		{
			if(confirm("Sure ! You want to save this speciality"))
				{
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this speciality"))
				{
					$("#submit").click();
				}
		}
}
