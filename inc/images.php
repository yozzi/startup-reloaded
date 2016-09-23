<?php
// Register custom imge sizes
function startup_reloaded_custom_theme_features()  {

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1200, 400, true );
    
    add_image_size( 'col-3-full', 480, 0, false);
    //add_image_size( 'shuffle_thumb', 480, 0, false);
    add_image_size( 'col-3-crop', 480, 220, true);
    //add_image_size( 'shuffle_main', 480, 220, true); 
    add_image_size( 'col-3-square', 480, 480, true);
    //add_image_size( 'grid_thumb', 480, 480, true);
    
    add_image_size( 'col-8-full', 720, 0, false);
    //add_image_size( 'grid_main', 720, 0, false);
    
    add_image_size( 'col-2-full', 140, 140, false);
    //add_image_size( 'partners', 140, 140, false);
    
    add_image_size( 'col-12-full', 1140, 0, false);
    add_image_size( 'col-12-crop', 1140, 450, true);
    
    
}

add_action( 'after_setup_theme', 'startup_reloaded_custom_theme_features' );

// Ajouter les tailles personnalisées au selecteur de l'uploadeur
function startup_reloaded_insert_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'shuffle_thumb' => __( 'Shuffle thumbnail', 'startup-reloaded' ),
        'shuffle_main'  => __( 'Shuffle main', 'startup-reloaded' ),
        'grid_thumb'    => __( 'Grid thumbnail', 'startup-reloaded' ),
        'grid_main'     => __( 'Grid main', 'startup-reloaded' ),
        'partners'      => __( 'Partners', 'startup-reloaded' ),
        'col-12-crop'        => __( '12 col cropped', 'startup-reloaded' ),
        'col-12-full'        => __( '12 col full', 'startup-reloaded' ),
    ) );
}

add_filter( 'image_size_names_choose', 'startup_reloaded_insert_custom_sizes' );