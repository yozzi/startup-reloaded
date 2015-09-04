<?php
// Register Theme Features
function startup_reloaded_custom_theme_features()  {

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 1200, 400, true );
    
    // CPT Image Custom Sizes
    // Products
    add_image_size( 'product_thumb', 720, 0, false);
    add_image_size( 'product_main', 720, 320, true);
    
//    // Add theme support for Custom Header
//	$header_args = array(
//		'default-image'          => '',
//		'width'                  => 0,
//		'height'                 => 0,
//		'flex-width'             => true,
//		'flex-height'            => true,
//		'uploads'                => true,
//		'random-default'         => false,
//		'header-text'            => true,
//		'default-text-color'     => '#fff',
//		'wp-head-callback'       => '',
//		'admin-head-callback'    => '',
//		'admin-preview-callback' => '',
//	);
//	add_theme_support( 'custom-header', $header_args );
}



// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'startup_reloaded_custom_theme_features' );
?>