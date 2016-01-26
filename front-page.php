<?php
    $navbar_on          = of_get_option( 'navbar-on' );
    $navbar_position    = of_get_option( 'navbar-position' );
    $slider_on          = of_get_option( 'slider-on' );

    get_header();

    if (($slider_on == 1) && (is_plugin_active('startup-cpt-slider/startup-cpt-slider.php'))) {
        get_template_part( 'template-parts/slider', 'home' );
    }
?>
<?php if( ($navbar_on && $navbar_position == 'navbar-fixed-slider' ) ){ get_template_part( 'template-parts/navbar', 'primary' ); } ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main zone" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

        <?php $hasposts = get_posts('post_type=home');
              $home_type = of_get_option( 'home-type' );
            if ( is_plugin_active('startup-cpt-home/startup-cpt-home.php') && !empty ( $hasposts ) && $home_type ) {

                get_template_part( 'template-parts/content', 'home' );

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

        <?php endwhile; // end of the loop. ?>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->


    <?php get_sidebar(); ?>
    <?php get_footer(); ?>