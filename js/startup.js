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

//Fastclick
$(function () {
    FastClick.attach(document.body);
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
    }, 200, 'linear');
}

// Ajouter une class aux éléments d'un menu (pour hover.css)
$(document).ready(function () {
    $('#fullscreen-panel li > a').addClass('hvr-grow');
});

// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
//$('.dropdown').on('show.bs.dropdown', function(e){
//    $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
//});

// ADD SLIDEUP ANIMATION TO DROPDOWN //
//$('.dropdown').on('hide.bs.dropdown', function(e){
//    $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
//});

////animate.css		
//jQuery(document).ready(function() {
//    jQuery('#products .product-thumbnail').viewportChecker({
//        classToAdd: 'animated bounceIn',
//        offset: 100,
//        repeat: true,
//        callbackFunction: function(elem, action){},
//        scrollHorizontal: false
//    });
//});