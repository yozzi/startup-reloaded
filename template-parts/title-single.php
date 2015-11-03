<?php
    $post_header_visible = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_visible', true );
    if ( !$post_header_visible ) { $post_header_visible = of_get_option( 'page-header-hidden' ); };
    $post_header_background_color = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_background_color', true );
    if ( !$post_header_background_color ) { $post_header_background_color = of_get_option( 'page-header-background-color' ); };
    $post_header_color = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_color', true );
    if ( !$post_header_color ) { $post_header_color = of_get_option( 'page-header-text-color' ); };
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $post_header_background = $thumb['0'];
    $post_header_background_position = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_background_position', true );
    $post_header_padding = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_padding', true );
    if ( !$post_header_padding ) { $post_header_padding = of_get_option( 'page-header-padding' ); };
    $post_header_position = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_position', true );
    if ( !$post_header_position ) { $post_header_position = of_get_option( 'page-header-position' ); };
    $post_header_effect = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_effect', true );
    $post_header_boxed = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_boxed', true );
    if ( !$post_header_boxed ) { $post_header_boxed = of_get_option( 'page-header-boxed' ); };
    $post_header_parallax = get_post_meta( get_the_ID(), '_startup_reloaded_posts_header_parallax', true );

    if (!is_front_page() && !$post_header_visible ){?>
        <header class="entry-header <?php echo $post_header_position ?>" style="<?php if ( $post_header_color ){ echo 'color:' . $post_header_color . ';'; }; if ( $post_header_background && $post_header_parallax == '' ){  echo 'background: url(' . $post_header_background . '); background-size:cover; background-position: center ' . $post_header_background_position . ';';} elseif ( $post_header_background_color && $post_header_parallax == '' ) { echo 'background: ' . $post_header_background_color . ';';} ?>" <?php if ( $post_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $post_header_background[0] . '"'; } ?>>
            <div class="effect <?php echo $post_header_effect; ?>" style="<?php if ( $post_header_padding ){ echo 'padding-top:' . $post_header_padding . 'px;padding-bottom:' . $post_header_padding . 'px;'; } ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if ( $post_header_boxed ){ the_title( '<h3 class="entry-title boxed">', '</h3>' ); }  
                                else { the_title( '<h3 class="entry-title">', '</h3>' ); } ?>                                                      
                            <?php if ( $post_header_boxed ){ ?><h4 class="boxed"><?php startup_reloaded_posted_on(); ?></h4>
                            <?php } else { ?><h4><?php startup_reloaded_posted_on(); ?></h4><?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- .entry-header -->
    <?php } else { ?>
        <header class="entry-header">
            <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

            <div class="entry-meta">
                <?php startup_reloaded_posted_on(); ?>
            </div><!-- .entry-meta -->
	   </header><!-- .entry-header -->
    <?php } ?>