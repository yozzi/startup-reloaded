<?php

require get_template_directory() . '/inc/theme-options.php';

?>

<style>
    <?php if ( $background['color'] || $background['image'] ) { ?>
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
    <?php } ?>
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
    
    /* Menu class helpers */
    <?php if ( is_user_logged_in () ) { ?>
    .logged-out{
      display: none !important;
    }
    <?php } else { ?>
    .logged-in{
      display: none !important;
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