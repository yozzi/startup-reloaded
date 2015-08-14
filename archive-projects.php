<?php
/**
 * The template for displaying projects archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartUp Reloaded
 */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php if ( have_posts() ) :
            $project_thumbnail  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_thumbnail', true );                    
            $project_type  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_type', true );
            $project_category  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_category', true );                    
            $project_status  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_status', true );
            $project_main_pic  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_main_pic', true );                    
            $project_description  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_description', true );
            $project_specifications  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_specifications', true );                    
            $project_options  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_options', true );
            $project_warranty  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_warranty', true );                    
            $project_price  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_price', true );
            $project_implantation  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_implantation', true );                    
            $project_plans  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_plans', true );
            $project_gallery  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gallery', true );
            $project_url   = get_post_meta( get_the_ID(), '_startup_reloaded_projects_url', true );
        ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
