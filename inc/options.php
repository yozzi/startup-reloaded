<?php
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'startup-reloaded';
}

function optionsframework_options() {
    //*****************************************************************************
    //*****************************************************************************
    //
    // General
    //
    //*****************************************************************************
    //*****************************************************************************
    
    $options[] = array(
		'name' => __( 'General', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
    $options[] = array(
		'name' => __( 'StartUp serial number', 'startup-reloaded' ),
		'id' => 'general-serial',
		'std' => '',
		'type' => 'text'
	);
    
    $options[] = array(
		'name' => __( 'Image Logo', 'startup-reloaded' ),
		'id' => 'general-logo',
		'type' => 'upload'
	);
    
    // Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'None', 'startup-reloaded' );
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
    
    $options[] = array(
		'name' => __( 'Header', 'startup-reloaded' ),
		'desc' => __( 'Choose a page to use as site header', 'startup-reloaded' ),
		'id' => 'general-header',
		'type' => 'select',
        'class' => 'mini', //mini, tiny, small
		'options' => $options_pages
	);
    
	$options[] = array(
		'name' => __( 'Layout', 'startup-reloaded' ),
		'type' => 'info'
	);
    
	$options[] = array(
		'desc' => __( 'Responsive', 'startup-reloaded' ),
		'id' => 'general-responsive',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$options[] = array(
		'desc' => __( 'Boxed', 'startup-reloaded' ),
		'id' => 'general-boxed',
		'std' => '0',
		'type' => 'checkbox'
	);
    
	$home_page_type = array(
		'default' => __( 'Default', 'startup-reloaded' ),
		'login' => __( 'Login', 'startup-reloaded' ),
	);
    
	$options[] = array(
		'name' => __( 'Front page', 'startup-reloaded' ),
		'id' => 'front-page',
		'std' => 'default',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $home_page_type
	);
    
	$options[] = array(
		'name' => __( 'Page transitions', 'startup-reloaded' ),
        'desc' => __( 'Activate', 'startup-reloaded' ),
		'id' => 'page-transition',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$general_page_transitions = array(
		'fade-in' => __( 'Fade in', 'startup-reloaded' ),
		'fade-out' => __( 'Fade out', 'startup-reloaded' ),
        'fade-in-up' => __( 'Fade in up', 'startup-reloaded' ),
		'fade-out-up' => __( 'Fade out up', 'startup-reloaded' ),
        'fade-in-down' => __( 'Fade in down', 'startup-reloaded' ),
		'fade-out-down' => __( 'Fade out down', 'startup-reloaded' ),
        'fade-in-left' => __( 'Fade in left', 'startup-reloaded' ),
		'fade-out-left' => __( 'Fade out left', 'startup-reloaded' ),
        'fade-in-right' => __( 'Fade in right', 'startup-reloaded' ),
		'fade-out-right' => __( 'Fade out right', 'startup-reloaded' ),
        'rotate-in' => __( 'Rotate in', 'startup-reloaded' ),
		'rotate-out' => __( 'Rotate out', 'startup-reloaded' ),
        'flip-in-x' => __( 'Flip in X', 'startup-reloaded' ),
		'flip-out-x' => __( 'Flip out X', 'startup-reloaded' ),
        'flip-in-y' => __( 'Flip in Y', 'startup-reloaded' ),
		'flip-out-y' => __( 'Flip out Y', 'startup-reloaded' ),
        'zoom-in' => __( 'Zoom in', 'startup-reloaded' ),
		'zoom-out' => __( 'Zoom out', 'startup-reloaded' ),
	);
    
	$options[] = array(
		'desc' => __( 'Transition in', 'startup-reloaded' ),
		'id' => 'page-transition-in',
		'std' => 'fade-in',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
	);
    
    $options[] = array(
		'desc' => __( 'Transition out', 'startup-reloaded' ),
		'id' => 'page-transition-out',
		'std' => 'fade-out',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
	);
    
	$options[] = array(
		'name' => __( 'Options', 'startup-reloaded' ),
		'type' => 'info'
	);
    
	$options[] = array(
		'desc' => __( 'Back to top button', 'startup-reloaded' ),
		'id' => 'general-back-to-top',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Activate FastClick', 'startup-reloaded' ),
		'id' => 'general-fastclick',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$options[] = array(
		'desc' => __( 'Activate YTPlayer', 'startup-reloaded' ),
		'id' => 'general-ytplayer',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Activate SmoothScroll', 'startup-reloaded' ),
		'id' => 'general-smoothscroll',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Footer content', 'startup-reloaded' ),
		'id' => 'general-footer',
		'std' => 'Website powered with Startup by <a href="http://yozz.net" target="_blank">yozz.net</a>',
		'type' => 'textarea'
	);
    
    $options[] = array(
		'name' => __( 'Google Analytics ID', 'startup-reloaded' ),
		'desc' => __( 'Provided by Google in the form UA-XXXXXXX-XX', 'startup-reloaded' ),
		'id' => 'general-ga',
		'std' => '',
		'type' => 'text'
	);
    
    //*****************************************************************************
    //*****************************************************************************
    //
    // Style
    //
    //*****************************************************************************
    //*****************************************************************************
    
    $options[] = array(
		'name' => __( 'Style', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
    // Style Stylesheets

    /**
     * Returns an array of all files in $directory_path of type $filetype.
     *
     * The $directory_uri + file name is used for the key
     * The file name is the value
     */

    function options_stylesheets_get_file_list( $directory_path, $filetype, $directory_uri ) {
        $alt_stylesheets = array();
        $alt_stylesheet_files = array();
        if ( is_dir( $directory_path ) ) {
            $alt_stylesheet_files = glob( $directory_path . "*.$filetype");
            foreach ( $alt_stylesheet_files as $file ) {
                $file = str_replace( $directory_path, "", $file);
                $alt_stylesheets[ $directory_uri . $file] = $file;
            }
        }
        return $alt_stylesheets;
    }

    // Generated list of stylesheets in the "CSS" directory
    // Use template_directory paths if you're using a parent theme

    $alt_stylesheets = options_stylesheets_get_file_list(
        get_stylesheet_directory() . '/css/', // $directory_path
        'css', // $filetype
        get_stylesheet_directory_uri() . '/css/' // $directory_uri
    );

    $options[] = array( "name" => "User stylesheet",
        "desc" => 'Load additional stylesheet from the /css theme directory. Choose _none.css to ignore.',
        "id" => "auto_stylesheet",
        "type" => "select",
        "options" => $alt_stylesheets );
    
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
    
    $options[] = array(
		'name' =>  __( 'Background', 'startup-reloaded' ),
		'desc' => __( 'Change the background CSS.', 'startup-reloaded' ),
		'id' => 'style-background',
		'std' => $background_defaults,
		'type' => 'background'
	);
    
	$options[] = array(
		'name' => __( '', 'startup-reloaded' ),
        'desc' => __( 'Cover', 'startup-reloaded' ),
		'id' => 'style-cover',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'name' => __( 'Page background', 'startup-reloaded' ),
		'id' => 'style-page',
		'std' => '',
		'type' => 'color'
	);
    
    $options[] = array(
		'name' => __( 'Custom button', 'startup-reloaded' ),
        'desc' => __( 'Corner radius in px', 'startup-reloaded' ),
		'id' => 'button-radius',
		'std' => '6',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
        'desc' => __( 'Background', 'startup-reloaded' ),
		'id' => 'button-background',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Text', 'startup-reloaded' ),
		'id' => 'button-text',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Hover, focus, active background', 'startup-reloaded' ),
		'id' => 'button-hover-background',
		'std' => '#000000',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Hover, focus, active text', 'startup-reloaded' ),
		'id' => 'button-hover-text',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
	$options[] = array(
		'name' => __( 'Pages & posts header', 'startup-reloaded' ),
        'desc' => __( 'Hide the header. Or not. Overrides individual page setting if ckecked.', 'startup-reloaded' ),
		'id' => 'page-header-hidden',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Boxed width.', 'startup-reloaded' ),
		'id' => 'page-header-boxed-width',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Background', 'startup-reloaded' ),
		'id' => 'page-header-background-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
		'desc' => __( 'Text', 'startup-reloaded' ),
		'id' => 'page-header-text-color',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Padding in px', 'startup-reloaded' ),
		'id' => 'page-header-padding',
		'std' => '50',
		'type' => 'text',
        'class' => 'mini'
	);
    
	$page_header_positions = array(
		'left' => __( 'Left', 'startup-reloaded' ),
		'center' => __( 'Center', 'startup-reloaded' ),
		'right' => __( 'Right', 'startup-reloaded' )
	);
    
	$options[] = array(
		'desc' => __( 'Content position', 'startup-reloaded' ),
		'id' => 'page-header-position',
		'std' => 'left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $page_header_positions
	);
    
	$options[] = array(
        'desc' => __( 'Put the text inside a box', 'startup-reloaded' ),
		'id' => 'page-header-boxed',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Footer', 'startup-reloaded' ),
		'id' => 'footer-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
		'name' => __( 'Custom CSS', 'startup-reloaded' ),
		'id' => 'custom-css',
		'type' => 'textarea'
	);
    
    //*****************************************************************************
    //*****************************************************************************
    //
    // Navigation
    //
    //*****************************************************************************
    //*****************************************************************************
    
    $options[] = array(
		'name' => __( 'Navigation', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'name' => __( 'Navbar', 'startup-reloaded' ),
        'desc' => __( 'Activate', 'startup-reloaded' ),
		'id' => 'navbar-on',
		'std' => '1',
		'type' => 'checkbox'
	);

	$navbar_position = array(
        'navbar-normal'       => __( 'Normal', 'startup-reloaded' ),
		'navbar-static-top'   => __( 'Static top', 'startup-reloaded' ),
		'navbar-fixed-top'    => __( 'Fixed top', 'startup-reloaded' ),
        'navbar-fixed-slider' => __( 'Fixed under slider', 'startup-reloaded' ),
        'navbar-static-header' => __( 'Static under header', 'startup-reloaded' ),
        'navbar-fixed-header' => __( 'Fixed under header', 'startup-reloaded' ),
		'navbar-fixed-bottom' => __( 'Fixed bottom', 'startup-reloaded' )
	);
    
	$options[] = array(
		'desc' => __( 'Position', 'startup-reloaded' ),
		'id' => 'navbar-position',
		'std' => 'navbar-fixed-top',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_position
	);
    
	$options[] = array(
		'desc' => __( 'Transparent on homepage. Available for fixed top navbar only.', 'startup-reloaded' ),
		'id' => 'navbar-transparent',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Translucent background on hover. For transparent navbar only.', 'startup-reloaded' ),
		'id' => 'navbar-translucent',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'navbar-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $navbar_logo_positions = array(
		'navbar-left' => __( 'Left', 'startup-reloaded' ),
		'navbar-right' => __( 'Right', 'startup-reloaded' ),
        '' => __( 'Hidden', 'startup-reloaded' )
	);
    
	$options[] = array(
		'desc' => __( 'Logo Position', 'startup-reloaded' ),
		'id' => 'navbar-logo-position',
		'std' => 'navbar-left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_logo_positions
	);
    
    $navbar_item_positions = array(
		'navbar-left' => __( 'Left', 'startup-reloaded' ),
		'navbar-right' => __( 'Right', 'startup-reloaded' )
	);
    
    $options[] = array(
		'desc' => __( 'Menu Position', 'startup-reloaded' ),
		'id' => 'navbar-menu-position',
		'std' => 'navbar-right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);
    
    $options[] = array(
		'desc' => __( 'Hamburger Position', 'startup-reloaded' ),
		'id' => 'navbar-hamburger-position',
		'std' => 'navbar-right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);

	$options[] = array(
		'desc' => __( 'Inverse style', 'startup-reloaded' ),
		'id' => 'navbar-inverse',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'name' => __( 'Search', 'startup-reloaded' ),
		'desc' => __( 'Activate search form. (experimental)', 'startup-reloaded' ),
		'id' => 'navbar-search',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Fullscreen panel', 'startup-reloaded' ),
        'desc' => __( 'Activate. Use <strong>data-toggle="modal" data-target="#fullscreen-panel"</strong> on any button / link or activate navbar hamburger below to make the magic happen.', 'startup-reloaded' ),
		'id' => 'fullscreen-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Activate navbar hamburger.', 'startup-reloaded' ),
		'id' => 'fullscreen-panel-hamburger',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Override hamburger icon with a text.', 'startup-reloaded' ),
		'id' => 'fullscreen-panel-hamburger-text',
        'type' => 'text',
        'class' => 'mini'
	);
    
	$options[] = array(
		'name' => __( 'Left panel', 'startup-reloaded' ),
        'desc' => __( 'Activate. Use <strong>#left-panel</strong> on any link / menu item or activate navbar hamburger below to make the magic go on.', 'startup-reloaded' ),
		'id' => 'left-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Activate navbar hamburger.', 'startup-reloaded' ),
		'id' => 'left-panel-hamburger',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Override hamburger icon with a text.', 'startup-reloaded' ),
		'id' => 'left-panel-hamburger-text',
        'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
        'desc' => __( 'Push page content', 'startup-reloaded' ),
		'id' => 'left-panel-push',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'left-panel-color',
        'std' => '#323232',
		'type' => 'color'
	);
    
	$options[] = array(
		'desc' => __( 'Theme', 'startup-reloaded' ),
		'id' => 'left-panel-theme',
		'std' => 'theme-dark',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'theme-light' => __( 'Light', 'startup-reloaded' ),
            'theme-dark' => __( 'Dark', 'startup-reloaded' )
        )
	);
    
	$options[] = array(
		'desc' => __( 'Mode', 'startup-reloaded' ),
		'id' => 'left-panel-mode',
		'std' => 'default',
        'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'default' => __( 'Default', 'startup-reloaded' ),
            'tileview' => __( 'Tileview', 'startup-reloaded' )
        )
	);
    
    $options[] = array(
        'desc' => __( 'Slide items (optional for default mode only)', 'startup-reloaded' ),
		'id' => 'left-panel-slide',
		'std' => '1',
		'type' => 'checkbox'
	);
     
	$options[] = array(
		'name' => __( 'Right panel', 'startup-reloaded' ),
        'desc' => __( 'Activate. Use <strong>#right-panel</strong> on any link / menu item or activate navbar hamburger below to make the fantasy happen.', 'startup-reloaded' ),
		'id' => 'right-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Activate navbar hamburger.', 'startup-reloaded' ),
		'id' => 'right-panel-hamburger',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Override hamburger icon with a text.', 'startup-reloaded' ),
		'id' => 'right-panel-hamburger-text',
        'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
        'desc' => __( 'Push page content', 'startup-reloaded' ),
		'id' => 'right-panel-push',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'right-panel-color',
        'std' => '#323232',
		'type' => 'color'
	);
    
	$options[] = array(
		'desc' => __( 'Theme', 'startup-reloaded' ),
		'id' => 'right-panel-theme',
		'std' => 'theme-dark',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'theme-light' => __( 'Light', 'startup-reloaded' ),
            'theme-dark' => __( 'Dark', 'startup-reloaded' )
        )
	);
    
	$options[] = array(
		'desc' => __( 'Mode', 'startup-reloaded' ),
		'id' => 'right-panel-mode',
		'std' => 'default',
        'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'default' => __( 'Default', 'startup-reloaded' ),
            'tileview' => __( 'Tileview', 'startup-reloaded' )
        )
	);
    
    $options[] = array(
        'desc' => __( 'Slide items (optional for default mode only)', 'startup-reloaded' ),
		'id' => 'right-panel-slide',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    //*****************************************************************************
    //*****************************************************************************
    //
    // Slider
    //
    //*****************************************************************************
    //*****************************************************************************
    
    if (is_plugin_active('startup-cpt-slider/startup-cpt-slider.php')){
    
	$options[] = array(
		'name' => __( 'Slider', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'desc' => __( 'Activate on homepage', 'startup-reloaded' ),
		'id' => 'slider-on',
		'std' => '1',
		'type' => 'checkbox'
	);
        
    $options[] = array(
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'slider-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
        
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'slider-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    
    $options[] = array(
		'desc' => __( 'Height in px. "100%" for full viewport height', 'startup-reloaded' ),
		'id' => 'slider-height',
		'std' => '400',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
		'desc' => __( 'Interval in ms or false', 'startup-reloaded' ),
		'id' => 'slider-interval',
		'std' => '4000',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $slider_transition = array(
		'carousel-slide' => __( 'Slide', 'startup-reloaded' ),
		'carousel-fade' => __( 'Fade', 'startup-reloaded' )
	);
    
    $options[] = array(
		'desc' => __( 'Transition', 'startup-reloaded' ),
		'id' => 'slider-transition',
		'std' => 'carousel-fade',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_transition
	);
    
	$options[] = array(
		'desc' => __( 'Show arrows if more than one slide', 'startup-reloaded' ),
		'id' => 'slider-arrows',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    require get_template_directory() . '/inc/hover-css.php';
    
    $options[] = array(
		'desc' => __( 'Arrows hover effect', 'startup-reloaded' ),
		'id' => 'slider-arrows-hover',
		'std' => 'float',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $hover_css
	);
    
    $slider_navigation= array(
        'slider_no_nav' => __( 'None', 'startup-reloaded' ),
		'slider_pagination' => __( 'Pagination', 'startup-reloaded' ),
		'slider_content_arrow' => __( 'Content arrow', 'startup-reloaded' )
	);
    
    $options[] = array(
		'desc' => __( 'Navigation type', 'startup-reloaded' ),
		'id' => 'slider-navigation',
		'std' => 'slider_content_arrow',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_navigation
	);
    
    }
    //*****************************************************************************
    //*****************************************************************************
    //
    // Post types
    //
    //*****************************************************************************
    //*****************************************************************************
    
	$options[] = array(
		'name' => __( 'Post types', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
    if (is_plugin_active('startup-cpt-home/startup-cpt-home.php')){
    $options[] = array(
		'name' => __( 'Home', 'startup-reloaded' ),
        'desc' => __( 'Generate home content with Home plugin custom post sections. If not, use a classic page with the Home template.', 'startup-reloaded' ),
		'id' => 'home-type',
		'std' => '0',
		'type' => 'checkbox'
	);
    }
        
    $blog_styles = array(
		'grid' => __( 'Grid', 'startup-reloaded' ),
		'shuffle' => __( 'Shuffle', 'startup-reloaded' )
	);
    
	$options[] = array(
		'name' => __( 'Blog', 'startup-reloaded' ),
        'desc' => __( 'Style', 'startup-reloaded' ),
		'id' => 'blog-style',
		'std' => 'shuffle',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $blog_styles
	);
    
    $blog_filters = array(
		'buttons' => __( 'Buttons', 'startup-reloaded' ),
		'dropdown' => __( 'Dropdown', 'startup-reloaded' )
	);
    
    $options[] = array(
        'desc' => __( 'Shuffle filter type', 'startup-reloaded' ),
		'id' => 'blog-filter',
		'std' => 'dropdown',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $blog_filters
	);
    
    $options[] = array(
		'desc' => __( 'Max number of items to show for grid style. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'blog-number',
		'std' => '8',
		'type' => 'text',
		'class' => 'mini'
	);
    
    if (is_plugin_active('startup-cpt-portfolio/startup-cpt-portfolio.php')){
    $portfolio_styles = array(
		'grid' => __( 'Grid', 'startup-reloaded' ),
		'shuffle' => __( 'Shuffle', 'startup-reloaded' )
	);
    
	$options[] = array(
		'name' => __( 'Portfolio', 'startup-reloaded' ),
        'desc' => __( 'Style', 'startup-reloaded' ),
		'id' => 'portfolio-style',
		'std' => 'grid',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $portfolio_styles
	);
        
    $options[] = array(
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'portfolio-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    
    $options[] = array(
		'desc' => __( 'Max number of items to show for grid style. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'portfolio-number',
		'std' => '8',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-testimonials/startup-cpt-testimonials.php')){
    $options[] = array(
		'name' => __( 'Testimonials', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'testimonials-order',
		'std' => 'rand',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'testimonials-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }

    if (is_plugin_active('startup-cpt-partners/startup-cpt-partners.php')){
    $options[] = array(
		'name' => __( 'Partners', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'partners-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'partners-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-milestones/startup-cpt-milestones.php')){
    $options[] = array(
		'name' => __( 'Milestones', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'milestones-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'milestones-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-products/startup-cpt-products.php')){
    $options[] = array(
		'name' => __( 'Products', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'products-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'products-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-projects/startup-cpt-projects.php')){
    $options[] = array(
		'name' => __( 'Projects', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'projects-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'projects-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-services/startup-cpt-services.php')){
    $options[] = array(
		'name' => __( 'Services', 'startup-reloaded' ),
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'services-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'services-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }
    
    if (is_plugin_active('startup-cpt-team/startup-cpt-team.php')){
    $options[] = array(
        'name' => __( 'Team', 'startup-reloaded' ),
		'desc' => __( 'Carousel if more than 4', 'startup-reloaded' ),
		'id' => 'team-slider',
		'std' => '1',
		'type' => 'checkbox'
	);
    $options[] = array(
        'desc' => __( 'Display order', 'startup-reloaded' ),
		'id' => 'team-order',
		'std' => 'menu_order',
		'type' => 'select',
        'class' => 'mini',
        'options' => array(
		  'rand' => __( 'Random', 'startup-reloaded' ),
		  'menu_order' => __( 'Menu order', 'startup-reloaded' )
            )
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'team-number',
		'std' => '',
		'type' => 'text',
		'class' => 'mini'
	);
    }

    //*****************************************************************************
    //*****************************************************************************
    //
    // Advanced
    //
    //*****************************************************************************
    //*****************************************************************************
    
	$options[] = array(
		'name' => __( 'Advanced', 'startup-reloaded' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'name' => __( 'Mise en forme automatique', 'startup-reloaded' ),
		'desc' => __( 'Cocher pour <strong>desactiver</strong> la mise en forme automatique de l\'editeur WordPress. Evite les br, p, et suppression de lignes vides, etc...', 'startup-reloaded' ),
		'id' => 'auto-format-off',
		'std' => '0',
		'type' => 'checkbox'
	);
    
	return $options;
}

function exampletheme_options_after() { ?>
    <p>Content after the options panel!</p>
<?php }

//add_action('optionsframework_after','exampletheme_options_after', 100);