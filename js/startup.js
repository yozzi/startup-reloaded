// $ à la place de jQuery dans WordPress
var $ = jQuery.noConflict();

// Carousel Swipe touch
jQuery(document).ready(function () {

    //Enable swiping...
    jQuery(".carousel-inner").swipe({
        //Generic swipe handler for all directions
        swipeLeft: function (event, direction, distance, duration, fingerCount) {
            jQuery(this).parent().carousel('prev');
        },
        swipeRight: function () {
            jQuery(this).parent().carousel('next');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold: 0
    });
});

// Ajouter une class au ul des widgets
$(document).ready(function () {
    $('.widget > ul').addClass('list-unstyled');
});

//Scroll to top
$(function () {

    $(document).on('scroll', function () {

        if ($(window).scrollTop() > 300) {
            $('.scroll-top-wrapper').removeClass('fadeOutDownBig');
            $('.scroll-top-wrapper').addClass('show animated fadeInUpBig');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
            $('.scroll-top-wrapper').addClass('animated fadeOutDownBig');
        }
    });

    $('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
    verticalOffset = typeof (verticalOffset) !== 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({
        scrollTop: offsetTop
    }, 2000, 'swing');
}

// Ajouter une class aux éléments d'un menu (pour hover.css)
$(document).ready(function () {
    $('#fullscreen-panel li > a').addClass('hvr-grow');
});

// Font awesome only, on evite le flickering
$(document).ready(function () {
    $('.fa-only').parent().contents().filter(function(){
        return this.nodeType === 3;
    }).remove();
    $('.navbar-nav').show();
});