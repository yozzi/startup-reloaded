<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package StartUp Reloaded
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php require get_template_directory() . '/inc/page-header.php';  ?>  
	<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php require get_template_directory() . '/inc/shortcodes/portfolio.php'; ?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->