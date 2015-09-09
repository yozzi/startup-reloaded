// $ à la place de jQuery dans WordPress
var $ = jQuery.noConflict();

//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 80) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//Slider
var $slider = $('#slider');
 
// Initialize carousel
$slider.carousel({
  //interval: 4000
});
 
function doAnimations(elems) {
  var animEndEv = 'webkitAnimationEnd animationend';
   
  elems.each(function () {
    var $this = $(this),
        $animationType = $this.data('animation');
 
    // Add animate.css classes to
    // the elements to be animated 
    // Remove animate.css classes
    // once the animation event has ended
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}
 
// Select the elements to be animated
// in the first slide on page load
var $firstAnimatingElems = $slider.find('.item:first')
                           .find('[data-animation ^= "animated"]');
 
// Apply the animation using our function
doAnimations($firstAnimatingElems);

// Animate carousel height change
//Désactivé, ça déconne dans le modal : le premier slide a une hauteur de 0px
//function bsCarouselAnimHeight()
//{
//    $('.carousel').carousel({
//        interval: 5000
//    }).on('slide.bs.carousel', function (e)
//    {
//        var nextH = $(e.relatedTarget).height();
//        $(this).find('.active.item').parent().animate({ height: nextH }, 500);
//    });
//}
//
//bsCarouselAnimHeight();
 
// Pause the carousel 
//$slider.carousel('pause');
 
// Attach our doAnimations() function to the
// carousel's slide.bs.carousel event 
$slider.on('slide.bs.carousel', function (e) { 
  // Select the elements to be animated inside the active slide 
  var $animatingElems = $(e.relatedTarget)
                        .find("[data-animation ^= 'animated']");
  doAnimations($animatingElems);
});


// Carousel Swipe touch
$(document).ready(function() {

//Enable swiping...
$(".carousel-inner").swipe( {
    //Generic swipe handler for all directions
    swipeLeft:function(event, direction, distance, duration, fingerCount) {
        $(this).parent().carousel('prev');
    },
    swipeRight: function() {
        $(this).parent().carousel('next');
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
    threshold:0
    });
});


// Smooth Scroll to anchor

$(".scroll").on('click', function(e) {
// prevent default anchor click behavior
e.preventDefault();
// animate
$('html, body').animate({
scrollTop: $(this.hash).offset().top - 50
}, 400, function(){

// when done, add hash to url
// (default click behaviour)
//window.location.hash = this.hash;
});
});


//animate.css
//jQuery(document).ready(function() {
//
//jQuery('.st_bounceInLeft').addClass("bt_hidden").viewportChecker({
//classToAdd: 'bt_visible animated bounceInLeft', 
//offset: 0, 
//repeat: true, 
//callbackFunction: function(elem, action){},
//scrollHorizontal: false 
//});
//
//
//jQuery('.st_fadeIn').addClass("bt_hidden").viewportChecker({
//classToAdd: 'bt_visible animated fadeIn', 
//offset: 0, 
//repeat: true, 
//callbackFunction: function(elem, action){},
//scrollHorizontal: false 
//});
//
//jQuery('.st_zoomIn').addClass("bt_hidden").viewportChecker({
//classToAdd: 'bt_visible animated zoomIn', 
//offset: 0, 
//repeat: true, 
//callbackFunction: function(elem, action){},
//scrollHorizontal: false 
//});
//
//jQuery('.st_rotateIn').addClass("bt_hidden").viewportChecker({
//classToAdd: 'bt_visible animated rotateIn', 
//offset: 0, 
//repeat: true, 
//callbackFunction: function(elem, action){},
//scrollHorizontal: false 
//});
//
//
//
//});


// Ajouter une class au ul des widgets
$( document ).ready(function() {
    $('.widget > ul').addClass('list-unstyled');
});

//mmenu left
$(function() {
    $('nav#menu-left').mmenu({
        slidingSubmenus : false,
        extensions	: [ 'effect-slide-menu', 'border-full', 'effect-zoom-panels' ],
        navbars		: [
            {
                position	: 'top',
                content		: [
                    'close'
                ]
            }
        ]
    });
});

//mmenu right
$(function() {
    $('nav#menu-right').mmenu({
        offCanvas: {
            position: "right"
         },
        slidingSubmenus : false,
        extensions	: [ 'effect-slide-menu', 'border-full', 'effect-zoom-panels' ],
        navbars		: [
            {
                position	: 'top',
                content		: [
                    'close'
                ]
            }
        ]
    });
});

// Animsition
$( document ).ready(function() {
    $(".animsition").animsition({
    inDuration            :    1000,
    outDuration           :    800,
    //linkElement           :   '.animsition-link',
    linkElement   :   'a:not([target="_blank"]):not([href^=#]):not([class="no-animsition"])',
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
    //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    
    overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });
});

// Milestones
$(document).ready(function( $ ) {
$('.milestone-count').counterUp({
delay: 50, // the delay time in ms
time: 3500 // the speed time in ms
});
});

//YTPlayer
$(function(){
      $(".player").YTPlayer();
    });

//Fastclick
$(function() {
    FastClick.attach(document.body);
});

//Magnific Popup
$(document).ready(function() {
  $('#project-gallery a').magnificPopup({
      type:'image',
      gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
      mainClass: 'mfp-with-zoom mfp-img-mobile',
      zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
  
  
  
  });
});

//Scroll to top
$(function(){
 
	$(document).on( 'scroll', function(){
 
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
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 200, 'linear');
}

//Shuffle Products
//On utilise imagesloaded pour que Shuffle ne fasse pas de bug d'overlapping avec les tailles d'images responsives

$('#shuffle').imagesLoaded( function() {
  // images have loaded
     
    /* initialize shuffle plugin */
    var $grid = $('#shuffle');
         
    $grid.shuffle({
        itemSelector: '.item' // the selector for the items in the grid
    });
    
    $('#filter a').click(function (e) {
    e.preventDefault();
         
    // set active class
    $('#filter a').removeClass('active');
    $(this).addClass('active');
         
    // get group name from clicked item
    var groupName = $(this).attr('data-group');
         
    // reshuffle grid
    $grid.shuffle('shuffle', groupName );
});
 
});