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
jQuery(document).ready(function () {
    jQuery('.widget > ul').addClass('list-unstyled');
});

//Scroll to top
jQuery(function () {

    jQuery(document).on('scroll', function () {

        if (jQuery(window).scrollTop() > 300) {
            jQuery('.scroll-top-wrapper').removeClass('fadeOutDownBig');
            jQuery('.scroll-top-wrapper').addClass('show animated fadeInUpBig');
        } else {
            jQuery('.scroll-top-wrapper').removeClass('show');
            jQuery('.scroll-top-wrapper').addClass('animated fadeOutDownBig');
        }
    });

    jQuery('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
    verticalOffset = typeof (verticalOffset) !== 'undefined' ? verticalOffset : 0;
    element = jQuery('body');
    offset = element.offset();
    offsetTop = offset.top;
    jQuery('html, body').animate({
        scrollTop: offsetTop
    }, 2000, 'swing');
}

// Ajouter une class aux éléments d'un menu (pour hover.css)
jQuery(document).ready(function () {
    jQuery('#fullscreen-panel li > a').addClass('hvr-grow');
});

// Font awesome only, on evite le flickering
jQuery(document).ready(function () {
    jQuery('.fa-only').parent().contents().filter(function(){
        return this.nodeType === 3;
    }).remove();
    jQuery('.navbar-nav').show();
});