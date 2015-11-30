<?php
    $boxed = of_get_option( 'general-boxed' );
    $page_header_visible = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_visible', true );
    if ( !$page_header_visible ) { $page_header_visible = of_get_option( 'page-header-hidden' ); };
    $page_header_background_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_color', true );
    if ( !$page_header_background_color ) { $page_header_background_color = of_get_option( 'page-header-background-color' ); };
    $page_header_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_color', true );
    if ( !$page_header_color ) { $page_header_color = of_get_option( 'page-header-text-color' ); };
    $page_header_subtitle = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_subtitle', true );
    $page_header_background = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_id', 1 ), 'large' );
    $page_header_background_position = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_position', true );
    $page_header_padding = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_padding', true );
    if ( !$page_header_padding ) { $page_header_padding = of_get_option( 'page-header-padding' ); };
    $page_header_position = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_position', true );
    if ( !$page_header_position ) { $page_header_position = of_get_option( 'page-header-position' ); };
    $page_header_effect = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_effect', true );
    $page_header_boxed = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_boxed', true );
    if ( !$page_header_boxed ) { $page_header_boxed = of_get_option( 'page-header-boxed' ); };
    $page_header_parallax = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_parallax', true );
    $page_header_boxed_width = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_boxed_width', true );
    if ( !$page_header_boxed_width ) { $page_header_boxed_width = of_get_option( 'page-header-boxed-width' ); };

    if (!is_front_page() && !$page_header_visible ){?>
        <header class="entry-header <?php echo $page_header_position ?>"<?php if ( !$page_header_boxed_width ) { ?> style="<?php if ( $page_header_color ){ echo 'color:' . $page_header_color . ';'; }; if ( $page_header_background && $page_header_parallax == '' ){  echo 'background: url(' . $page_header_background[0] . '); background-size:cover; background-position: center ' . $page_header_background_position . ';';} elseif ( $page_header_background_color && $page_header_parallax == '' ) { echo 'background: ' . $page_header_background_color . ';';} ?>" <?php if ( $page_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $page_header_background[0] . '"'; } ?><?php } ?>>
            <?php if ( $page_header_boxed_width ) { ?>
                <?php if(!$boxed) { ?><div class="container"><?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div<?php if ( $page_header_boxed_width ) { ?> style="<?php if ( $page_header_color ){ echo 'color:' . $page_header_color . ';'; }; if ( $page_header_background && $page_header_parallax == '' ){  echo 'background: url(' . $page_header_background[0] . '); background-size:cover; background-position: center ' . $page_header_background_position . ';';} elseif ( $page_header_background_color && $page_header_parallax == '' ) { echo 'background: ' . $page_header_background_color . ';';} ?>" <?php if ( $page_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $page_header_background[0] . '"'; } ?><?php } ?>>
            <?php } ?>
                                <div class="effect <?php echo $page_header_effect; ?>" style="<?php if ( $page_header_padding ){ echo 'padding-top:' . $page_header_padding . 'px;padding-bottom:' . $page_header_padding . 'px;'; } ?>">
                                    <?php if ( !$page_header_boxed_width ) { ?>
                                        <div class="container">
                                    <?php } ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php if ( $page_header_boxed_width ) { ?>
                                                        <div class="col-lg-12">
                                                    <?php } ?>
                                                            <?php if ( $page_header_boxed ){ the_title( '<h3 class="entry-title boxed">', '</h3>' ); }  
                                                                else { the_title( '<h3 class="entry-title">', '</h3>' ); } ?>                                                      
                                                            <?php if ( $page_header_subtitle && $page_header_boxed ){ echo '<h4 class="boxed">' . $page_header_subtitle . '</h4>'; }  
                                                                else if ( $page_header_subtitle ){ echo '<h4>' . $page_header_subtitle . '</h4>'; } ?>
                                                    <?php if ( $page_header_boxed_width ) { ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                    <?php if ( !$page_header_boxed_width ) { ?>
                                        </div>
                                    <?php } ?>
                                </div>
            <?php if ( $page_header_boxed_width ) { ?>
                            </div>
                        </div>
                    </div>
                <?php if(!$boxed) { ?></div><?php } ?>
            <?php } ?>
        </header><!-- .entry-header -->
<?php } ?>