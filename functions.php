<?php
/**
 * StartUp Reloaded functions and definitions
 *
 * @package StartUp Reloaded
 */

if ( ! function_exists( 'startup_reloaded_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function startup_reloaded_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on StartUp Reloaded, use a find and replace
	 * to change 'startup-reloaded' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'startup-reloaded', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'startup-reloaded' ),
        'secondary' => esc_html__( 'Secondary Menu', 'startup-reloaded' ),
        'ternery' => esc_html__( 'Ternary Menu', 'startup-reloaded' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'startup_reloaded_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // startup_reloaded_setup
add_action( 'after_setup_theme', 'startup_reloaded_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function startup_reloaded_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'startup_reloaded_content_width', 640 );
}
add_action( 'after_setup_theme', 'startup_reloaded_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Register theme features.
 */
require get_template_directory() . '/inc/features.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueues.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Charger le navwalker qui permet d'intégrer les menus WordPress à Bootstrap.
 */
require get_template_directory() . '/lib/wp_bootstrap_navwalker.php';

/**
 * Charger les Custom Post Types.
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Charger CMB2.
 */
require get_template_directory() . '/lib/CMB2/init.php';

/**
 * Charger CMB2 Gmaps.
 */
require get_template_directory() . '/lib/cmb_field_map/cmb-field-map.php';

/**
 * Charger CMB2 Slider.
 */
require get_template_directory() . '/lib/cmb2-field-slider/cmb2_field_slider.php';

/**
 * Charger les Meta boxes.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Charger les Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Charger TGM pour inclure des plugins.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Charger mon Array avec toutes les classes animate.css
 */
//require get_template_directory() . '/inc/animate-css.php';

/**
 * Loads the Options Panel
 *
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/options-framework/' );
require_once dirname( __FILE__ ) . '/lib/options-framework/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

/**
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

/*
 * This is an example of filtering menu parameters
 */

/*
function prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_slug'] = 'hello-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );
*/

/**
 * Désactiver les br automatiques de l'éditeur et autres
 */
$auto_format_off = of_get_option( 'auto-format-off' );
if( $auto_format_off == 1 ){
    remove_filter('the_content', 'wpautop');
}

/**
 * Enqueue Google Fonts
 */
require get_template_directory() . '/inc/google-fonts.php';







 /* 
 * The CSS file selected in the options panel 'stylesheet' option
 * is loaded on the theme front end
 */
 
function options_stylesheets_alt_style()   {
	if ( of_get_option('auto_stylesheet') ) {
		wp_enqueue_style( 'options_stylesheets_alt_style', of_get_option('auto_stylesheet'), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );































//    /**
// * Enqueues the Google $font that is passed
// */
// 
//function options_typography_enqueue_google_font($font) {
//	$font = explode(',', $font);
//	$font = $font[0];
//	// Certain Google fonts need slight tweaks in order to load properly
//	// Like our friend "Raleway"
//	if ( $font == 'Raleway' )
//		$font = 'Raleway:100';
//	$font = str_replace(" ", "+", $font);
//	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
//}
//    
//    /* 
// * Outputs the selected option panel styles inline into the <head>
// */
// 
//function options_typography_styles() {
//     $output = '';
//     $input = '';
//
//     if ( of_get_option( 'google_font' ) ) {
//          $input = of_get_option( 'google_font' );
//	  $output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font');
//     }
//
//     if ( $output != '' ) {
//	$output = "\n<style>\n" . $output . "</style>\n";
//	echo $output;
//     }
//}
//add_action('wp_head', 'options_typography_styles');
//    
//    /* 
// * Returns a typography option in a format that can be outputted as inline CSS
// */
// 
//function options_typography_font_styles($option, $selectors) {
//		$output = $selectors . ' {';
//		$output .= ' color:' . $option['color'] .'; ';
//		$output .= 'font-family:' . $option['face'] . '; ';
//		$output .= 'font-weight:' . $option['style'] . '; ';
//		$output .= 'font-size:' . $option['size'] . '; ';
//		$output .= '}';
//		$output .= "\n";
//		return $output;
//}



//Ajouter une class css a wp_get_attachment_link() pour empêcher qu'une transition animsition apparaisse à l'ouvertue de magnific popup
function startup_reloaded_modify_attachment_link( $markup, $id, $size, $permalink ) {
    global $post;
    if ( ! $permalink ) {
        $markup = str_replace( '<a href', '<a class="no-animsition" href', $markup );
    }
    return $markup;
}
add_filter( 'wp_get_attachment_link', 'startup_reloaded_modify_attachment_link', 10, 4 );


//Fonction pour récupérer les info d'un attachement à partir de son id, utilisé dans projects
function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}        
