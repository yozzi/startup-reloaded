<?php
/**
* Template Name: Home */

get_header();

require get_template_directory() . '/inc/home-slider.php';
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main zone" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/content-home', 'page' ); ?>

        <?php // If comments are open or we have at least one comment, load up the comment template if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>

        <?php endwhile; // end of the loop. ?>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->


    <?php get_sidebar(); ?>
    <?php get_footer(); ?>