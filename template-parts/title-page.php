<?php

    require get_template_directory() . '/inc/theme-options.php';

    $this_page_header_visible = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_visible', true );
    if ( !$this_page_header_visible ) { $this_page_header_visible = $page_header_visible; };
    $this_page_header_background_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_color', true );
    if ( !$this_page_header_background_color ) { $this_page_header_background_color = $page_header_background_color; };
    $this_page_header_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_color', true );
    if ( !$this_page_header_color ) { $this_page_header_color = $page_header_color; };
    $this_page_header_subtitle = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_subtitle', true );
    $this_page_header_background = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_id', 1 ), 'large' );
    $this_page_header_background_position = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_position', true );
    $this_page_header_padding = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_padding', true );
    if ( !$this_page_header_padding ) { $this_page_header_padding = $page_header_padding; };
    $this_page_header_position = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_position', true );
    if ( !$this_page_header_position ) { $this_page_header_position = $page_header_position; };
    $this_page_header_effect = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_effect', true );
    $this_page_header_boxed = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_boxed', true );
    if ( !$this_page_header_boxed ) { $this_page_header_boxed = $page_header_boxed; };
    $this_page_header_parallax = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_parallax', true );
    $this_page_header_boxed_width = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_boxed_width', true );
    if ( !$this_page_header_boxed_width ) { $this_page_header_boxed_width = $page_header_boxed_width; };

    if (!is_front_page() && !$this_page_header_visible ){?>
        <header class="page-header <?php echo $this_page_header_position ?>"<?php if ( !$this_page_header_boxed_width ) { ?> style="<?php if ( $this_page_header_color ){ echo 'color:' . $this_page_header_color . ';'; }; if ( $this_page_header_background && $this_page_header_parallax == '' ){  echo 'background: url(' . $this_page_header_background[0] . '); background-size:cover; background-position: center ' . $this_page_header_background_position . ';';} elseif ( $this_page_header_background_color && $this_page_header_parallax == '' ) { echo 'background: ' . $this_page_header_background_color . ';';} ?>" <?php if ( $this_page_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $this_page_header_background[0] . '"'; } ?><?php } ?>>
            <?php if ( $this_page_header_boxed_width ) { ?>
                <?php if(!$boxed) { ?><div class="container"><?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div<?php if ( $this_page_header_boxed_width ) { ?> style="<?php if ( $this_page_header_color ){ echo 'color:' . $this_page_header_color . ';'; }; if ( $this_page_header_background && $this_page_header_parallax == '' ){  echo 'background: url(' . $this_page_header_background[0] . '); background-size:cover; background-position: center ' . $this_page_header_background_position . ';';} elseif ( $this_page_header_background_color && $this_page_header_parallax == '' ) { echo 'background: ' . $this_page_header_background_color . ';';} ?>" <?php if ( $this_page_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $this_page_header_background[0] . '"'; } ?><?php } ?>>
            <?php } ?>
                                <div class="effect <?php echo $this_page_header_effect; ?>" style="<?php if ( $this_page_header_padding ){ echo 'padding-top:' . $this_page_header_padding . 'px;padding-bottom:' . $this_page_header_padding . 'px;'; } ?>">
                                    <?php if ( !$this_page_header_boxed_width ) { ?>
                                        <div class="container">
                                    <?php } ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php if ( $this_page_header_boxed_width ) { ?>
                                                        <div class="col-lg-12">
                                                    <?php } ?>
                                                            <?php if ( $this_page_header_boxed ){ the_title( '<h1 class="boxed">', '</h1>' ); }  
                                                                else { the_title( '<h1>', '</h1>' ); } ?>                                                      
                                                            <?php if ( $this_page_header_subtitle && $this_page_header_boxed ){ echo '<h2 class="boxed">' . $this_page_header_subtitle . '</h2>'; }  
                                                                else if ( $this_page_header_subtitle ){ echo '<h2>' . $this_page_header_subtitle . '</h2>'; } ?>
                                                    <?php if ( $this_page_header_boxed_width ) { ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                    <?php if ( !$this_page_header_boxed_width ) { ?>
                                        </div>
                                    <?php } ?>
                                </div>
            <?php if ( $this_page_header_boxed_width ) { ?>
                            </div>
                        </div>
                    </div>
                <?php if(!$boxed) { ?></div><?php } ?>
            <?php } ?>
        </header><!-- .page-header -->
<?php } ?>