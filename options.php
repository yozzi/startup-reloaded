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
    
    // Général Serial
    $options[] = array(
		'name' => __( 'StartUp serial number', 'theme-textdomain' ),
		'id' => 'general-serial',
		'std' => '',
		'type' => 'text'
	);
    
    // Général Responsive
	$options[] = array(
		'name' => __( 'Responsive', 'theme-textdomain' ),
		'id' => 'general-responsive',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Général Boxed
	$options[] = array(
		'name' => __( 'Boxed', 'theme-textdomain' ),
		'id' => 'general-boxed',
		'std' => '0',
		'type' => 'checkbox'
	);
    
    // Général Back to top button
	$options[] = array(
		'name' => __( 'Back to top button', 'theme-textdomain' ),
		'id' => 'general-back-to-top',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Général Footer
    $options[] = array(
		'name' => __( 'Footer content', 'theme-textdomain' ),
		'id' => 'general-footer',
		'std' => 'Website powered with Startup by <a href="http://yozz.net" target="_blank">yozz.net</a>',
		'type' => 'textarea'
	);
    
    // Général Analytics
    $options[] = array(
		'name' => __( 'Google Analytics ID', 'theme-textdomain' ),
		'desc' => __( 'Provided by Google in the form UA-XXXXXXX-XX', 'theme-textdomain' ),
		'id' => 'general-ga',
		'std' => '',
		'type' => 'text'
	);
    
    // Général page transition
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
		'name' => __( 'Page transition in', 'theme-textdomain' ),
		'id' => 'page-transition-in',
		'std' => 'fade-in',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
	);
    
    $options[] = array(
		'name' => __( 'Page transition out', 'theme-textdomain' ),
		'id' => 'page-transition-out',
		'std' => 'fade-out',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $general_page_transitions
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
    
//    // Style Primary Color
//    $options[] = array(
//		'name' => __( 'Primary color', 'theme-textdomain' ),
//		'desc' => __( 'Navbar background, footer, sidebar', 'theme-textdomain' ),
//		'id' => 'primary-color',
//		'std' => '#323232',
//		'type' => 'color'
//	);
//    
//    // Style Secondary Color
//    $options[] = array(
//		'name' => __( 'Secondary color', 'theme-textdomain' ),
//		'desc' => __( '', 'theme-textdomain' ),
//		'id' => 'secondary-color',
//		'std' => '',
//		'type' => 'color'
//	);
//    
//   // Style Ternary Color
//    $options[] = array(
//		'name' => __( 'Ternary', 'theme-textdomain' ),
//		'desc' => __( '', 'theme-textdomain' ),
//		'id' => 'ternary-color',
//		'std' => '',
//		'type' => 'color'
//	);
    
    // Style Background
    
    // Background Defaults
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
    
    // Style Background Size
	$options[] = array(
		'name' => __( 'Background Cover', 'theme-textdomain' ),
		'id' => 'style-cover',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Navbar
    $options[] = array(
		'name' => __( 'Navbar', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
    // Navbar activate
	$options[] = array(
		'name' => __( 'Activate navbar', 'theme-textdomain' ),
		'id' => 'navbar-on',
		'std' => '1',
		'type' => 'checkbox'
	);

    // Navbar position
	$navbar_position = array(
        //'' => __( 'Float', 'theme-textdomain' ),
		'navbar-static-top' => __( 'Static top', 'theme-textdomain' ),
		'navbar-fixed-top' => __( 'Fixed top', 'theme-textdomain' ),
		'navbar-fixed-bottom' => __( 'Fixed bottom', 'theme-textdomain' )
	);
    
	$options[] = array(
		'name' => __( 'Position', 'theme-textdomain' ),
		'id' => 'navbar-position',
		'std' => 'navbar-fixed-top',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_position
	);
    
    // Navbar opacity
	$options[] = array(
		'name' => __( 'Opacity', 'theme-textdomain' ),
		'desc' => __( 'Transparent on homepage. Available for fixed top navbar only', 'theme-textdomain' ),
		'id' => 'navbar-transparent',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Navbar height
    $options[] = array(
		'name' => __( 'Height in px', 'theme-textdomain' ),
		'id' => 'navbar-height',
		'std' => '50',
		'type' => 'text'
	);
    
    // Navbar item positions
    $navbar_item_positions = array(
		'pull-left' => __( 'Left', 'theme-textdomain' ),
		'pull-right' => __( 'Right', 'theme-textdomain' )
	);
    
	$options[] = array(
		'name' => __( 'Logo Position', 'theme-textdomain' ),
		'id' => 'navbar-logo-position',
		'std' => 'pull-left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);
    
    $options[] = array(
		'name' => __( 'Menu Position', 'theme-textdomain' ),
		'id' => 'navbar-menu-position',
		'std' => 'pull-right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
	);

//    // Navbar style
//	$options[] = array(
//		'name' => __( 'Style', 'theme-textdomain' ),
//		'desc' => __( 'Inverse.', 'theme-textdomain' ),
//		'id' => 'navbar-inverse',
//		'std' => '',
//		'type' => 'checkbox'
//	);
    
    // Slider
	$options[] = array(
		'name' => __( 'Slider', 'theme-textdomain' ),
		'type' => 'heading'
	);
    
    // Slider activate
	$options[] = array(
		'name' => __( 'Slider on homepage', 'theme-textdomain' ),
		'id' => 'slider-on',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Slider height
    $options[] = array(
		'name' => __( 'Height in px', 'theme-textdomain' ),
		'id' => 'slider-height',
		'std' => '400',
		'type' => 'text'
	);
    
    // Slider interval
    $options[] = array(
		'name' => __( 'Interval in ms or false', 'theme-textdomain' ),
		'id' => 'slider-interval',
		'std' => '4000',
		'type' => 'text'
	);
    
    // Slider transition
    $slider_transition = array(
		'carousel-slide' => __( 'Slide', 'theme-textdomain' ),
		'carousel-fade' => __( 'Fade', 'theme-textdomain' )
	);
    
    $options[] = array(
		'name' => __( 'Transition', 'theme-textdomain' ),
		'id' => 'slider-transition',
		'std' => 'carousel-fade',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_transition
	);
    
    // Slider arrows
	$options[] = array(
		'name' => __( 'Show arrows', 'theme-textdomain' ),
		'id' => 'slider-arrows',
		'std' => '1',
		'type' => 'checkbox'
	);
    
    // Slider arrows hover effect
    require get_template_directory() . '/inc/hover-css.php';
    
    $options[] = array(
		'name' => __( 'Slider arrows hover effect', 'theme-textdomain' ),
		'id' => 'slider-arrows-hover',
		'std' => 'float',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $hover_css
	);
    
    // Slider navigation
    $slider_navigation= array(
        'slider_no_nav' => __( 'None', 'theme-textdomain' ),
		'slider_pagination' => __( 'Pagination', 'theme-textdomain' ),
		'slider_content_arrow' => __( 'Content arrow', 'theme-textdomain' )
	);
    
    $options[] = array(
		'name' => __( 'Navigation', 'theme-textdomain' ),
		'id' => 'slider-navigation',
		'std' => 'slider_content_arrow',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $slider_navigation
	);
    
    // Milestones
//	$options[] = array(
//		'name' => __( 'Milestones', 'theme-textdomain' ),
//		'type' => 'heading'
//	);
    
    // Milestones activate
//	$options[] = array(
//		'name' => __( 'Milestones on homepage', 'theme-textdomain' ),
//		'desc' => __( '', 'theme-textdomain' ),
//		'id' => 'milestones-on',
//		'std' => '1',
//		'type' => 'checkbox'
//	);

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
    
    // Mise en forme automatique
	$options[] = array(
		'name' => __( 'Mise en forme automatique', 'theme-textdomain' ),
		'desc' => __( 'Cocher pour <strong>désactiver</strong> la mise en forme automatique de l\'éditeur WordPress. Permet de garder le contrôle de votre code. ( Évite les br, p, et suppression de lignes vides, etc...)', 'theme-textdomain' ),
		'id' => 'auto-format-off',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	return $options;
}