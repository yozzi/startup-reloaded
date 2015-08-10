<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package StartUp Reloaded
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function startup_reloaded_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'startup_reloaded_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function startup_reloaded_jetpack_setup
add_action( 'after_setup_theme', 'startup_reloaded_jetpack_setup' );

function startup_reloaded_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function startup_reloaded_infinite_scroll_render