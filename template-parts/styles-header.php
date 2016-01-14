<?php
    //Charger les variables d'Option Framework
    $navbar_on = of_get_option( 'navbar-on' );
    $navbar_position = of_get_option( 'navbar-position' );
    $navbar_transparent = of_get_option( 'navbar-transparent' );
    $navbar_translucent = of_get_option( 'navbar-translucent' );
    $navbar_color = of_get_option( 'navbar-color' );
    $left_panel_on = of_get_option( 'left-panel-on' );
    $left_panel_color = of_get_option( 'left-panel-color' );
    $right_panel_on = of_get_option( 'right-panel-on' );
    $right_panel_color = of_get_option( 'right-panel-color' );
    $background = of_get_option( 'style-background' );
    $cover = of_get_option( 'style-cover' );
    $bt_radius = of_get_option( 'button-radius' );
    $bt_background = of_get_option( 'button-background' );
    $bt_text = of_get_option( 'button-text' );
    $bt_hover_background = of_get_option( 'button-hover-background' );
    $bt_hover_text = of_get_option( 'button-hover-text' );
    $custom_css = of_get_option( 'custom-css' );
    $footer_color = of_get_option( 'footer-color' );
 ?>

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
    <?php } ?>
    }
    <?php
    // On définit l'opacité de la navbar
    if ( $navbar_on && $navbar_transparent && $navbar_position == 'navbar-fixed-top' ){ ?>
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
    } ?>
    
    <?php if ( $navbar_on ) { ?>
    /* Navbar */
    .navbar{
      background: <?php echo $navbar_color ?>;
    }
    <?php } ?>
        
    /* Custom buttons */
    .btn{
      border-radius: <?php echo $bt_radius ?>px;
    }    
        
    .btn-custom {
      color: <?php echo $bt_text ?>;
      background-color: <?php echo $bt_background ?>;
    }
    .btn-custom:hover,
    .btn-custom:focus,
    .btn-custom:active,
    .btn-custom.active{
      color: <?php echo $bt_hover_text ?>;
      background-color: <?php echo $bt_hover_background ?>;
    }

    <?php if ($custom_css) {echo $custom_css;}?>
    
    <?php if ( $navbar_on ) { ?>    
    body.home #site-navigation.navbar.top-nav-collapse {
      background-color: <?php echo $navbar_color ?> !important;
    }
    <?php } ?>
    
    /* Footer & colophon */
    #secondary-bg,
    #colophon-bg {
      background-color: <?php echo $footer_color ?>;
    }
</style>