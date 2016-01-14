<?php
/**
* Template Name: Products */

get_header(); ?>

	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/title', 'page' ); ?>
				<?php $boxed = of_get_option( 'general-boxed' ); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php if( !$boxed ) { ?><div class="container"><?php } ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php get_template_part( 'template-parts/content', 'products' ); ?>
                                </div>
                            </div>
                        <?php if( !$boxed ) { ?></div><?php } ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>