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

        if ( $responsive ) { //Fonction à compléter mais c'est un bon début ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php } ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <style>
    body{
    <?php
    if ( $background['color'] ) { ?>  background-color: <?php echo $background['color'] ?>;
    <?php }
    if ( $background['image'] ) { ?>  background-image: url(<?php echo $background['image'] ?>);
    <?php }
    if ( $background['repeat'] && $background['image'] ) { ?>  background-repeat: <?php echo $background['repeat'] ?>;
    <?php }
    if ( $background['position'] && $background['image'] ) { ?>  background-position: <?php echo $background['position'] ?>;
    <?php }
    if ( $background['attachment'] && $background['image'] ) { ?>  background-attachment: <?php echo $background['attachment'] ?>;
    <?php }
    if ( $cover && $background['image']) { ?>  background-size: cover;
    <?php }
    ?>
    }
    <?php
    // On définit le padding-top du body en fonction des options choisies
    if ( $navbar_position == 'navbar-fixed-top' && $navbar_transparent != 1 ){
    $body_padding = $navbar_height;
    } else {
    $body_padding = '0';
    }
    if  ( $navbar_position == 'navbar-fixed-bottom' ){ ?>
    body{
      padding-bottom: <?php echo $navbar_height; ?>px;
    }
    <?php }
    if ( $navbar_transparent && $navbar_position == 'navbar-fixed-top' ){ ?>
    @media (min-width: 768px){
      body.home #site-navigation.navbar{
        background-color: transparent !important;
      }
    }
    <?php }
    if ($left_panel_on){
        if ($left_panel_color){ ?>
            #left-panel.mm-menu{
                background: <?php echo $left_panel_color ?>;
            }
        <?php }
    }    
    if ($right_panel_on){
        if ($right_panel_color){ ?>
            #right-panel.mm-menu{
                background: <?php echo $right_panel_color ?>;
            }
        <?php }
    }  
        
        
        
        
    ?>
        
        
        
        
    </style>

    <?php if ( $ga ) : ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?php echo $ga; ?>', 'auto');
            ga('send', 'pageview');
        </script>
    <?php endif ?>

    <?php if( $left_panel_on ){ ?>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('nav#left-panel').mmenu({
                    slidingSubmenus : true,
                    extensions	: [ 'effect-slide-menu', 'border-full'<?php if( $left_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $left_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
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
        </script>
    <?php } ?>

    <?php if( $right_panel_on ){ ?>
        <script type="text/javascript">
            jQuery(function() {
                jQuery('nav#right-panel').mmenu({
                    offCanvas: {
                        position: "right"
                     },
                    slidingSubmenus : true,
                    
                    extensions	: [ 'effect-slide-menu', 'border-full'<?php if( $right_panel_theme == 'theme-dark' ){ ?>, 'theme-dark'<?php } ?><?php if( $right_panel_mode == 'tileview' ){ ?>, 'tileview'<?php } ?> ],
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
<body <?php body_class( $unresponsive ); if ( is_front_page() ) { echo ' style="padding-top:' . $body_padding . 'px"'; } ?>>
    <?php if( $left_panel_on || $right_panel_on ) { ?><div class="panel-page-container"><?php } ?>
        <?php if( $page_transition ) { ?>
            <div class="animsition" data-animsition-in="<?php echo $page_transition_in; ?>" data-animsition-out="<?php echo $page_transition_out; ?>">
        <?php } ?>
        <div id="page" class="hfeed site<?php if ( $boxed ){ echo ' container'; } ?>" <?php if ( $boxed ){ echo ' style="padding:0"'; } ?>>
            <?php if( $left_panel_on ){ require get_template_directory() . '/inc/left-panel.php'; } ?>
            <?php if( $right_panel_on ){ require get_template_directory() . '/inc/right-panel.php'; } ?>
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'startup-reloaded' ); ?>
            </a>

            <?php if( $navbar_on ){ require get_template_directory() . '/inc/navbar-primary.php'; } ?>

            <div id="content" class="site-content"<?php if ( !is_front_page() && $navbar_position != 'navbar-fixed-bottom'){echo ' style="padding-top:' . $navbar_height . 'px"'; }?>>