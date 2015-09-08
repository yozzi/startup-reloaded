<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartUp Reloaded
 */
$page_header_visible = of_get_option( 'page-header-hidden' );
$page_header_background_color = of_get_option( 'page-header-background-color' );
$page_header_color = of_get_option( 'page-header-text-color' );
$page_header_padding = of_get_option( 'page-header-padding' );
$page_header_position = of_get_option( 'page-header-position' );
$page_header_boxed = of_get_option( 'page-header-boxed' );
?>
<div class="col-lg-12">
<section class="no-results not-found">
	<header class="page-header">
		<h4 class="page-title"><?php esc_html_e( 'Nothing Found', 'startup-reloaded' ); ?></h4>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'startup-reloaded' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'startup-reloaded' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'startup-reloaded' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
</div>