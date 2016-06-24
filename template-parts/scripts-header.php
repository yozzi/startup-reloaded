<?php

require get_template_directory() . '/inc/theme-options.php';

?>

<?php if ($ga){ ?>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', '<?php echo $ga; ?>', 'auto');
        ga('send', 'pageview');
    </script>
<?php } ?>

<?php if ($navbar_on && $navbar_position == 'navbar-fixed-top'){ ?>
    <script type="text/javascript">
        //jQuery to collapse the navbar on scroll
        jQuery(window).scroll(function () {
            if (jQuery(".navbar").offset().top > 80) {
                jQuery(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                jQuery(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
        });
    </script>
<?php } ?>

<?php
    if( $left_panel_on || $right_panel_on ){
        $locations = get_registered_nav_menus();
        $menus = wp_get_nav_menus();
        $menu_locations = get_nav_menu_locations();
    }


    if( $left_panel_on ){
        $location_left_id = 'left-panel';
        $left_panel_title = __('Navigation', 'startup-reloaded');
        if (isset($menu_locations[ $location_left_id ])) {
            foreach ($menus as $menu) {
                if ($menu->term_id == $menu_locations[ $location_left_id ]) {
                    $left_panel_title = $menu->name;
                    break;
                }
            }
        } ?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('nav#left-panel').mmenu({
                onClick: {
                    close: true
                },
                <?php if( $left_panel_slide || $left_panel_mode == 'tileview' ){ ?>slidingSubmenus : true,<?php } else { ?>slidingSubmenus : false,<?php } ?>
                extensions	: [ 'border-full'<?php if( $left_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $left_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                navbar 		: {
                    title		: '<?php echo $left_panel_title ?>'
                },
                navbars		: [
                    {
                        position	: 'top',
                        content		: [
                            'prev',
                            'title',
                            'close'
                        ]
                    }
                ],
                "offCanvas": {
               <?php if( !$left_panel_push ){ ?>"zposition": "front",<?php } ?>
           }
            });
            var API = jQuery("nav#left-panel").data( "mmenu" );

              jQuery("#left-panel-button").click(function() {
                 API.open();
              });
        });
    </script>
<?php }

    if( $right_panel_on ){
        $location_right_id = 'right-panel';
        $right_panel_title = __('Navigation', 'startup-reloaded');
        if (isset($menu_locations[ $location_right_id ])) {
            foreach ($menus as $menu) {
                if ($menu->term_id == $menu_locations[ $location_right_id ]) {
                    $right_panel_title = $menu->name;
                    break;
                }
            }
        } ?>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('nav#right-panel').mmenu({
                offCanvas: {
                    position: "right",
                    <?php if( !$right_panel_push ){ ?>"zposition": "front",<?php } ?>
                 },
                onClick: {
                    close: true
                },
                <?php if( $right_panel_slide || $right_panel_mode == 'tileview' ){ ?>slidingSubmenus : true,<?php } else { ?>slidingSubmenus : false,<?php } ?>

                extensions	: [ 'border-full'<?php if( $right_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $right_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                navbar 		: {
                    title		: '<?php echo $right_panel_title ?>'
                },
                navbars		: [
                    {
                        position	: 'top',
                        content		: [
                            'prev',
                            'title',
                            'close'
                        ]
                    }
                ]
            });
            var API = jQuery("nav#right-panel").data( "mmenu" );

              jQuery("#right-panel-button").click(function() {
                 API.open();
              });
        });
    </script>
<?php } ?>

<?php if( $ytplayer ){ ?>
    <script type="text/javascript">
        jQuery(function(){
            jQuery(".player").YTPlayer();
        });
    </script>
<?php } ?>

<?php if( $page_transition ){ ?>
    <script type="text/javascript">
        jQuery( document ).ready(function() {
            jQuery(".animsition").animsition({
                inDuration            :    1000,
                outDuration           :    800,
                //linkElement           :   '.animsition-link',
                linkElement   :   'a:not([target="_blank"]):not([href^="#"]):not([class="no-animsition"]):not([class^="mm-prev"])',
                loading               :    true,
                loadingParentElement  :   'body', //animsition wrapper element
                loadingClass          :   'animsition-loading',
                unSupportCss          : [ 'animation-duration',
                                          '-webkit-animation-duration',
                                          '-o-animation-duration'
                                        ],
                overlay               :   false,
                overlayClass          :   'animsition-overlay-slide',
                overlayParentElement  :   'body'
            });
        });
    </script>
<?php } ?>

<!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/selectivizr.js"></script>
    <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/html5shiv.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/polyfills/respond.min.js"></script>
<![endif] -->