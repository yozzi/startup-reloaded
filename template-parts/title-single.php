<?php
    
    require get_template_directory() . '/inc/theme-options.php';

    $this_post_header_visible = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_visible', true );
    if ( !$this_post_header_visible ) { $this_post_header_visible = $page_header_visible; };
    $this_post_header_background_color = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_background_color', true );
    if ( !$this_post_header_background_color ) { $this_post_header_background_color = $page_header_background_color; };
    $this_post_header_color = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_color', true );
    if ( !$this_post_header_color ) { $this_post_header_color = $page_header_color; };
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $this_post_header_background = $thumb['0'];
    $this_post_header_background_position = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_background_position', true );
    $this_post_header_padding = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_padding', true );
    if ( !$this_post_header_padding ) { $this_post_header_padding = $page_header_padding; };
    $this_post_header_position = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_position', true );
    if ( !$this_post_header_position ) { $this_post_header_position = $page_header_position; };
    $this_post_header_effect = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_effect', true );
    $this_post_header_boxed = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_boxed', true );
    if ( !$this_post_header_boxed ) { $this_post_header_boxed = $page_header_boxed; };
    $this_post_header_parallax = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_parallax', true );
    $this_post_header_boxed_width = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_boxed_width', true );
    if ( !$this_post_header_boxed_width ) { $this_post_header_boxed_width = $page_header_boxed_width; };

    if (!is_front_page() && !$this_post_header_visible ){?>
        <header class="entry-header <?php echo $this_post_header_position ?>"<?php if ( !$this_post_header_boxed_width ) { ?> style="<?php if ( $this_post_header_color ){ echo 'color:' . $this_post_header_color . ';'; }; if ( $this_post_header_background && $this_post_header_parallax == '' ){  echo 'background: url(' . $this_post_header_background . '); background-size:cover; background-position: center ' . $this_post_header_background_position . ';';} elseif ( $this_post_header_background_color && $this_post_header_parallax == '' ) { echo 'background: ' . $this_post_header_background_color . ';';} ?>" <?php if ( $this_post_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $this_post_header_background[0] . '"'; } ?><?php } ?>>
            <?php if ( $this_post_header_boxed_width ) { ?>
                <?php if(!$boxed) { ?><div class="container"><?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div<?php if ( $this_post_header_boxed_width ) { ?> style="<?php if ( $this_post_header_color ){ echo 'color:' . $this_post_header_color . ';'; }; if ( $this_post_header_background && $this_post_header_parallax == '' ){  echo 'background: url(' . $this_post_header_background . '); background-size:cover; background-position: center ' . $this_post_header_background_position . ';';} elseif ( $this_post_header_background_color && $this_post_header_parallax == '' ) { echo 'background: ' . $this_post_header_background_color . ';';} ?>" <?php if ( $this_post_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $this_post_header_background[0] . '"'; } ?><?php } ?>>
            <?php } ?>
                                <div class="effect <?php echo $this_post_header_effect; ?>" style="<?php if ( $this_post_header_padding ){ echo 'padding-top:' . $this_post_header_padding . 'px;padding-bottom:' . $this_post_header_padding . 'px;'; } ?>">
                                    <?php if ( !$this_post_header_boxed_width ) { ?>
                                        <div class="container">
                                    <?php } ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php if ( $this_post_header_boxed_width ) { ?>
                                                        <div class="col-lg-12">
                                                    <?php } ?>
                                                            <?php if ( $this_post_header_boxed ){ the_title( '<h3 class="entry-title boxed">', '</h3>' ); }  
                                                                else { the_title( '<h3 class="entry-title">', '</h3>' ); } ?>                                                      
                                                            <?php if ( $this_post_header_boxed ){ ?><h4 class="boxed"><?php startup_reloaded_posted_on(); ?></h4>
                                                            <?php } else { ?><h4><?php startup_reloaded_posted_on(); ?></h4><?php } ?>
                                                    <?php if ( $this_post_header_boxed_width ) { ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php if ( !$this_post_header_boxed_width ) { ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php if ( $this_post_header_boxed_width ) { ?>
                            </div>
                        </div>
                    </div>
                <?php if(!$boxed) { ?></div><?php } ?>
            <?php } ?>
        </header><!-- .entry-header -->
    <?php } else { ?>
        <header class="entry-header">
            <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

            <div class="entry-meta">
                <?php startup_reloaded_posted_on(); ?>
            </div><!-- .entry-meta -->
	   </header><!-- .entry-header -->
    <?php } ?>