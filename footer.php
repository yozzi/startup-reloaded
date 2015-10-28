<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package StartUp Reloaded
 */

$page_transition = of_get_option( 'page-transition' );
$back_to_top = of_get_option( 'general-back-to-top' );
$footer = of_get_option( 'general-footer' );
$blog_style = of_get_option( 'blog-style' );
$portfolio_style = of_get_option( 'portfolio-style' );
$fullscreen_panel_on = of_get_option( 'fullscreen-panel-on' );
$left_panel_on = of_get_option( 'fullscreen-panel-on' );
$right_panel_on = of_get_option( 'right-panel-on' );
$navbar_position = of_get_option( 'navbar-position' );
$navbar_transparent = of_get_option( 'navbar-transparent' );
$slider_on = of_get_option( 'slider-on' );
$slider_height = of_get_option( 'slider-height' );
$navbar_transparent = of_get_option( 'navbar-transparent' );
$logo = of_get_option( 'general-logo' );

if ( $navbar_position == 'navbar-fixed-top' ) {
    $scroll_offset = 50;
} elseif ( $navbar_position == 'navbar-fixed-slider' ){
    $scroll_offset = 50;
} else {
    $scroll_offset = 0;
}

?>

	</div><!-- #content -->
    <div id="colophon-bg">
        <footer id="colophon" class="container site-footer" role="contentinfo">
            <?php if ( has_nav_menu( 'navbar-bottom' ) ) { ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php require get_template_directory() . '/inc/navbar-bottom.php' ?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="row site-info">
                <div class="col-xs-12">
                <?php echo $footer ?>
                </div>
            </div><!-- .site-info -->
        </footer><!-- #colophon -->
    </div>
</div><!-- #page -->

<?php if( $fullscreen_panel_on ){ require get_template_directory() . '/inc/fullscreen-panel.php'; } ?>

<?php wp_footer(); ?>

<script type="text/javascript">
    // Smooth Scroll to anchor
    
    jQuery(".scroll").on('click', function (e) {
        // prevent default anchor click behavior
        e.preventDefault();
        // animate
        jQuery('html, body').animate({
            scrollTop: jQuery(this.hash).offset().top - <?php echo $scroll_offset ?>
        }, 400, function () {
            // when done, add hash to url
            // (default click behaviour)
            //window.location.hash = this.hash;
        });
    });
</script>
<?php if ($slider_on && $slider_height == '100%') { ?>
    <script type="text/javascript">
        <?php
            if(($navbar_position == 'navbar-static-top') || ($navbar_position == 'navbar-fixed-top' && !$navbar_transparent) || ($navbar_position == 'navbar-fixed-bottom') || ($navbar_position == 'navbar-fixed-slider')){
                if($logo){
                    $slider_offset = 95;
                } else {
                    $slider_offset = 50;
                };
            } else {
                $slider_offset = 0;
            }
        ?>
        function showViewportSize() {
            var the_height = jQuery(window).height() - <?php echo $slider_offset ?>;                   
            jQuery('#slider .item').css("height",the_height);
            <?php if ( $navbar_position == 'navbar-fixed-slider' ) { ?>
                jQuery('#masthead').affix({
                  offset: {
                    top: function() { return jQuery('#slider').height(); }
                  }
                }); 
            <?php } ?>
        }
        jQuery(document).ready(function(e) {
            showViewportSize();    
        });
        jQuery(window).resize(function(e) {
            showViewportSize();
        });
    </script>
<?php } ?>

<?php if ($navbar_position == 'navbar-fixed-slider') { ?>
<!-- A finir
    <script type="text/javascript">
        var midHeight = jQuery(window).height() / 2 //Splits screen in half
        var scrollTop = jQuery(window).scrollTop(),
        elementOffset = jQuery('#masthead').offset().top,
        distance      = (elementOffset - scrollTop);

        jQuery(window).scroll(function () {
            if (distance > midHeight) {
                //Do something on bottom
                //alert("Bellow 50%!");
            } else {
                //Do something on top
                alert("Above 50%!");
            }
        })
    </script>
-->
<?php } ?>

<?php  if( $blog_style == 'shuffle' || $portfolio_style == 'shuffle' || is_plugin_active('startup-cpt-products/startup-cpt-products.php')){ ?>
    <script type="text/javascript">
       //On utilise imagesloaded pour que Shuffle ne fasse pas de bug d'overlapping avec les tailles d'images responsives

        jQuery('#shuffle').imagesLoaded( function() {
          // images have loaded

            /* initialize shuffle plugin */
            var $grid = jQuery('#shuffle');

            $grid.shuffle({
                itemSelector: '.item' // the selector for the items in the grid
            });

            jQuery('#filter a').click(function (e) {
            e.preventDefault();

            // set active class
            jQuery('#filter a').removeClass('active');
            jQuery(this).addClass('active');

            // get group name from clicked item
            var groupName = jQuery(this).attr('data-group');

            // reshuffle grid
            $grid.shuffle('shuffle', groupName );
        });

        });
    </script>
<?php } ?>

<?php  if( is_plugin_active('startup-cpt-testimonials/startup-cpt-testimonials.php')){ ?>
    <script type="text/javascript">
        jQuery('#testimonials-carousel').carousel({
            interval: 0
        }).on('slide.bs.carousel', function (e){
            var nextH = jQuery(e.relatedTarget).height();
            jQuery(this).find('.active.item').parent().animate({ height: nextH }, 500);
        });
        
        jQuery('#testimonials-carousel').on('slid.bs.carousel', function () {
            jQuery(window).trigger('resize').trigger('scroll');
        })
    </script>
<?php } ?>

<?php if ( $back_to_top ) { ?>
    <div class="scroll-top-wrapper">
        <span class="scroll-top-inner">
            <i class="fa fa-chevron-up fa-lg"></i>
        </span>
    </div>
<?php } ?>
        </div>
<?php if( $left_panel_on || $right_panel_on ){ ?>
    </div>
<?php } ?>
</body>
</html>