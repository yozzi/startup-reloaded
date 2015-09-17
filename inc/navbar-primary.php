<header id="masthead" class="site-header" role="banner">

    <?php
        $navbar_position = of_get_option( 'navbar-position' );
        $navbar_logo_position = of_get_option( 'navbar-logo-position' );
        $navbar_menu_position = of_get_option( 'navbar-menu-position' );
        $navbar_hamburger_position = of_get_option( 'navbar-hamburger-position' );
        $navbar_inverse = of_get_option( 'navbar-inverse' );
        $navbar_transparent = of_get_option( 'navbar-transparent' );
        $boxed = of_get_option( 'general-boxed' );
        $fullscreen_panel_on = of_get_option( 'fullscreen-panel-on' );
        $fullscreen_panel_hamburger = of_get_option( 'fullscreen-panel-hamburger' );
        $fullscreen_panel_hamburger_text = of_get_option( 'fullscreen-panel-hamburger-text' );
$left_panel_on = of_get_option( 'left-panel-on' );
        $left_panel_hamburger = of_get_option( 'left-panel-hamburger' );
        $left_panel_hamburger_text = of_get_option( 'left-panel-hamburger-text' );
$right_panel_on = of_get_option( 'right-panel-on' );
        $right_panel_hamburger = of_get_option( 'right-panel-hamburger' );
        $right_panel_hamburger_text = of_get_option( 'right-panel-hamburger-text' );
    ?>

    <nav id="site-navigation" class="navbar navbar-default <?php if( $boxed ){ echo 'navbar-boxed '; }  echo $navbar_position; if ($navbar_inverse) { echo ' navbar-inverse'; }; ?> <?php if ($navbar_transparent  && ( $navbar_position == 'navbar-fixed-top' ) && is_front_page()) { echo 'navbar-transparent'; }; ?>" role="navigation">
        <!– Brand and toggle get grouped for better mobile display –>
        <div class="container">
            <?php if ( has_nav_menu( 'navbar-primary' ) ) { ?>
                    <?php if ($responsive == 1) { ?>
                        <button type="button" class="navbar-toggle <?php if ($navbar_hamburger_position == 'navbar-left') {echo 'left-toggle';} else {echo 'right-toggle';}?>" data-toggle="collapse" data-target=".navbar-sur-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                    <?php } ?>
                <?php } ?>
            <div class="navbar-header <?php echo $navbar_logo_position; ?>">
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            
            <!-- Non-collapsing fullscreen panel menu item -->
             <?php if ( $fullscreen_panel_on && $fullscreen_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $fullscreen_panel_hamburger_text ){ ?>
                        <li>
                            <a data-toggle="modal" data-target="#fullscreen-panel" href="#"><?= $fullscreen_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon">
                            <button id="fullscreen-panel-button" type="button" class="custom-hamburger navbar-toggle navbar-toggle hvr-push" data-toggle="modal" data-target="#fullscreen-panel">
                                <span class="sr-only">Toggle fullscreen panel</span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
            <!-- Non-collapsing right panel menu item -->
             <?php if ( $right_panel_on && $right_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $right_panel_hamburger_text ){ ?>
                        <li>
                            <a href="#right-panel"><?= $right_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon">
                            <button id="right-panel-button" type="button" class="custom-hamburger navbar-toggle navbar-toggle hvr-push">
                                <span class="sr-only">Toggle right panel</span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
             <!-- Non-collapsing left panel menu item -->
             <?php if ( $left_panel_on && $left_panel_hamburger ){ ?>
                <ul class="nav navbar-nav navbar-right non-collapsing">
                    <?php if ( $left_panel_hamburger_text ){ ?>
                        <li>
                            <a href="#left-panel"><?= $left_panel_hamburger_text ?></a>
                        </li>
                     <?php } else { ?>
                        <li class="icon">
                            <button id="left-panel-button" type="button" class="custom-hamburger navbar-toggle hvr-push">
                                <span class="sr-only">Toggle left panel</span>
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </li>
                       <?php } ?>    
                </ul>
            <?php } ?>
            
            <?php if ( has_nav_menu( 'navbar-primary' ) ) { ?>
            <!– Collect the nav links, forms, and other content for toggling –>
            <div class="<?php if ($responsive == 1) { ?>collapse navbar-collapse navbar-sur-collapse <?php } ?><?php echo $navbar_menu_position; ?>">
                <?php wp_nav_menu(array( 'menu'=> 'navbar-primary', 'theme_location' => 'navbar-primary', 'depth' => 2, 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'wp_page_menu', 'walker' => new wp_bootstrap_navwalker()) ); ?>
            </div>
            <!– /.navbar-collapse –>
            <?php } ?>
        </div>
        <!– /.container –>
    </nav>
<!– #site-navigation –>
                        
                        

            </header>