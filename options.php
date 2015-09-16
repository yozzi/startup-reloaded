<?php
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

function optionsframework_options() {
    
    // Général
    $options[] = array(
		'name' => __( 'Général', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
    $options[] = array(
		'name' => __( 'StartUp serial number', 'theme-textdomain' ),
		'id' => 'general-serial',
		'std' => '',
		'type' => 'text'
	);
    
	$options[] = array(
		'name' => __( 'Layout', 'theme-textdomain' ),
		'type' => 'info'
	);
    
	$options[] = array(
		'desc' => __( 'Responsive', 'theme-textdomain' ),
		'id' => 'general-responsive',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$options[] = array(
		'desc' => __( 'Boxed', 'theme-textdomain' ),
		'id' => 'general-boxed',
		'std' => '0',
		'type' => 'checkbox'
	);
    
	$options[] = array(
		'name' => __( 'Page transitions', 'theme-textdomain' ),
        'desc' => __( 'Activate', 'theme-textdomain' ),
		'id' => 'page-transition',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$general_page_transitions = array(
		'fade-in' => __( 'Fade in', 'theme-textdomain' ),
		'fade-out' => __( 'Fade out', 'theme-textdomain' ),
        'fade-in-up' => __( 'Fade in up', 'theme-textdomain' ),
		'fade-out-up' => __( 'Fade out up', 'theme-textdomain' ),
        'fade-in-down' => __( 'Fade in down', 'theme-textdomain' ),
		'fade-out-down' => __( 'Fade out down', 'theme-textdomain' ),
        'fade-in-left' => __( 'Fade in left', 'theme-textdomain' ),
		'fade-out-left' => __( 'Fade out left', 'theme-textdomain' ),
        'fade-in-right' => __( 'Fade in right', 'theme-textdomain' ),
		'fade-out-right' => __( 'Fade out right', 'theme-textdomain' ),
        'rotate-in' => __( 'Rotate in', 'theme-textdomain' ),
		'rotate-out' => __( 'Rotate out', 'theme-textdomain' ),
        'flip-in-x' => __( 'Flip in X', 'theme-textdomain' ),
		'flip-out-x' => __( 'Flip out X', 'theme-textdomain' ),
        'flip-in-y' => __( 'Flip in Y', 'theme-textdomain' ),
		'flip-out-y' => __( 'Flip out Y', 'theme-textdomain' ),
        'zoom-in' => __( 'Zoom in', 'theme-textdomain' ),
		'zoom-out' => __( 'Zoom out', 'theme-textdomain' ),
	);
    
	$options[] = array(
		'desc' => __( 'Transition in', 'theme-textdomain' ),
		'id' => 'page-transition-in',
		'std' => 'fade-in',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
	);
    
    $options[] = array(
		'desc' => __( 'Transition out', 'theme-textdomain' ),
		'id' => 'page-transition-out',
		'std' => 'fade-out',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
	);
    
	$options[] = array(
		'name' => __( 'Options', 'theme-textdomain' ),
		'type' => 'info'
	);
    
	$options[] = array(
		'desc' => __( 'Back to top button', 'theme-textdomain' ),
		'id' => 'general-back-to-top',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	$options[] = array(
		'desc' => __( 'Activate YTPlayer', 'theme-textdomain' ),
		'id' => 'general-ytplayer',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Footer content', 'theme-textdomain' ),
		'id' => 'general-footer',
		'std' => 'Website powered with Startup by <a href="http://yozz.net" target="_blank">yozz.net</a>',
		'type' => 'textarea'
	);
    
    $options[] = array(
		'name' => __( 'Google Analytics ID', 'theme-textdomain' ),
		'desc' => __( 'Provided by Google in the form UA-XXXXXXX-XX', 'theme-textdomain' ),
		'id' => 'general-ga',
		'std' => '',
		'type' => 'text'
	);
    
    // Style
    $options[] = array(
		'name' => __( 'Style', 'theme-textdomain' ),
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
        "desc" => 'List of css files in theme directory /css',
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
		'name' =>  __( 'Background', 'theme-textdomain' ),
		'desc' => __( 'Change the background CSS.', 'theme-textdomain' ),
		'id' => 'style-background',
		'std' => $background_defaults,
		'type' => 'background'
	);
    
	$options[] = array(
		'name' => __( '', 'theme-textdomain' ),
        'desc' => __( 'Cover', 'theme-textdomain' ),
		'id' => 'style-cover',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Custom button', 'theme-textdomain' ),
        'desc' => __( 'Corner radius in px', 'theme-textdomain' ),
		'id' => 'button-radius',
		'std' => '6',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
        'desc' => __( 'Background', 'theme-textdomain' ),
		'id' => 'button-background',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Text', 'theme-textdomain' ),
		'id' => 'button-text',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Hover, focus, active background', 'theme-textdomain' ),
		'id' => 'button-hover-background',
		'std' => '#000000',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Hover, focus, active text', 'theme-textdomain' ),
		'id' => 'button-hover-text',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Disabled background', 'theme-textdomain' ),
		'id' => 'button-disabled-background',
		'std' => '#2a2a2a',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Badge background', 'theme-textdomain' ),
		'id' => 'button-badge-background',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Badge text', 'theme-textdomain' ),
		'id' => 'button-badge-text',
		'std' => '#000000',
		'type' => 'color'
	);
    
	$options[] = array(
		'name' => __( 'Page header', 'theme-textdomain' ),
        'desc' => __( 'Hide the header. Or not. Overrides individual page setting if ckecked.', 'theme-textdomain' ),
		'id' => 'page-header-hidden',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Background', 'theme-textdomain' ),
		'id' => 'page-header-background-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
		'desc' => __( 'Text', 'theme-textdomain' ),
		'id' => 'page-header-text-color',
		'std' => '#ffffff',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Padding in px', 'theme-textdomain' ),
		'id' => 'page-header-padding',
		'std' => '50',
		'type' => 'text',
        'class' => 'mini'
	);
    
	$page_header_positions = array(
		'left' => __( 'Left', 'theme-textdomain' ),
		'center' => __( 'Center', 'theme-textdomain' ),
		'right' => __( 'Right', 'theme-textdomain' )
	);
    
	$options[] = array(
		'desc' => __( 'Content position', 'theme-textdomain' ),
		'id' => 'page-header-position',
		'std' => 'left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $page_header_positions
	);
    
	$options[] = array(
        'desc' => __( 'Put the text inside a box', 'theme-textdomain' ),
		'id' => 'page-header-boxed',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Footer', 'theme-textdomain' ),
		'id' => 'footer-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
		'name' => __( 'Custom CSS', 'theme-textdomain' ),
		'id' => 'custom-css',
		'type' => 'textarea'
	);
    
    // Navigation
    $options[] = array(
		'name' => __( 'Navigation', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'name' => __( 'Navbar', 'theme-textdomain' ),
        'desc' => __( 'Activate', 'theme-textdomain' ),
		'id' => 'navbar-on',
		'std' => '1',
		'type' => 'checkbox'
	);

	$navbar_position = array(
        //'' => __( 'Float', 'theme-textdomain' ),
		'navbar-static-top' => __( 'Static top', 'theme-textdomain' ),
		'navbar-fixed-top' => __( 'Fixed top', 'theme-textdomain' ),
		'navbar-fixed-bottom' => __( 'Fixed bottom', 'theme-textdomain' )
	);
    
	$options[] = array(
		'desc' => __( 'Position', 'theme-textdomain' ),
		'id' => 'navbar-position',
		'std' => 'navbar-fixed-top',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_position
	);
    
	$options[] = array(
		'desc' => __( 'Transparent on homepage. Available for fixed top navbar only.', 'theme-textdomain' ),
		'id' => 'navbar-transparent',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Translucent background on hover. For transparent navbar only.', 'theme-textdomain' ),
		'id' => 'navbar-translucent',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'navbar-color',
		'std' => '#323232',
		'type' => 'color'
	);
    
    $options[] = array(
        'desc' => __( 'Height in px. Required for fixed-top position to prevent content overlapping. Should be left blank or set to 0 for other navbar positions.', 'theme-textdomain' ),
		'id' => 'navbar-height',
		'std' => '50',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $navbar_item_positions = array(
		'navbar-left' => __( 'Left', 'theme-textdomain' ),
		'navbar-right' => __( 'Right', 'theme-textdomain' )
	);
    
	$options[] = array(
		'desc' => __( 'Logo Position', 'theme-textdomain' ),
		'id' => 'navbar-logo-position',
		'std' => 'navbar-left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);
    
    $options[] = array(
		'desc' => __( 'Menu Position', 'theme-textdomain' ),
		'id' => 'navbar-menu-position',
		'std' => 'navbar-right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);

	$options[] = array(
		'desc' => __( 'Inverse style', 'theme-textdomain' ),
		'id' => 'navbar-inverse',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'name' => __( 'Fullscreen panel', 'theme-textdomain' ),
        'desc' => __( 'Activate. Use <strong>data-toggle="modal" data-target="#fullscreen-panel"</strong> on any button / link or activate navbar hamburger below to make the magic happen.', 'theme-textdomain' ),
		'id' => 'fullscreen-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Activate navbar hamburger.', 'theme-textdomain' ),
		'id' => 'fullscreen-panel-hamburger',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
        'desc' => __( 'Override hamburger with a text.', 'theme-textdomain' ),
		'id' => 'fullscreen-panel-hamburger-text',
        'type' => 'text',
        'class' => 'mini'
	);
    
	$options[] = array(
		'name' => __( 'Left panel', 'theme-textdomain' ),
        'desc' => __( 'Activate. Use <strong>#left-panel</strong> on any button / link / menu item to make the magic go on.', 'theme-textdomain' ),
		'id' => 'left-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'left-panel-color',
        'std' => '#323232',
		'type' => 'color'
	);
    
	$options[] = array(
		'desc' => __( 'Theme', 'theme-textdomain' ),
		'id' => 'left-panel-theme',
		'std' => 'theme-dark',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'theme-light' => __( 'Light', 'theme-textdomain' ),
            'theme-dark' => __( 'Dark', 'theme-textdomain' )
        )
	);
    
	$options[] = array(
		'desc' => __( 'Mode', 'theme-textdomain' ),
		'id' => 'left-panel-mode',
		'std' => 'default',
        'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'default' => __( 'Default', 'theme-textdomain' ),
            'tileview' => __( 'Tileview', 'theme-textdomain' )
        )
	);	
     
	$options[] = array(
		'name' => __( 'Right panel', 'theme-textdomain' ),
        'desc' => __( 'Activate. Use <strong>#right-panel</strong> on any button / link / menu item to make the fantasy happen.', 'theme-textdomain' ),
		'id' => 'right-panel-on',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'id' => 'right-panel-color',
        'std' => '#323232',
		'type' => 'color'
	);
    
	$options[] = array(
		'desc' => __( 'Theme', 'theme-textdomain' ),
		'id' => 'right-panel-theme',
		'std' => 'theme-dark',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'theme-light' => __( 'Light', 'theme-textdomain' ),
            'theme-dark' => __( 'Dark', 'theme-textdomain' )
        )
	);
    
	$options[] = array(
		'desc' => __( 'Mode', 'theme-textdomain' ),
		'id' => 'right-panel-mode',
		'std' => 'default',
        'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array(
            'default' => __( 'Default', 'theme-textdomain' ),
            'tileview' => __( 'Tileview', 'theme-textdomain' )
        )
	);	
    
    // Slider
	$options[] = array(
		'name' => __( 'Slider', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'desc' => __( 'Activate on homepage', 'theme-textdomain' ),
		'id' => 'slider-on',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    $options[] = array(
		'desc' => __( 'Height in px', 'theme-textdomain' ),
		'id' => 'slider-height',
		'std' => '400',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $options[] = array(
		'desc' => __( 'Interval in ms or false', 'theme-textdomain' ),
		'id' => 'slider-interval',
		'std' => '4000',
		'type' => 'text',
        'class' => 'mini'
	);
    
    $slider_transition = array(
		'carousel-slide' => __( 'Slide', 'theme-textdomain' ),
		'carousel-fade' => __( 'Fade', 'theme-textdomain' )
	);
    
    $options[] = array(
		'desc' => __( 'Transition', 'theme-textdomain' ),
		'id' => 'slider-transition',
		'std' => 'carousel-fade',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_transition
	);
    
	$options[] = array(
		'desc' => __( 'Show arrows', 'theme-textdomain' ),
		'id' => 'slider-arrows',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    require get_template_directory() . '/inc/hover-css.php';
    
    $options[] = array(
		'desc' => __( 'Arrows hover effect', 'theme-textdomain' ),
		'id' => 'slider-arrows-hover',
		'std' => 'float',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $hover_css
	);
    
    $slider_navigation= array(
        'slider_no_nav' => __( 'None', 'theme-textdomain' ),
		'slider_pagination' => __( 'Pagination', 'theme-textdomain' ),
		'slider_content_arrow' => __( 'Content arrow', 'theme-textdomain' )
	);
    
    $options[] = array(
		'desc' => __( 'Navigation type', 'theme-textdomain' ),
		'id' => 'slider-navigation',
		'std' => 'slider_content_arrow',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_navigation
	);
    
    // Post types
	$options[] = array(
		'name' => __( 'Post types', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
    $portfolio_styles= array(
		'grid' => __( 'Grid', 'theme-textdomain' ),
		'shuffle' => __( 'Shuffle', 'theme-textdomain' )
	);
    
	$options[] = array(
		'name' => __( 'Portfolio', 'theme-textdomain' ),
        'desc' => __( 'Style', 'theme-textdomain' ),
		'id' => 'portfolio-style',
		'std' => 'grid',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $portfolio_styles
	);
    $options[] = array(
		'desc' => __( 'Max number of items to show for grid style. Leave empty for unlimited.', 'theme-textdomain' ),
		'id' => 'portfolio-number',
		'std' => '8',
		'type' => 'text',
		'class' => 'mini'
	);

//    // Fonts
//	$options[] = array(
//		'name' => __( 'Fonts', 'theme-textdomain' ),
//		'type' => 'heading'
//	);
//    
//    /**
//    * Returns an array of system fonts
//    */
//
//    function options_typography_get_os_fonts() {
//        // OS Font Defaults
//        $os_faces = array(
//            'Arial, sans-serif' => 'Arial',
//            '"Avant Garde", sans-serif' => 'Avant Garde',
//            'Cambria, Georgia, serif' => 'Cambria',
//            'Copse, sans-serif' => 'Copse',
//            'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
//            'Georgia, serif' => 'Georgia',
//            '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
//            'Tahoma, Geneva, sans-serif' => 'Tahoma'
//        );
//        return $os_faces;
//    }
//    
//    /**
//    * Returns a select list of Google fonts
//    */
//
//    function options_typography_get_google_fonts() {
//        // Google Font Defaults
//        $google_faces = array(
//            'Arvo, serif' => 'Arvo',
//            'Copse, sans-serif' => 'Copse',
//            'Droid Sans, sans-serif' => 'Droid Sans',
//            'Droid Serif, serif' => 'Droid Serif',
//            'Lobster, cursive' => 'Lobster',
//            'Nobile, sans-serif' => 'Nobile',
//            'Open Sans, sans-serif' => 'Open Sans',
//            'Oswald, sans-serif' => 'Oswald',
//            'Pacifico, cursive' => 'Pacifico',
//            'Rokkitt, serif' => 'Rokkit',
//            'PT Sans, sans-serif' => 'PT Sans',
//            'Quattrocento, serif' => 'Quattrocento',
//            'Raleway, cursive' => 'Raleway',
//            'Ubuntu, sans-serif' => 'Ubuntu',
//            'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
//        );
//	   return $google_faces;
//    }
//    
//    // Mixer les deux
//    $typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
//    asort($typography_mixed_fonts);
//    
//    $options[] = array( 'name' => 'Selected Google Fonts',
//        'desc' => 'Fifteen of the top google fonts.',
//        'id' => 'google_font',
//        'std' => array( 'size' => '36px', 'face' => 'Rokkitt, serif', 'color' => '#00bc96'),
//        'type' => 'typography',
//        'options' => array(
//            'faces' => options_typography_get_google_fonts(),
//            'styles' => false )
//	);
//	
//    $options[] = array( 'name' => 'System Fonts and Google Fonts Mixed',
//        'desc' => 'Google fonts mixed with system fonts.',
//        'id' => 'google_mixed',
//        'std' => array( 'size' => '32px', 'face' => 'Georgia, serif', 'color' => '#f15081'),
//        'type' => 'typography',
//        'options' => array(
//            'faces' => $typography_mixed_fonts,
//            'styles' => false )
//	);
//	
//    $options[] = array( 'name' => 'System Fonts and Google Fonts Mixed (2)',
//        'desc' => 'Google fonts mixed with system fonts.',
//        'id' => 'google_mixed_2',
//        'std' => array( 'size' => '28px', 'face' => 'Arvo, serif', 'color' => '#ee9f23'),
//        'type' => 'typography',
//        'options' => array(
//            'faces' => $typography_mixed_fonts,
//            'styles' => false )
//	);
//    
//    /**
// * Checks font options to see if a Google font is selected.
// * If so, options_typography_enqueue_google_font is called to enqueue the font.
// * Ensures that each Google font is only enqueued once.
// */
// 
//if ( !function_exists( 'options_typography_google_fonts' ) ) {
//	function options_typography_google_fonts() {
//		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
//		// Define all the options that possibly have a unique Google font
//		$google_font = of_get_option('google_font', 'Rokkitt, serif');
//		$google_mixed = of_get_option('google_mixed', false);
//		$google_mixed_2 = of_get_option('google_mixed_2', 'Arvo, serif');
//		// Get the font face for each option and put it in an array
//		$selected_fonts = array(
//			$google_font['face'],
//			$google_mixed['face'],
//			$google_mixed_2['face'] );
//		// Remove any duplicates in the list
//		$selected_fonts = array_unique($selected_fonts);
//		// Check each of the unique fonts against the defined Google fonts
//		// If it is a Google font, go ahead and call the function to enqueue it
//		foreach ( $selected_fonts as $font ) {
//			if ( in_array( $font, $all_google_fonts ) ) {
//				options_typography_enqueue_google_font($font);
//			}
//		}
//	}
//}
//
//add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

    // Advanced
	$options[] = array(
		'name' => __( 'Advanced', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
	$options[] = array(
		'name' => __( 'Mise en forme automatique', 'theme-textdomain' ),
		'desc' => __( 'Cocher pour <strong>désactiver</strong> la mise en forme automatique de l\'éditeur WordPress. Permet de garder le contrôle de votre code. ( Évite les br, p, et suppression de lignes vides, etc...)', 'theme-textdomain' ),
		'id' => 'auto-format-off',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	return $options;
}