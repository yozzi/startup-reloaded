<?php require get_template_directory() . '/inc/theme-options.php'; ?>

<?php if ( $fastclick ) { ?>
<script type="text/javascript">
    //Fastclick
    
    jQuery(function () {
        FastClick.attach(document.body);
    });
</script>
<?php } ?>

<?php if ( $smoothscroll ) {
    if ( $navbar_position == 'navbar-fixed-top' || $navbar_position == 'navbar-fixed-slider' || $navbar_position == 'navbar-fixed-header' ) {
            $scroll_offset = 50;   
    } else {
        $scroll_offset = 0;
    }
?>
    <script type="text/javascript">
        // Smooth Scroll to anchor

        jQuery(".scroll").on('click', function (e) {
            // prevent default anchor click behavior
            e.preventDefault();
            // animate
            jQuery('html, body').animate({
                scrollTop: jQuery(this.hash).offset().top - <?php echo $scroll_offset ?>
            }, 2000, 'swing', function () {
                // when done, add hash to url
                // (default click behaviour)
                //window.location.hash = this.hash;
            });
        });
    </script>
<?php } ?>

<?php if ( $navbar_position == 'navbar-fixed-header' ) { ?>
    <script type="text/javascript">
        function guessHeaderHeight() {             
                jQuery('#masthead').affix({
                  offset: {
                    top: function() { return jQuery('header#head').height(); }
                  }
                });
        }
        jQuery(document).ready(function(e) {
            guessHeaderHeight();    
        });
        jQuery(window).resize(function(e) {
            guessHeaderHeight();
        });
    </script>
<?php } ?>

<?php if ($slider_on && is_plugin_active('startup-cpt-slider/startup-cpt-slider.php') && $slider_height == '100%' && is_front_page() ) { ?>
    <script type="text/javascript">
        <?php
            if($navbar_position == 'navbar-static-top' || ($navbar_position == 'navbar-fixed-top' && !$navbar_transparent) || $navbar_position == 'navbar-fixed-bottom' || $navbar_position == 'navbar-fixed-slider' || $navbar_position == 'navbar-static-header' || $navbar_position == 'navbar-fixed-header'){
                    $slider_offset = 50;
            } else {
                $slider_offset = 0;
            }
        ?>
        function guessSliderHeight() {
            var the_height = jQuery(window).height() - <?php echo $slider_offset ?> - jQuery('header#head').height();                
            jQuery('#slider .item').css("height",the_height);
            <?php if ( $navbar_position == 'navbar-fixed-slider' ) { ?>
                jQuery('#masthead').affix({
                  offset: {
                    top: function() { return jQuery('#slider').height() + jQuery('header#head').height(); }
                  }
                }); 
            <?php } ?>
        }
        jQuery(document).ready(function(e) {
            guessSliderHeight();    
        });
        jQuery(window).resize(function(e) {
            guessSliderHeight();
        });
    </script>
<?php } ?>

<?php if( $blog_style == 'shuffle' || $portfolio_style == 'shuffle' || is_plugin_active('startup-cpt-products/startup-cpt-products.php') || is_plugin_active('startup-cpt-catalog/startup-cpt-catalog.php') ){ ?>
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