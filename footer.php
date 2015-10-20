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
            <div class="row site-info">
                <div class="col-xs-12">
                <?= $footer ?>
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
            scrollTop: jQuery(this.hash).offset().top - <?= $scroll_offset ?>
        }, 400, function () {
            // when done, add hash to url
            // (default click behaviour)
            //window.location.hash = this.hash;
        });
    });
</script>

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