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
        video: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 4000,
        dots: true
    });
    $(".testimonials__carousel .owl-carousel").owlCarousel({
        items: 1,
        video: true,
        loop: true,
        dots: true
    });
});
