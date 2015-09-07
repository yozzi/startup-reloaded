<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartUp Reloaded
 */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                        </div>
                    </div>
                </div>    
			</header><!-- .page-header -->

<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php require get_template_directory() . '/inc/shortcodes/portfolio.php'; ?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>