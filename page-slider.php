<?php
/**
* Template Name: With Slider */

$navbar_on = of_get_option( 'navbar-on' );
$navbar_position = of_get_option( 'navbar-position' );

get_header();

require get_template_directory() . '/inc/home-slider.php';
?>
<?php if( ($navbar_on && $navbar_position == 'navbar-fixed-slider' ) ){ require get_template_directory() . '/inc/navbar-primary.php'; } ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main zone" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->


    <?php get_sidebar(); ?>
    <?php get_footer(); ?>