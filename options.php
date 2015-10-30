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
		'desc' => __( 'Activate YTPlayer', 'startup-reloaded' ),
		'id' => 'general-ytplayer',
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
        //'' => __( 'Float', 'startup-reloaded' ),
		'navbar-static-top' => __( 'Static top', 'startup-reloaded' ),
		'navbar-fixed-top' => __( 'Fixed top', 'startup-reloaded' ),
        'navbar-fixed-slider' => __( 'Under slider', 'startup-reloaded' ),
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
    
    $navbar_item_positions = array(
		'navbar-left' => __( 'Left', 'startup-reloaded' ),
		'navbar-right' => __( 'Right', 'startup-reloaded' )
	);
    
	$options[] = array(
		'desc' => __( 'Logo Position', 'startup-reloaded' ),
		'id' => 'navbar-logo-position',
		'std' => 'navbar-left',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $navbar_item_positions
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
		'desc' => __( 'Max number of items to show for grid style. Leave empty for unlimited.', 'startup-reloaded' ),
		'id' => 'portfolio-number',
		'std' => '8',
		'type' => 'text',
		'class' => 'mini'
	);
    }

//    // Fonts
//	$options[] = array(
//		'name' => __( 'Fonts', 'startup-reloaded' ),
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
		'desc' => __( 'Cocher pour <strong>desactiver</strong> la mise en forme automatique de l\'editeur WordPress. Permet de garder le controle de votre code. ( Evite les br, p, et suppression de lignes vides, etc...)', 'startup-reloaded' ),
		'id' => 'auto-format-off',
		'std' => '1',
		'type' => 'checkbox'
	);
    
	return $options;
}