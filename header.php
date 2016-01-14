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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?php
        //Charger les variables d'Option Framework
        $logo = of_get_option( 'general-logo' );
        $responsive = of_get_option( 'general-responsive' );
        $page_transition = of_get_option( 'page-transition' );
        $page_transition_in = of_get_option( 'page-transition-in' );
        $page_transition_out = of_get_option( 'page-transition-out' );
        $navbar_on = of_get_option( 'navbar-on' );
        $navbar_position = of_get_option( 'navbar-position' );
        $navbar_transparent = of_get_option( 'navbar-transparent' );
        $left_panel_on = of_get_option( 'left-panel-on' );
        $right_panel_on = of_get_option( 'right-panel-on' );
        $boxed = of_get_option( 'general-boxed' );
        
        if ($logo){$body_logo = 'logo-on';} else {$body_logo = 'logo-off';};
        if ($navbar_transparent){$body_transparent = 'transparent-on';} else {$body_transparent = 'transparent-off';};
        if ($navbar_position == 'navbar-static-top'){$body_position = 'static-top';};
        if ($navbar_position == 'navbar-fixed-top'){$body_position = 'fixed-top';};
        if ($navbar_position == 'navbar-fixed-slider'){$body_position = 'fixed-slider';};
        if ($navbar_position == 'navbar-fixed-bottom'){$body_position = 'fixed-bottom';};
        
        if ( $responsive ) { //Fonction à compléter mais c'est un bon début ?>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php } ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <?php get_template_part( 'template-parts/styles', 'header' ) ?>    
    
    <?php get_template_part( 'template-parts/scripts', 'header' ) ?>
    
</head>
<?php if ( $responsive != 1 ) { $unresponsive = 'ur'; } else { $unresponsive = ''; } ?>
<body <?php body_class( array( $unresponsive, $body_transparent, $body_position, $body_logo));?>>
    <?php if( $left_panel_on || $right_panel_on ){ ?>
        <div class="panel-page-container">
            <?php } ?>
            <div class="page-container<?php if( $page_transition ) { ?> animsition<?php } ?>"<?php if( $page_transition ) { ?> data-animsition-in="<?php echo $page_transition_in ?>" data-animsition-out="<?php echo $page_transition_out ?>"<?php } ?>>   
                
        <div id="page" class="hfeed site<?php if ( $boxed ){ echo ' container'; } ?>" <?php if ( $boxed ){ echo ' style="padding:0"'; } ?>>
            
            <?php if( $left_panel_on ){ get_template_part( 'template-parts/panel', 'left' ); } ?>
            <?php if( $right_panel_on ){ get_template_part( 'template-parts/panel', 'right' ); } ?>
            
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'startup-reloaded' ); ?>
            </a>

            <?php if( ($navbar_on && $navbar_position != 'navbar-fixed-slider') || ( $navbar_on && !is_front_page()) ){ get_template_part( 'template-parts/navbar', 'primary' ); } ?>
        

            <div id="content" class="site-content">