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

var doctor={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"save":function()
		{
			if(confirm("Sure ! You want to save this doctor"))
				{
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this doctor"))
				{
					$("#submit").click();
				}
		}
}

//Advance Paid
var remove_education_ids=[];
var education_row={
	'add' : function(document_row)
		{
			$("#education-table tr:last").before("<tr class='row-body' id='education"+document_row+"'><td><input type='text' name='education_name[]' class='form-control education_name' ></td><td><input type='text' name='university[]' class='form-control university' ></td><td><input type='text' name='year[]' class='form-control year' ></td><td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='education_row.remove("+document_row+")'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td></tr>");
			document_row++;
			$("#education_add_btn").attr("onclick","education_row.add("+document_row+")");
		},
	'remove' : function(count)
		{
			$("#education"+count).remove();
		},
	'remove2' : function(count,id)
		{
			$("#education"+count).remove();
			remove_education_ids.push(id);
			$("#remove_education_id").val(remove_education_ids);
		}		
}
