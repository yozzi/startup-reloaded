<?php
/**
 * The template for displaying all single posts.
 *
 * @package StartUp Reloaded
 */

get_header();

require get_template_directory() . '/inc/theme-options.php';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/title', 'single' ); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if( !$boxed ) { ?><div class="container"><?php } ?>
                    <div class="row">

                        <!-- Blog Post Content Column -->
                        <div class="col-lg-8">

                            <div class="entry-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php the_content(); ?>
                                        <?php
                                            wp_link_pages( array(
                                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
                                                'after'  => '</div>',
                                            ) );
                                        ?>
                                    </div>
                                </div>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                      <?php startup_reloaded_entry_footer(); ?>
                                    </div>
                                </div>     
                            </footer><!-- .entry-footer -->

                        </div>

                        <!-- Blog Sidebar Widgets Column -->
                        <div class="col-lg-4">

                            <!-- Blog Search -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blog Search</h3>
                                </div>
                                <div class="panel-body">
                                     <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" type="text" value="" name="s" id="s" />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-custom" type="submit" id="searchsubmit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>   
                                    </form>
                                </div>
                            </div>



                            <!-- Blog Categories -->
                            <div id="blog-categories" class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><a href="#collapse-categories" data-toggle="collapse">Blog Categories</a></h3>
                                </div>
                                <div id="collapse-categories" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php $args = array(
                                                  'taxonomy'     => 'category',
                                                  'orderby'      => 'name',
                                                  'show_count'   => 0,
                                                  'pad_counts'   => 0,
                                                  'hierarchical' => 0,
                                                  'title_li'     => ''
                                                );
                                            ?>
                                            <ul class="list-unstyled">
                                                <?php wp_list_categories( $args ); ?>
                                            </ul>
                                    </div>
                                </div>
                            </div>


                            <!-- Blog Archives -->
                            <div id="blog-archives" class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><a href="#collapse-archives" data-toggle="collapse">Blog Archives</a></h3>
                                </div>
                                <div id="collapse-archives" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php $args = array(
                                                    'type'            => 'monthly',
                                                    'limit'           => '',
                                                    'format'          => 'html', 
                                                    'before'          => '',
                                                    'after'           => '',
                                                    'show_post_count' => false,
                                                    'echo'            => 1,
                                                    'order'           => 'DESC'
                                                );
                                            ?>
                                            <ul class="list-unstyled">
                                                <?php wp_get_archives( $args ); ?>
                                            </ul>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                <?php if( !$boxed ) { ?></div><?php } ?>

            </article><!-- #post-## -->

			<?php //the_post_navigation(); ?>

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
