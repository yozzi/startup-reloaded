<?php

require get_template_directory() . '/inc/theme-options.php';

?>

<?php if ($navbar_position == 'navbar-fixed-header') { ?>
    <div id="navbar-spacer">
        <header id="masthead" class="site-header" role="banner" data-spy="affix">
<?php } elseif (is_front_page() && $navbar_position == 'navbar-fixed-slider') { ?>
    <div id="navbar-spacer">
        <header id="masthead" class="site-header" role="banner" data-spy="affix" <?php if ($slider_height !='100%') { ?>data-offset-top="<?php echo $slider_height ?>"<?php } ?>>
<?php } else { ?>
    <header id="masthead" class="site-header" role="banner">    
<?php } ?>
    <?php if ( $navbar_position == 'navbar-normal' ) { ?><div class="container"><?php } ?>
    <nav id="site-navigation" class="navbar navbar-default<?php if($logo){echo ' logo';} ?> <?php if( $boxed && $navbar_position != 'navbar-normal' ){ echo 'container '; }  echo $navbar_position; if ($navbar_inverse) { echo ' navbar-inverse'; }; if ($navbar_position == 'navbar-fixed-slider' && !is_front_page()) { echo ' navbar-fixed-top'; }; ?> <?php if ($navbar_transparent  && ( $navbar_position == 'navbar-fixed-top' ) && is_front_page()) { echo 'navbar-transparent'; }; ?>" role="navigation">
        <?php //Brand and toggle get grouped for better mobile display ?>
        <?php if ( $navbar_position != 'navbar-normal' && !$boxed ) { ?><div class="container"><?php } ?>
        <?php if ( $navbar_position != 'navbar-normal' && $boxed ) { ?><div class="row"><?php } ?>
            <?php if ( has_nav_menu( 'navbar-primary' ) ) { ?>
                    <?php if ($responsive == 1) { ?>
                        <button type="button" class="navbar-toggle <?php if ($navbar_hamburger_position == 'navbar-left') {echo 'left-toggle';} else {echo 'right-toggle';}?>" data-toggle="collapse" data-target=".navbar-sur-collapse">
                            <span class="sr-only"><?php _e( 'Toggle navigation', 'startup-reloaded' ) ?></span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                    <?php } ?>
                <?php } ?>
            <?php if ( $navbar_logo_position ) { ?>
                <div class="navbar-header <?php echo $navbar_logo_position; ?>">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url() ) ?>">
                        <?php if ( $logo ) {?>
                        <img src="<?php echo $logo ?>" alt="<?php bloginfo('name'); ?>" />
                        <?php } else {?>
                        <?php bloginfo('name'); ?>
                        <?php } ?>
                    </a>
                </div>
            <?php } ?>
            
            <?php //Non-collapsing fullscreen panel menu item ?>
            <?php if ( $fullscreen_panel_on && $fullscreen_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $fullscreen_panel_hamburger_text ){ ?>
                        <li>
                            <a data-toggle="modal" data-target="#fullscreen-panel" href="#"><?php echo $fullscreen_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon hvr-push">
                            <button id="fullscreen-panel-button" type="button" class="custom-hamburger navbar-toggle" data-toggle="modal" data-target="#fullscreen-panel">
                                <span class="sr-only"><?php _e( 'Toggle fullscreen panel', 'startup-reloaded' ) ?></span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
            <?php //Non-collapsing right panel menu item ?>
             <?php if ( $right_panel_on && $right_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $right_panel_hamburger_text ){ ?>
                        <li>
                            <a href="#right-panel"><?php echo $right_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon hvr-push">
                            <button id="right-panel-button" type="button" class="custom-hamburger navbar-toggle">
                                <span class="sr-only"><?php _e( 'Toggle right panel', 'startup-reloaded' ) ?></span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
             <?php //Non-collapsing left panel menu item ?>
             <?php if ( $left_panel_on && $left_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $left_panel_hamburger_text ){ ?>
                        <li>
                            <a href="#left-panel"><?php echo $left_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon hvr-push">
                            <button id="left-panel-button" type="button" class="custom-hamburger navbar-toggle">
                                <span class="sr-only"><?php _e( 'Toggle left panel', 'startup-reloaded' ) ?></span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
            <?php if ( has_nav_menu( 'navbar-primary-non-collapsing' ) ) { ?>
                <?php wp_nav_menu(array( 'menu'=> 'navbar-primary-non-collapsing', 'theme_location' => 'navbar-primary-non-collapsing', 'depth' => 2, 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right non-collapsing', 'fallback_cb' => 'wp_page_menu', 'walker' => new wp_bootstrap_navwalker()) ); ?>
            <?php } ?>
            
            
            <?php if ( has_nav_menu( 'navbar-primary' ) ) { ?>
                <?php //Collect the nav links, forms, and other content for toggling ?>
                <div class="<?php if ($responsive == 1) { ?>collapse navbar-collapse navbar-sur-collapse <?php } ?><?php echo $navbar_menu_position; ?>">
                    <?php wp_nav_menu(array( 'menu'=> 'navbar-primary', 'theme_location' => 'navbar-primary', 'depth' => 2, 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'wp_page_menu', 'walker' => new wp_bootstrap_navwalker()) ); ?>
                </div>
                <?php // /.navbar-collapse ?>
            <?php } ?>
            
            <?php if ( $search ) { ?>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li class="dropdown">
                        <button type="button" data-toggle="dropdown" class="btn btn-custom navbar-btn dropdown-toggle"><i class="fa fa-search"></i></button>
                        <ul class="dropdown-menu">
                            <li><?php get_search_form(); ?></li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
        <?php if ( $navbar_position != 'navbar-normal' && $boxed ) { ?></div><?php } ?>
        <?php if ( $navbar_position != 'navbar-normal' && !$boxed ) { ?></div><?php } ?>
        <?php // /.container ?>
    </nav>
<?php // #site-navigation ?>
<?php if ( $navbar_position == 'navbar-normal' ) { ?></div><?php } ?>
</header>
<?php if ((is_front_page() && $navbar_position == 'navbar-fixed-slider') || ($navbar_position == 'navbar-fixed-header') ) { ?></div><?php } ?>