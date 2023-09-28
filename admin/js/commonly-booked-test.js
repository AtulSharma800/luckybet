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
                    $($.parseHTML('<img class="img-thumbnail img-responsive" style="width:100%;max-height:200px;object-fit:contain;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#main_image').on('change', function() {
        mainimagesPreview(this, 'div.main_image');
    });
});


//Add Main Image
$(function() {
    // Multiple images preview in browser
    var mainimagesPreview = function(input, placeToInsertImagePreview) {
		
        if (input.files) {
			$(".banner").html("");	
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-thumbnail img-responsive" style="width:100%;max-height:200px;object-fit:contain;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#banner').on('change', function() {
        mainimagesPreview(this, 'div.banner');
    });
});

var commonly_booked_test={
	
	"select_image":function()
		{
			$("#main_image").click();
		},
	"select_banner":function()
		{
			$("#banner").click();
		},	
	"save":function()
		{
			if(confirm("Sure ! You want to save this Banner"))
				{
					$("#submit").click();
				}
		},
	"update":function()
		{
			if(confirm("Sure ! You want to Update this Banner"))
				{
					$("#submit").click();
				}
		}
}

//What You get
var remove_package_covers_ids=[];
var this_package_covers={
	'add' : function(document_row)
		{
			$("#this-package-covers tr:last").before("<tr class='row-body' id='this_package_covers"+document_row+"'><td><input type='text' name='this_package_covers_text[]' class='form-control this_package_covers_text' ></td><td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='this_package_covers.remove("+document_row+")'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td></tr>");
			document_row++;
			$("#this_package_covers_add_btn").attr("onclick","this_package_covers.add("+document_row+")");
		},
	'remove' : function(count)
		{
			$("#this_package_covers"+count).remove();
		},
	'remove2' : function(count,id)
		{
			$("#this_package_covers"+count).remove();
			remove_package_covers_ids.push(id);
			$("#remove_package_covers_id").val(remove_package_covers_ids);
		}	
}


//Plan
var remove_book_package_ids=[];
var book_package={
	'add' : function(document_row)
		{
			$("#book_package tr:last").before("<tr class='row-body' id='book_package"+document_row+"'><td><input type='file' name='book_package_image[]' id='book_package_image"+document_row+"' onchange='book_package.choose_image("+document_row+")' class='form-control book_package_image_file'><div class='book_package_image img-thumbnail' id='book_package_image_box"+document_row+"' onclick='book_package.select_image("+document_row+")'><p style='text-align:center;margin-bottom:0px;'>	<img src='img/icon/upload.png' style='width:80px;display:block'></p></div></td><td><textarea name='book_package_content[]' class='form-control book_package_content' ></textarea></td><td style='border-right:1px solid #CDCDCD;'><a class='btn btn-sm btn-primary' style='cursor:pointer;background:tomato;padding:0px 8px;' title='' onclick='book_package.remove("+document_row+")'><i class='fa fa-minus' style='font-weight:bold;margin-right:0px;color:white;'></i></a></span></td></tr>");
			document_row++;
			$("#book_package_add_btn").attr("onclick","book_package.add("+document_row+")");
		},
	'remove' : function(count)
		{
			$("#book_package"+count).remove();
		},
	'remove2' : function(count,id)
		{
			$("#book_package"+count).remove();
			remove_book_package_ids.push(id);
			$("#remove_book_package_id").val(remove_book_package_ids);
		},
	"select_image":function(id)
		{
			$("#book_package_image"+id).click();
		},
	"choose_image":function(id)
		{
			var input=document.getElementById("book_package_image"+id);
			var placeToInsertImagePreview="div#book_package_image_box"+id;
			if (input.files) {
				$("#book_package_image_box"+id).html("");	
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function(event) {
						$($.parseHTML('<img class="img-responsive" style="width:100%;max-height:80px;object-fit:contain;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					}

					reader.readAsDataURL(input.files[i]);
				}
			}
		}	
}
