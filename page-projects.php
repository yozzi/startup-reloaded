<?php
/**
* Template Name: Projects */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">
            <?php get_template_part( 'template-parts/title', 'page' ); ?>
			<?php get_template_part( 'template-parts/content', 'projects' ); ?>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>