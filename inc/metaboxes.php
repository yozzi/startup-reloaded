<?php 
// Metaboxes
add_action( 'cmb2_admin_init', 'startup_reloaded_metabox_pages' );

function startup_reloaded_metabox_pages() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_startup_reloaded_pages_';

	$cmb_box = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Header', 'cmb2' ),
		'object_types'  => array( 'page' )
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Hidden', 'cmb2' ),
        'desc'             => __( 'Hide the header. Or not.', 'cmb2' ),
		'id'               => $prefix . 'header_visible',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Background color', 'cmb2' ),
        'id'      => $prefix . 'header_background_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Text color', 'cmb2' ),
        'id'      => $prefix . 'header_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Subtitle', 'cmb2' ),
		'id'         => $prefix . 'header_subtitle',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name' => __( 'Background image', 'cmb2' ),
		'id'   => $prefix . 'header_background',
		'type' => 'file',
        // Optionally hide the text input for the url:
        'options' => array(
            'url' => false,
        ),
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Background image position', 'cmb2' ),
		'id'               => $prefix . 'header_background_position',
		'type'             => 'select',
        'default'          => 'center',
		'options'          => array(
			'top' => __( 'Top', 'cmb2' ),
			'center' => __( 'Center', 'cmb2' ),
			'bottom' => __( 'Bottom', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Padding', 'cmb2' ),
        'desc'             => __( 'Padding of page header in px', 'cmb2' ),
		'id'         => $prefix . 'header_padding',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Content position', 'cmb2' ),
		'id'               => $prefix . 'header_position',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'left' => __( 'Left', 'cmb2' ),
			'center'   => __( 'Center', 'cmb2' ),
			'right'     => __( 'Right', 'cmb2' )
		)
	) );
    
     $cmb_box->add_field( array(
		'name'             => __( 'Effect', 'cmb2' ),
		'id'               => $prefix . 'header_effect',
		'type'             => 'select',
		'show_option_none' => true,
        'default'          => '',
		'options'          => array(
			'light' => __( 'Light', 'cmb2' ),
			'dark'   => __( 'Dark', 'cmb2' ),
			'trame-01'     => __( 'Trame 1', 'cmb2' ),
            'trame-02'     => __( 'Trame 2', 'cmb2' )
		)
	) );
    
//    $cmb_box->add_field( array(
//		'name'             => __( 'Boxed', 'cmb2' ),
//        'desc'             => __( 'Put the text inside a box', 'cmb2' ),
//		'id'               => $prefix . 'header_boxed',
//		'type'             => 'checkbox'
//	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed', 'cmb2' ),
        'desc'             => __( 'Put the text inside a box', 'cmb2' ),
		'id'               => $prefix . 'header_boxed',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'no' => __( 'No', 'cmb2' ),
			'1'   => __( 'Yes', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Parallax', 'cmb2' ),
        'desc'             => __( 'Add parallax effect to the background', 'cmb2' ),
		'id'               => $prefix . 'header_parallax',
		'type'             => 'checkbox'
	) );
}

add_action( 'cmb2_admin_init', 'startup_reloaded_metabox_posts' );

function startup_reloaded_metabox_posts() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_startup_reloaded_posts_';

	$cmb_box = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Header', 'cmb2' ),
		'object_types'  => array( 'post' )
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Hidden', 'cmb2' ),
        'desc'             => __( 'Hide the header. Or not.', 'cmb2' ),
		'id'               => $prefix . 'header_visible',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Background color', 'cmb2' ),
        'id'      => $prefix . 'header_background_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Text color', 'cmb2' ),
        'id'      => $prefix . 'header_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Background image position', 'cmb2' ),
		'id'               => $prefix . 'header_background_position',
		'type'             => 'select',
        'default'          => 'center',
		'options'          => array(
			'top' => __( 'Top', 'cmb2' ),
			'center' => __( 'Center', 'cmb2' ),
			'bottom' => __( 'Bottom', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Padding', 'cmb2' ),
        'desc'             => __( 'Padding of page header in px', 'cmb2' ),
		'id'         => $prefix . 'header_padding',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Content position', 'cmb2' ),
		'id'               => $prefix . 'header_position',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'left' => __( 'Left', 'cmb2' ),
			'center'   => __( 'Center', 'cmb2' ),
			'right'     => __( 'Right', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Effect', 'cmb2' ),
		'id'               => $prefix . 'header_effect',
		'type'             => 'select',
		'show_option_none' => true,
        'default'          => '',
		'options'          => array(
			'light' => __( 'Light', 'cmb2' ),
			'dark'   => __( 'Dark', 'cmb2' ),
			'trame-01'     => __( 'Trame 1', 'cmb2' ),
            'trame-02'     => __( 'Trame 2', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed', 'cmb2' ),
        'desc'             => __( 'Put the text inside a box', 'cmb2' ),
		'id'               => $prefix . 'header_boxed',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'no' => __( 'No', 'cmb2' ),
			'1'   => __( 'Yes', 'cmb2' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Parallax', 'cmb2' ),
        'desc'             => __( 'Add parallax effect to the background', 'cmb2' ),
		'id'               => $prefix . 'header_parallax',
		'type'             => 'checkbox'
	) );
}
?>