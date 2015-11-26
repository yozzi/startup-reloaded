<?php
/**
 * StartUp Reloaded functions and definitions
 *
 * @package StartUp Reloaded
 */
//Include this to check if a plugin is activated with is_plugin_active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

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
		'navbar-primary' => esc_html__( 'Navbar Primary', 'startup-reloaded' ),
        'navbar-primary-non-collapsing' => esc_html__( 'Navbar Primary non-collapsing', 'startup-reloaded' ),
        'navbar-secondary' => esc_html__( 'Navbar Secondary', 'startup-reloaded' ),
        'left-panel' => esc_html__( 'Left Panel', 'startup-reloaded' ),
        'right-panel' => esc_html__( 'Right Panel', 'startup-reloaded' ),
        'fullscreen-panel' => esc_html__( 'Fullscreen Panel', 'startup-reloaded' ),
        'navbar-bottom' => esc_html__( 'Navbar Bottom', 'startup-reloaded' ),
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
 * Charger les Metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';

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

add_filter('options_framework_location','startup_reloaded_options_framework_location_override');

function startup_reloaded_options_framework_location_override() {
	return array('/inc/options.php');
}

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/lib/options-framework/' );
require_once dirname( __FILE__ ) . '/lib/options-framework/options-framework.php';
$optionsfile = locate_template( '/inc/options.php' );
load_template( $optionsfile );

/**
 * Désactiver les br automatiques de l'éditeur et autres
 */
if( of_get_option( 'auto-format-off' ) == 1 ){
    remove_filter('the_content', 'wpautop');
}

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

//Fonction pour récupérer les info d'un attachement à partir de son id, utilisé avec CMB2
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

//Adverts
if (is_plugin_active('wpadverts/wpadverts.php')){
    // Ajouter CPF aux annonces
    function startup_reloaded_add_adverts_currency($list) {
        $list[] = array(
            "code"=>"XPF", // ISO 4217 currency code, see http://en.wikipedia.org/wiki/ISO_4217
            "sign"=>"CFP", // currency prefix or postfix
            "label"=>"Franc CFP" // currency long name
        );
        return $list;
    }

    add_filter("adverts_currency_list", "startup_reloaded_add_adverts_currency");

    // Limiter les annonces à une seule catégorie
    function startup_reloaded_limit_category_selection( $form ) {
        if($form["name"] != 'advert' || is_admin()) {
            return $form;
        }
        $count = count( $form["field"] );
        for( $i = 0; $i < $count; $i++ ) {
            if($form["field"][$i]["name"] == "advert_category") {
                $form["field"][$i]["max_choices"] = 1;
            }
        }
        return $form;
    }

    add_filter("adverts_form_load", "startup_reloaded_limit_category_selection");
}

// Ajouter les tailles personnalisées au selecteur de l'uploadeur
function startup_reloaded_insert_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'shuffle_thumb' => __( 'Shuffle thumbnail', 'startup-reloaded' ),
        'shuffle_main' => __( 'Shuffle main', 'startup-reloaded' ),
        'grid_thumb' => __( 'Grid thumbnail', 'startup-reloaded' ),
    ) );
}

add_filter( 'image_size_names_choose', 'startup_reloaded_insert_custom_sizes' );

// Page slug priority over archive
function startup_reloaded_page_priority_init() {
    $GLOBALS['wp_rewrite']->use_verbose_page_rules = true;
}

add_action( 'init', 'startup_reloaded_page_priority_init' );

function startup_reloaded_page_priority_collect_page_rewrite_rules( $page_rewrite_rules )
{
    $GLOBALS['startup_reloaded_page_priority_page_rewrite_rules'] = $page_rewrite_rules;
    return array();
}

add_filter( 'page_rewrite_rules', 'startup_reloaded_page_priority_collect_page_rewrite_rules' );

function startup_reloaded_page_priority_prepend_page_rewrite_rules( $rewrite_rules )
{
    return $GLOBALS['startup_reloaded_page_priority_page_rewrite_rules'] + $rewrite_rules;
}

add_filter( 'rewrite_rules_array', 'startup_reloaded_page_priority_prepend_page_rewrite_rules' );

// Style de Tiny MCE
function startup_reloaded_editor_styles() {
    add_editor_style();
    //add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'startup_reloaded_editor_styles' );


// Make every post image responsive
function startup_reloaded_content_responsive_class($content){

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML(utf8_decode($content));

        $imgs = $document->getElementsByTagName('img');
        foreach ($imgs as $img) {           
           $img->setAttribute('class','img-responsive');
        }

        $html = $document->saveHTML();
        return $html;   
}

add_filter('the_content', 'startup_reloaded_content_responsive_class');