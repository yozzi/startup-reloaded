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
var $firstAnimatingElems = $slider.find('.item:first').find('[data-animation ^= "animated"]');
 
// Apply the animation using our function
doAnimations($firstAnimatingElems);
 
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

// Ajouter une class au ul des widgets
$( document ).ready(function() {
    $('.widget > ul').addClass('list-unstyled');
});

//Fastclick
$(function() {
    FastClick.attach(document.body);
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