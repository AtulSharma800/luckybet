(function () {
    'use strict';

    var suhaWindow = $(window);

    // :: Preloader
    suhaWindow.on('load', function () {
        $('#preloader').fadeOut('1000', function () {
            $(this).remove();
        });
    });

    // :: Dropdown Menu
    $(".sidenav-nav").find("li.suha-dropdown-menu").append("<div class='dropdown-trigger-btn'><i class='lni lni-chevron-down'></i></div>");
    $(".dropdown-trigger-btn").on('click', function () {
        $(this).siblings('ul').stop(true, true).slideToggle(700);
        $(this).toggleClass('active');
    });

    // :: Hero Slides
    if ($.fn.owlCarousel) {
        var welcomeSlider = $('.hero-slides');
        welcomeSlider.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: true,
            center: true,
            margin: 0,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        })

        welcomeSlider.on('translate.owl.carousel', function () {
            var layer = $("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        welcomeSlider.on('translated.owl.carousel', function () {
            var layer = welcomeSlider.find('.owl-item.active').find("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });
    }

    // :: Flash Sale Slides
    if ($.fn.owlCarousel) {
        var flashSlide = $('.flash-sale-slide');
        flashSlide.owlCarousel({
            items: 3,
            margin: 16,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            dots: false,
            nav: false,
            responsive: {
                1400: {
                    items: 5,
                },
                992: {
                    items: 5,
                },
                768: {
                    items: 4,
                },
                480: {
                    items: 4,
                },
            },
        })
    }

    // :: Collection Slides
    if ($.fn.owlCarousel) {
        var collectionSlide = $('.collection-slide');
        collectionSlide.owlCarousel({
            items: 1,
            margin: 16,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            dots: false,
            nav: false,
            responsive: {
                1400: {
                    items: 6,
                },
                992: {
                    items: 5,
                },
                768: {
                    items: 4,
                },
                480: {
                    items: 3,
                },
            },
        })
    }
	
	// :: Collection Slides
    if ($.fn.owlCarousel) {
        var videoSlide = $('.video-slide');
        videoSlide.owlCarousel({
            items: 1,
            margin: 16,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            dots: false,
            nav: false,
            responsive: {
                1400: {
                    items: 6,
                },
                992: {
                    items: 5,
                },
                768: {
                    items: 4,
                },
                480: {
                    items: 3,
                },
            },
        })
    }

    // :: Products Slides
    if ($.fn.owlCarousel) {
        var productslides = $('.product-slides');
        productslides.owlCarousel({
            items: 1,
            margin: 0,
            loop: false,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: false,
            nav: true,
            navText: [('<i class="lni lni-chevron-left"></i>'), ('<i class="lni lni-chevron-right"></i>')]
        })
    }

    // :: Related Products Slides
    if ($.fn.owlCarousel) {
        var relProductSlide = $('.related-product-slide');
        relProductSlide.owlCarousel({
            items: 2,
            margin: 16,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            dots: false,
            nav: false,
            responsive: {
                1400: {
                    items: 6,
                },
                992: {
                    items: 5,
                },
                768: {
                    items: 4,
                },
                480: {
                    items: 3,
                },
            },
        })
    }

    // :: Counter Up
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 150,
            time: 3000
        });
    }

    // :: Prevent Default 'a' Click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

    // :: Password Strength
    if ($.fn.passwordStrength) {
        $('#registerPassword').passwordStrength({
            minimumChars: 8
        });
    }

    // :: Magnific Popup 
    if ($.fn.magnificPopup) {
        $('#singleProductVideoBtn, #videoButton').magnificPopup({
            type: "iframe"
        });
    }

    // :: Review Image Magnific Popup 
    if ($.fn.magnificPopup) {
        $('.review-image').magnificPopup({
            type: "image"
        });
    }

    // :: Cart Quantity Button Handler 
    $(".quantity-button-handler").on("click", function () {
        var value = $(this).parent().find("input.cart-quantity-input").val();
        if ($(this).text() == "+") {
            var newVal = parseFloat(value) + 1;
        } else {
            if (value > 1) {
                var newVal = parseFloat(value) - 1;
            } else {
                newVal = 1;
            }
        }
        $(this).parent().find("input").val(newVal);
    });

    // :: Data Countdown 
    $('[data-countdown]').each(function () {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            $(this).find(".days").html(event.strftime("%D"));
            $(this).find(".hours").html(event.strftime("%H"));
            $(this).find(".minutes").html(event.strftime("%M"));
            $(this).find(".seconds").html(event.strftime("%S"));
        });
    });

    // :: Tooltip 
    var tooltipSuha = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipSuha.map(function (tooltip) {
        return new bootstrap.Tooltip(tooltip);
    });

    // :: Toast 
    var toastSuha = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastSuha.map(function (toast) {
        return new bootstrap.Toast(toast);
    });
    toastList.forEach(toast => toast.show());

    // :: Home Page Toast 
    var toastSuha = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastSuha.map(function (toast) {
        return new bootstrap.Toast(toast);
    });
    toastList.forEach(toast => toast.show());

})();


$(document).ready(function()
	{
		$('.cart-btn').on('click', function() {
			var product_id=$(this).attr("data-id");
			var quantity=$(this).attr("data-quantity");
			var data_added=$(this).attr("data-added");
			
			if(data_added==0)
				{
					$.ajax({
						url: "ajax/add-to-cart.php?product_id="+product_id+"&quantity="+quantity,
						type: "POST",
						data:  "",
						contentType: false,
						cache: false,
						processData:false,
						success: function(data)
							{
								
								refresh_cart();
							},
						error: function() 
							{
							} 
					});
					$(this).html("<i class='lni lni-minus'></i>");
					$(this).attr("data-added","1");
					$(this).css("background-color","tomato");
					$(this).css("border-color","tomato");
				}
			else
				{
					$.ajax({
						url: "ajax/remove-from-cart.php?product_id="+product_id+"&quantity="+quantity,
						type: "POST",
						data:  "",
						contentType: false,
						cache: false,
						processData:false,
						success: function(data)
							{
								refresh_cart();
							},
						error: function() 
							{
							} 
					});
					$(this).html("<i class='lni lni-plus'></i>");
					$(this).attr("data-added","0");
					$(this).css("background-color","#00b894");
					$(this).css("border-color","#00b894");
				}				
		});
		
	});
	
$(document).ready(function()
	{
		$('.remove-product').on('click', function() {
			var product_id=$(this).attr("data-id");
			var quantity=1;
			$.ajax({
				url: "ajax/remove-from-cart.php?product_id="+product_id+"&quantity="+quantity,
				type: "POST",
				data:  "",
				contentType: false,
				cache: false,
				processData:false,
				success: function(data)
					{
						$("#row"+product_id).remove();
						refresh_total();
					},
				error: function() 
					{
					} 
			});
		});
		
	});	
	
function refresh_cart()
	{
		$.ajax({
			url: "ajax/refresh-cart.php",
			type: "POST",
			data:  "",
			contentType: false,
			cache: false,
			processData:false,
			success: function(data)
				{
					var a=data.split("@@@@@");
					$("#footer-cart").html(a[0]);
					if(a[1]>0)
						{
							$("#footer-cart").css("display","inherit");
						}
					else
						{
							$("#footer-cart").css("display","none");
						}						
				},
			error: function() 
				{
				} 
			});
	}

function refresh_total()
	{
		var delivery_fee=$("#delivery_fee").val();
		$.ajax({
			url: "ajax/refresh-total.php?delivery_fee="+delivery_fee,
			type: "POST",
			data:  "",
			contentType: false,
			cache: false,
			processData:false,
			success: function(data)
				{
					var a=data.split("@@@@@");	
					if(a[1]>0)
						{
							$("#total-box").html(a[0]);
						}					
					else
						{
							$("#cart-box").html("<img src='img/icons/no-product.png' style='width:100%;margin-top:35px;'>");
						}						
				},
			error: function() 
				{
				} 
			});
	}

function add_to_cart2(product_id)
	{
		var quantity=$("#product-quantity").val();
		if(quantity>0)
			{
				$("#page-loader").css("display","flex");
				$.ajax({
					url: "ajax/add-to-cart2.php?product_id="+product_id+"&quantity="+quantity,
					type: "POST",
					data:  "",
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
						{
							$("#page-loader").css("display","none");
							var a=JSON.parse(data);
							if(a.status=='Success')
								{
									$.Toast("", a.message, "success", {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
									refresh_cart();
								}
							else	
								{
									$.Toast("", a.message, "error", {
										has_icon:false,
										has_close_btn:true,
										stack: true,
										fullscreen:true,
										timeout:2000,
										sticky:false,
										has_progress:true,
										rtl:false,
									});
								}
						},
					error: function() 
						{
						} 
				});
			}
	}
function round2Fixed(value) 
	{
		value = +value;
		if (isNaN(value))
			return NaN;
		// Shift
		value = value.toString().split('e');
		value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + 2) : 2)));
		// Shift back
		value = value.toString().split('e');
		return (+(value[0] + 'e' + (value[1] ? (+value[1] - 2) : -2))).toFixed(2);
	}	