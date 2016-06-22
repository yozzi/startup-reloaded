<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package StartUp Reloaded
 */

get_header();

require get_template_directory() . '/inc/theme-options.php';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/title', 'page' ); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php //if(!$boxed) { ?><div class="container"><?php //} ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        <?php //if(!$boxed) { ?></div><?php //} ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
