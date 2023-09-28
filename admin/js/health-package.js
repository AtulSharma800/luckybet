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

var health_package={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"save":function()
		{
			if(confirm("Sure ! You want to save this Health Package"))
				{
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this Health Package"))
				{
					$("#submit").click();
				}
		}
}

//What You get
var remove_what_you_get_ids=[];
var what_you_get={
	'add' : function(document_row)
		{
			$("#what-you-get-table tr:last").before("<tr class='row-body' id='what_you_get"+document_row+"'><td><input type='text' name='what_you_get_text[]' class='form-control what_you_get_text' ></td><td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='what_you_get.remove("+document_row+")'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td></tr>");
			document_row++;
			$("#what_you_get_add_btn").attr("onclick","what_you_get.add("+document_row+")");
		},
	'remove' : function(count)
		{
			$("#what_you_get"+count).remove();
		}		
}


//Plan
var remove_plan_ids=[];
var plan={
	'add' : function(document_row)
		{
			$("#plan-table tr:last").before("<tr class='row-body' id='plan"+document_row+"'><td><input type='number' name='duration[]' class='form-control duration' ></td><td><input type='number' name='price[]' class='form-control price' ></td><td><input type='number' name='offer_price[]' class='form-control offer_price' ></td><td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='plan.remove("+document_row+")'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td></tr>");
			document_row++;
			$("#plan_add_btn").attr("onclick","plan.add("+document_row+")");
		},
	'remove' : function(count)
		{
			$("#plan"+count).remove();
		},
	'remove2' : function(count,id)
		{
			$("#plan"+count).remove();
			remove_plan_ids.push(id);
			$("#remove_plan_id").val(remove_plan_ids);
		}	
}
