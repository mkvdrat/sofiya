document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("#menu", {
            "extensions": [
                "pagedim-black",
                "position-right"
            ]
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
    
    $('.check__block *[name="confirm"]').on('change', function () {
        if ($(this).is(':checked')) {
            $('.button__group *[type="submit"]').removeAttr('disabled');
        } else {
            $('.button__group *[type="submit"]').attr('disabled', 'disabled');
        }
    });
    
    $('.check__block *[name="confirm"]').prop( "checked", false );
    
    $('.button__group *[type="submit"]').attr('disabled', 'disabled');
});
