<?php

    require get_template_directory() . '/inc/theme-options.php';

    /* Get all sticky posts */
    $sticky = get_option( 'sticky_posts' );

    /* Sort the stickies with the newest ones at the top */
    rsort( $sticky );

    /* Get the 5 newest stickies (change 5 for a different number) */
    $sticky = array_slice( $sticky, 0, 5 );

    $args = array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 );
    $blog = get_posts( $args );   
?>

<section id="sticky"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
       

            <div id="grid" class="row">
                <?php foreach ($blog as $key=> $post) {
                    $categories = get_the_terms( $post->ID, 'category' );
                    $image = get_the_post_thumbnail($post->ID, 'col-3-crop');
                    $title = get_the_title($post->ID);
                    $content = get_the_excerpt($post->ID);
                ?>
                    <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="sticky-item">
                            <div class="sticky-item-thumbnail">  
                                <?php if ( $image ) { echo $image; } ?>
                                <div class="sticky-item-details">
                                </div>
                                <h2><?php echo $title ?></h2>
                                <p><?php echo $content ?></p>
                                <p><a class="btn btn-sm btn-custom" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">Lire la suite</a></p>
                            </div>       
                        </div>
                    </div>
                <?php } // endforeach ?>
            </div>
    
    
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>