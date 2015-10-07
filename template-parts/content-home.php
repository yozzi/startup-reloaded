<?php
/**
 * @package StartUp Reloaded
 */
?>

<?php $hasposts = get_posts('post_type=home');
      $home_type = of_get_option( 'home-type' );
    if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php') && !empty ( $hasposts ) && $home_type ) {

        require get_template_directory() . '/inc/shortcodes/home.php';

    } else { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'startup-reloaded' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
            ?>

            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
<?php } ?>