<?php /** * The header for our theme. * * Displays all of the <head> section and everything up till
        <div id="content">
    * * @package StartUp Reloaded */

    $str = of_get_option( 'general-serial' );
    if (md5($str) == "b87c576bb0768f30e0ea7d0c6d3c3d96"){ echo 'serial ok'; }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <?php
        //Charger les variables d'Option Framework
        $responsive = of_get_option( 'general-responsive' );
        $ga = of_get_option( 'general-ga' ); //Code utilisateur Google Analyics
        $page_transition = of_get_option( 'page-transition' );
        $page_transition_in = of_get_option( 'page-transition-in' );
        $page_transition_out = of_get_option( 'page-transition-out' );
        $navbar_on = of_get_option( 'navbar-on' );
        $navbar_position = of_get_option( 'navbar-position' );
        $navbar_height = of_get_option( 'navbar-height' );
        $navbar_transparent = of_get_option( 'navbar-transparent' );
        $navbar_translucent = of_get_option( 'navbar-translucent' );
        $navbar_color = of_get_option( 'navbar-color' );
        $left_panel_on = of_get_option( 'left-panel-on' );
        $left_panel_color = of_get_option( 'left-panel-color' );
        $left_panel_theme = of_get_option( 'left-panel-theme' );
        $left_panel_mode = of_get_option( 'left-panel-mode' );
        $right_panel_on = of_get_option( 'right-panel-on' );
        $right_panel_color = of_get_option( 'right-panel-color' );
        $right_panel_theme = of_get_option( 'right-panel-theme' );
        $right_panel_mode = of_get_option( 'right-panel-mode' );
        $boxed = of_get_option( 'general-boxed' );
        $background = of_get_option( 'style-background' );
        $cover = of_get_option( 'style-cover' );
        $ytplayer = of_get_option( 'general-ytplayer' );
        $bt_radius = of_get_option( 'button-radius' );
        $bt_background = of_get_option( 'button-background' );
        $bt_text = of_get_option( 'button-text' );
        $bt_hover_background = of_get_option( 'button-hover-background' );
        $bt_hover_text = of_get_option( 'button-hover-text' );
        $bt_disabled_background = of_get_option( 'button-disabled-background' );
        $bt_badge_background = of_get_option( 'button-badge-background' );
        $bt_badge_text = of_get_option( 'button-badge-text' );
        $custom_css = of_get_option( 'custom-css' );
        $footer_color = of_get_option( 'footer-color' );

        if ( $responsive ) { //Fonction à compléter mais c'est un bon début ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php } ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

<style>
    body{
    <?php
    if ( $background['color'] ) { ?>  background-color: <?= $background['color'] ?>;
    <?php }
    if ( $background['image'] ) { ?>  background-image: url(<?= $background['image'] ?>);
    <?php }
    if ( $background['repeat'] && $background['image'] ) { ?>  background-repeat: <?= $background['repeat'] ?>;
    <?php }
    if ( $background['position'] && $background['image'] ) { ?>  background-position: <?= $background['position'] ?>;
    <?php }
    if ( $background['attachment'] && $background['image'] ) { ?>  background-attachment: <?= $background['attachment'] ?>;
    <?php }
    if ( $cover && $background['image']) { ?>  background-size: cover;
    <?php } ?>
    }
    <?php
    // On définit l'opacité de la navbar
    if ( $navbar_transparent && $navbar_position == 'navbar-fixed-top' ){ ?>
    @media (min-width: 768px){
      body.home #site-navigation.navbar{
        background-color: transparent !important;
      }
      <?php if ( $navbar_translucent ){ ?>
          body.home #site-navigation.navbar:hover{
            background-color: rgba(0, 0, 0, 0.25) !important;
          }
      <?php } ?>
    }
    <?php }
    if ($left_panel_on){
        if ($left_panel_color){ ?>
            #left-panel.mm-menu{
              background: <?= $left_panel_color ?>;
            }
        <?php }
    }    
    if ($right_panel_on){
        if ($right_panel_color){ ?>
            #right-panel.mm-menu{
              background: <?= $right_panel_color ?>;
            }
        <?php }
    } ?>
        
    /* Navbar */
    .navbar{
      background: <?= $navbar_color ?>;
    }
        
    /* Navbar Padding */
        
    body.startup-nav-navbar-fixed-top #content{
      padding-top: <?= $navbar_height ?>px;
    }

    body.home #content{
      padding-top: 0;
    }

    body.home.startup-nav-transparent.startup-nav-navbar-fixed-top .panel-page-container{
      padding-top: <?= $navbar_height ?>px;
    }

    body.startup-nav-navbar-fixed-bottom{
      padding-bottom: <?= $navbar_height ?>px;        
    }
        
    @media (max-width: 767px){
      body.home.startup-nav-transparent1.startup-nav-navbar-fixed-top .panel-page-container{
        padding-top:<?= $navbar_height ?>px;
      }
    }
   
    /* Custom buttons */
    .btn{
      border-radius: <?= $bt_radius ?>px !important;
    }    
        
    .btn-custom {
      color: <?= $bt_text ?>;
      background-color: <?= $bt_background ?>;
      border: none;
    }
    .btn-custom:hover,
    .btn-custom:focus,
    .btn-custom:active,
    .btn-custom.active,
    .open .dropdown-toggle.btn-custom {
      color: <?= $bt_hover_text ?>;
      background-color: <?= $bt_hover_background ?>;
      border: none;
      outline: none;
    }
    .btn-custom:active,
    .btn-custom.active,
    .open .dropdown-toggle.btn-custom {
      background-image: none;
    }
    .btn-custom.disabled,
    .btn-custom[disabled],
    fieldset[disabled] .btn-custom,
    .btn-custom.disabled:hover,
    .btn-custom[disabled]:hover,
    fieldset[disabled] .btn-custom:hover,
    .btn-custom.disabled:focus,
    .btn-custom[disabled]:focus,
    fieldset[disabled] .btn-custom:focus,
    .btn-custom.disabled:active,
    .btn-custom[disabled]:active,
    fieldset[disabled] .btn-custom:active,
    .btn-custom.disabled.active,
    .btn-custom[disabled].active,
    fieldset[disabled] .btn-custom.active {
      background-color: <?= $bt_disabled_background ?>;
      border: none;
      outline: none;
    }
    .btn-custom .badge {
      color: <?= $bt_badge_text ?>;
      background-color: <?= $bt_badge_background ?>;
    }
    
    <?php if ($custom_css) {echo $custom_css;}?>
        
    body.home #site-navigation.navbar.top-nav-collapse {
      background-color: <?= $navbar_color ?> !important;
    }
        
    /* Footer & colophon */
    #secondary-bg,
    #colophon-bg {
      background-color: <?= $footer_color ?>;
    }
</style>

    <?php if ($ga){ ?>
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?= $ga; ?>', 'auto');
            ga('send', 'pageview');
        </script>
    <?php } ?>
    
    <?php if ($navbar_on){ ?>
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
            if (isset($menu_locations[ $location_left_id ])) {
                foreach ($menus as $menu) {
                    // If the ID of this menu is the ID associated with the location we're searching for
                    if ($menu->term_id == $menu_locations[ $location_left_id ]) {
                        // This is the correct menu

                        // Get the items for this menu
                        $left_panel_title = $menu->name;

                        // Now do something with them here.
                        //
                        //
                        break;
                    }
                }
            } else {
                // The location that you're trying to search doesn't exist
                $left_panel_title = 'menu';
            } ?>
    
        <script type="text/javascript">
            jQuery(function() {
                jQuery('nav#left-panel').mmenu({
                    onClick: {
                        close: true
                    },
                    slidingSubmenus : false,
                    extensions	: [ 'border-full'<?php if( $left_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $left_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                    navbar 		: {
						title		: '<?= $left_panel_title ?>'
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
                  "zposition": "front"
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
                if (isset($menu_locations[ $location_right_id ])) {
                    foreach ($menus as $menu) {
                        // If the ID of this menu is the ID associated with the location we're searching for
                        if ($menu->term_id == $menu_locations[ $location_right_id ]) {
                            // This is the correct menu

                            // Get the items for this menu
                            $right_panel_title = $menu->name;

                            // Now do something with them here.
                            //
                            //
                            break;
                        }
                    }
                } else {
                    // The location that you're trying to search doesn't exist
                    $right_panel_title = 'menu';
                } ?>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('nav#right-panel').mmenu({
                    offCanvas: {
                        position: "right",
                        "zposition": "front"
                     },
                    onClick: {
                        close: true
                    },
                    slidingSubmenus : false,
                    
                    extensions	: [ 'border-full'<?php if( $right_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $right_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
                    navbar 		: {
						title		: '<?= $right_panel_title ?>'
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
    
    <?php if (is_plugin_active('startup-cpt-milestones/startup-cpt-milestones.php')){ ?>
        <script type="text/javascript">
            jQuery(document).ready(function( $ ) {
                jQuery('.milestone-count').counterUp({
                    delay: 50, // the delay time in ms
                    time: 3500 // the speed time in ms
                });
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
                    linkElement   :   'a:not([target="_blank"]):not([href^=#]):not([class="no-animsition"])',
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
    
</head>
<?php if ( $responsive != 1 ) { $unresponsive = 'ur'; } else { $unresponsive = ''; } ?>
<body <?php body_class( array( $unresponsive, 'startup-nav-transparent'. $navbar_transparent, 'startup-nav-'. $navbar_position));?>>
    <?php if( $left_panel_on || $right_panel_on ) { ?><div class="panel-page-container"><?php } ?>
        <?php if( $page_transition ) { ?>
            <div class="animsition" data-animsition-in="<?= $page_transition_in ?>" data-animsition-out="<?= $page_transition_out ?>">
        <?php } ?>
        <div id="page" class="hfeed site<?php if ( $boxed ){ echo ' container'; } ?>" <?php if ( $boxed ){ echo ' style="padding:0"'; } ?>>
            <?php if( $left_panel_on ){ require get_template_directory() . '/inc/left-panel.php'; } ?>
            <?php if( $right_panel_on ){ require get_template_directory() . '/inc/right-panel.php'; } ?>
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'startup-reloaded' ); ?>
            </a>
            <?php if( ($navbar_on && $navbar_position != 'navbar-static-slider') || ( $navbar_on && !is_front_page()) ){ require get_template_directory() . '/inc/navbar-primary.php'; } ?>
            

            <div id="content" class="site-content">