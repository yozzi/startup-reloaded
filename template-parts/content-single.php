<?php
/**
 * @package StartUp Reloaded
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php require get_template_directory() . '/inc/post-header.php';  ?>
	<div class="entry-content">
        <div class="container">
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
        </div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
		          <?php startup_reloaded_entry_footer(); ?>
                </div>
            </div>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->