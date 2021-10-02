$(document).ready(function () {
    $('.new-product-carousel').owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"]
    });

    $('.new-variety-carousel').owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"]
    });
});