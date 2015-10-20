<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package StartUp Reloaded
 */
?>

<?php $boxed = of_get_option( 'general-boxed' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php require get_template_directory() . '/inc/page-header.php';  ?>   
	<div class="entry-content">
        <?php if(!$boxed) { ?><div class="container"><?php } ?>
            <div class="row">
                <div class="col-lg-12">
                    <?php require get_template_directory() . '/inc/shortcodes/blog.php'; ?>
                </div>
            </div>
        <?php if(!$boxed) { ?></div><?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->