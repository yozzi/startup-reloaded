<header id="masthead" class="site-header" role="banner">
                      
                    <?php
                        $navbar_position = of_get_option( 'navbar-position' );
                        $navbar_logo_position = of_get_option( 'navbar-logo-position' );
                        $navbar_menu_position = of_get_option( 'navbar-menu-position' );
                        $navbar_inverse = of_get_option( 'navbar-inverse' );
                        $navbar_transparent = of_get_option( 'navbar-transparent' );
                        $navbar_background_color = of_get_option( 'primary-color' );
                        $boxed = of_get_option( 'general-boxed' );
                    ?>
                    
                    
                    


                    
                    
                            <nav id="site-navigation" class="navbar navbar-default <?php if( $boxed ){ echo 'navbar-boxed '; }  echo $navbar_position; ?> <?php /*if ($navbar_inverse == 1) {*/ echo 'navbar-inverse'/*; };*/ ?> <?php if ($navbar_transparent  && ( $navbar_position == 'navbar-fixed-top' ) && is_front_page()) { echo 'navbar-transparent'; }; ?>" role="navigation">
                        <!– Brand and toggle get grouped for better mobile display –>
                        <div class="container">
                            <div class="navbar-header <?php echo $navbar_logo_position; ?>-sm">
                                <?php if ($responsive == 1) { ?>
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-sur-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar top-bar"></span>
                                        <span class="icon-bar middle-bar"></span>
                                        <span class="icon-bar bottom-bar"></span>
                                    </button>
                                <?php } ?>
                                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>

                            <!– Collect the nav links, forms, and other content for toggling –>
                            <div class="<?php if ($responsive == 1) { ?>collapse navbar-collapse navbar-sur-collapse <?php } ?><?php echo $navbar_menu_position; ?>-sm">
                                <?php wp_nav_menu(array( 'menu'=> 'primary', 'theme_location' => 'primary', 'depth' => 2, 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'wp_page_menu', 'walker' => new wp_bootstrap_navwalker()) ); ?>
                            </div>
                            <!– /.navbar-collapse –>
                        </div>
                        <!– /.container –>
                    </nav>
                <!– #site-navigation –>
                        
                        

            </header>