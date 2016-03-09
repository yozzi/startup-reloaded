<?php 
// Metaboxes
add_action( 'cmb2_admin_init', 'startup_reloaded_metabox_pages' );

function startup_reloaded_metabox_pages() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_startup_reloaded_pages_';

	$cmb_box = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Header', 'startup-reloaded' ),
		'object_types'  => array( 'page' )
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Hidden', 'startup-reloaded' ),
        'desc'             => __( 'Hide the header. Or not.', 'startup-reloaded' ),
		'id'               => $prefix . 'header_visible',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed width', 'startup-reloaded' ),
        'desc'             => __( 'Got to test on boxed design...', 'startup-reloaded' ),
		'id'               => $prefix . 'header_boxed_width',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Background color', 'startup-reloaded' ),
        'id'      => $prefix . 'header_background_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Text color', 'startup-reloaded' ),
        'id'      => $prefix . 'header_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Subtitle', 'startup-reloaded' ),
		'id'         => $prefix . 'header_subtitle',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name' => __( 'Background image', 'startup-reloaded' ),
		'id'   => $prefix . 'header_background',
		'type' => 'file',
        // Optionally hide the text input for the url:
        'options' => array(
            'url' => false,
        ),
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Background image position', 'startup-reloaded' ),
		'id'               => $prefix . 'header_background_position',
		'type'             => 'select',
        'default'          => 'center',
		'options'          => array(
			'top' => __( 'Top', 'startup-reloaded' ),
			'center' => __( 'Center', 'startup-reloaded' ),
			'bottom' => __( 'Bottom', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Padding', 'startup-reloaded' ),
        'desc'             => __( 'Padding of page header in px', 'startup-reloaded' ),
		'id'         => $prefix . 'header_padding',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Content position', 'startup-reloaded' ),
		'id'               => $prefix . 'header_position',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'left' => __( 'Left', 'startup-reloaded' ),
			'center'   => __( 'Center', 'startup-reloaded' ),
			'right'     => __( 'Right', 'startup-reloaded' )
		)
	) );
    
     $cmb_box->add_field( array(
		'name'             => __( 'Effect', 'startup-reloaded' ),
		'id'               => $prefix . 'header_effect',
		'type'             => 'select',
		'show_option_none' => true,
        'default'          => '',
		'options'          => array(
			'light' => __( 'Light', 'startup-reloaded' ),
			'dark'   => __( 'Dark', 'startup-reloaded' ),
			'trame-01'     => __( 'Trame 1', 'startup-reloaded' ),
            'trame-02'     => __( 'Trame 2', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed', 'startup-reloaded' ),
        'desc'             => __( 'Put the text inside a box', 'startup-reloaded' ),
		'id'               => $prefix . 'header_boxed',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'no' => __( 'No', 'startup-reloaded' ),
			'1'   => __( 'Yes', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Parallax', 'startup-reloaded' ),
        'desc'             => __( 'Add parallax effect to the background', 'startup-reloaded' ),
		'id'               => $prefix . 'header_parallax',
		'type'             => 'checkbox'
	) );
}

add_action( 'cmb2_admin_init', 'startup_reloaded_metabox_posts' );

function startup_reloaded_metabox_posts() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_startup_reloaded_posts_';
    
    if ( is_plugin_active('startup-cpt-team/startup-cpt-team.php') ) {
    
        $cmb_box = new_cmb2_box( array(
            'id'            => $prefix . 'author',
            'title'         => __( 'Author', 'startup-reloaded' ),
            'object_types'  => array( 'post' )
        ) );

        // Pull all authors into an array
        $args = array(
            'post_type' => 'team',
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 0
        ); 

        $authors = array();
        $authors_obj = get_pages( $args );
        foreach ($authors_obj as $author) {
            $authors[$author->ID] = $author->post_title;
        }

        $cmb_box->add_field( array(
            'desc'             => __( 'Author to display if different than you.', 'startup-reloaded' ),
            'id'               => $prefix . 'author',
            'type'             => 'select',
            'show_option_none' => true,
            'options'          => $authors
        ) );
    
    }
    
    $cmb_box = new_cmb2_box( array(
		'id'            => $prefix . 'link',
		'title'         => __( 'Link', 'startup-reloaded' ),
		'object_types'  => array( 'post' )
	) );
    
    $cmb_box->add_field( array(
        'desc'             => __( 'URL of the content : YouTube video, pdf link, etc...', 'startup-reloaded' ),
		'id'         => $prefix . 'link_url',
		'type'       => 'text'
	) );

	$cmb_box = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Header', 'startup-reloaded' ),
		'object_types'  => array( 'post' )
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Hidden', 'startup-reloaded' ),
        'desc'             => __( 'Hide the header. Or not.', 'startup-reloaded' ),
		'id'               => $prefix . 'header_visible',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed width', 'startup-reloaded' ),
        'desc'             => __( 'Got to test on boxed design...', 'startup-reloaded' ),
		'id'               => $prefix . 'header_boxed_width',
		'type'             => 'checkbox'
	) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Background color', 'startup-reloaded' ),
        'id'      => $prefix . 'header_background_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
        'name'    => __( 'Text color', 'startup-reloaded' ),
        'id'      => $prefix . 'header_color',
        'type'    => 'colorpicker',
        'default' => ''
    ) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Background image position', 'startup-reloaded' ),
		'id'               => $prefix . 'header_background_position',
		'type'             => 'select',
        'default'          => 'center',
		'options'          => array(
			'top' => __( 'Top', 'startup-reloaded' ),
			'center' => __( 'Center', 'startup-reloaded' ),
			'bottom' => __( 'Bottom', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'       => __( 'Padding', 'startup-reloaded' ),
        'desc'             => __( 'Padding of page header in px', 'startup-reloaded' ),
		'id'         => $prefix . 'header_padding',
		'type'       => 'text'
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Content position', 'startup-reloaded' ),
		'id'               => $prefix . 'header_position',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'left' => __( 'Left', 'startup-reloaded' ),
			'center'   => __( 'Center', 'startup-reloaded' ),
			'right'     => __( 'Right', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Effect', 'startup-reloaded' ),
		'id'               => $prefix . 'header_effect',
		'type'             => 'select',
		'show_option_none' => true,
        'default'          => '',
		'options'          => array(
			'light' => __( 'Light', 'startup-reloaded' ),
			'dark'   => __( 'Dark', 'startup-reloaded' ),
			'trame-01'     => __( 'Trame 1', 'startup-reloaded' ),
            'trame-02'     => __( 'Trame 2', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Boxed', 'startup-reloaded' ),
        'desc'             => __( 'Put the text inside a box', 'startup-reloaded' ),
		'id'               => $prefix . 'header_boxed',
		'type'             => 'select',
		'show_option_none' => 'Default',
        'default'          => '',
		'options'          => array(
			'no' => __( 'No', 'startup-reloaded' ),
			'1'   => __( 'Yes', 'startup-reloaded' )
		)
	) );
    
    $cmb_box->add_field( array(
		'name'             => __( 'Parallax', 'startup-reloaded' ),
        'desc'             => __( 'Add parallax effect to the background', 'startup-reloaded' ),
		'id'               => $prefix . 'header_parallax',
		'type'             => 'checkbox'
	) );
}
?>