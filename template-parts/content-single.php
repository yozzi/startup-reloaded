<?php
/**
 * @package StartUp Reloaded
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php require get_template_directory() . '/inc/post-header.php';  ?>
    
    
	<header class="entry-header">
		<?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

		<div class="entry-meta">
			<?php startup_reloaded_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
    
    
    
    

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php startup_reloaded_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->