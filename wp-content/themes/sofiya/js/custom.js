document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("#menu", {
            "extensions": [
                "pagedim-black",
                "position-left"
            ],
			navbar: {
				title: "Меню"
			}
        });
    }
);

$(document).ready(function () {

    $(".slider__main .owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        autoplayTimeout: 4000,
        dots: true
    });
    $(".testimonials__carousel .owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: true
    });
    $(".room__slider .owl-carousel").owlCarousel({
        items: 1,
        //autoplay: true,
        loop: true,
        autoplayTimeout: 4000,
        margin: 16,
        dots: false,
        nav: true,
        navText: ["<img src='/wp-content/themes/sofiya/image/prev.svg'/>", "<img src='/wp-content/themes/sofiya/image/next.svg'/>"],
        responsiveClass: true,
        responsive: {
            0: {
                stagePadding: 40,
            },
            768: {
                stagePadding: 80,
            },
            1100: {
                stagePadding: 136,
            }
        }
    });
	

	$(".scrollto").on("click", function (event) {
		event.preventDefault();
		var id  = $(this).attr('href'),
			top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
    
   
    $('.button__group *[type="submit"]').attr('disabled', 'disabled');
	
	let items = $('#gwolle_gb_messages_top_container, #gwolle_gb_new_entry'),
		showHideBtn = $('#gwolle_gb_write_button, .gb-notice-dismiss'),
		justForm = $('#gwolle_gb_new_entry'),
		target = $('.info__part');
		
	items.appendTo(target);	
	showHideBtn.hide();
	justForm.show();
	
});
