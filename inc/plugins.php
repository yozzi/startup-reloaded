<?php
require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'startup_reloaded_register_required_plugins' );

function startup_reloaded_register_required_plugins() {
    $plugins = array(
        
        /*******************************************************************
        **
        ** StartUp Plugins
        **
        *******************************************************************/
        
        array(
            'name'               => 'StartUp',
            'slug'               => 'startup',
            'source'             => 'https://github.com/yozzi/startup/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup',
        ),
        array(
            'name'               => 'StartUp CPT Charts',
            'slug'               => 'startup-cpt-charts',
            'source'             => 'https://github.com/yozzi/startup-cpt-charts/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-charts',
        ),     
        array(
            'name'               => 'StartUp CPT Home',
            'slug'               => 'startup-cpt-home',
            'source'             => 'https://github.com/yozzi/startup-cpt-home/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-home',
        ),   
        array(
            'name'               => 'StartUp CPT Menus',
            'slug'               => 'startup-cpt-menus',
            'source'             => 'https://github.com/yozzi/startup-cpt-menus/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-menus',
        ),
        array(
            'name'               => 'StartUp CPT Milestones',
            'slug'               => 'startup-cpt-milestones',
            'source'             => 'https://github.com/yozzi/startup-cpt-milestones/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-milestones',
        ),
        array(
            'name'               => 'StartUp CPT Partners',
            'slug'               => 'startup-cpt-partners',
            'source'             => 'https://github.com/yozzi/startup-cpt-partners/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-partners',
        ),
        array(
            'name'               => 'StartUp CPT Portfolio',
            'slug'               => 'startup-cpt-portfolio',
            'source'             => 'https://github.com/yozzi/startup-cpt-portfolio/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-portfolio',
        ),
        array(
            'name'               => 'StartUp CPT Pricing Table',
            'slug'               => 'startup-cpt-pricing-table',
            'source'             => 'https://github.com/yozzi/startup-cpt-pricing-table/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-pricing-table',
        ),
        array(
            'name'               => 'StartUp CPT Products',
            'slug'               => 'startup-cpt-products',
            'source'             => 'https://github.com/yozzi/startup-cpt-products/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-products',
        ),
        array(
            'name'               => 'StartUp CPT Projects',
            'slug'               => 'startup-cpt-projects',
            'source'             => 'https://github.com/yozzi/startup-cpt-projects/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-projects',
        ),
        array(
            'name'               => 'StartUp CPT Quotes',
            'slug'               => 'startup-cpt-quotes',
            'source'             => 'https://github.com/yozzi/startup-cpt-quotes/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-quotes',
        ),
        array(
            'name'               => 'StartUp CPT Rooms',
            'slug'               => 'startup-cpt-rooms',
            'source'             => 'https://github.com/yozzi/startup-cpt-rooms/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-rooms',
        ),
        array(
            'name'               => 'StartUp CPT Sections',
            'slug'               => 'startup-cpt-sections',
            'source'             => 'https://github.com/yozzi/startup-cpt-sections/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-sections',
        ),
        array(
            'name'               => 'StartUp CPT Services',
            'slug'               => 'startup-cpt-services',
            'source'             => 'https://github.com/yozzi/startup-cpt-services/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-services',
        ),
        array(
            'name'               => 'StartUp CPT Slider',
            'slug'               => 'startup-cpt-slider',
            'source'             => 'https://github.com/yozzi/startup-cpt-slider/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-slider',
        ),
        array(
            'name'               => 'StartUp CPT Team',
            'slug'               => 'startup-cpt-team',
            'source'             => 'https://github.com/yozzi/startup-cpt-team/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-team',
        ),
        array(
            'name'               => 'StartUp CPT Testimonials',
            'slug'               => 'startup-cpt-testimonials',
            'source'             => 'https://github.com/yozzi/startup-cpt-testimonials/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-testimonials',
        ),     
        array(
            'name'               => 'StartUp CPT Timeline',
            'slug'               => 'startup-cpt-timeline',
            'source'             => 'https://github.com/yozzi/startup-cpt-timeline/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-timeline',
        ),     
        
        /*******************************************************************
        **
        ** Production Plugins
        **
        *******************************************************************/

        array(
            'name'      => 'Bootstrap Shortcodes for WordPress',
            'slug'      => 'bootstrap-3-shortcodes',
            'required'  => false,
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Duplicate Post',
            'slug'      => 'duplicate-post',
            'required'  => false,
        ),
        array(
            'name'      => 'Gallery Carousel Without JetPack',
            'slug'      => 'carousel-without-jetpack',
            'required'  => false,
        ),
        array(
            'name'      => 'jQuery Updater',
            'slug'      => 'jquery-updater',
            'required'  => false,
        ),
        array(
            'name'      => 'Polylang',
            'slug'      => 'polylang',
            'required'  => false,
        ),
        array(
            'name'      => 'Popup Maker',
            'slug'      => 'popup-maker',
            'required'  => false,
        ),
        array(
            'name'      => 'Resize images before upload',
            'slug'      => 'resize-images-before-upload',
            'required'  => false,
        ),
        array(
            'name'      => 'Simple 301 Redirects',
            'slug'      => 'simple-301-redirects',
            'required'  => false,
        ),
        array(
            'name'      => 'Simple Page Ordering',
            'slug'      => 'simple-page-ordering',
            'required'  => false,
        ),
        array(
            'name'      => 'Theme My Login',
            'slug'      => 'theme-my-login',
            'required'  => false,
        ),
        array(
            'name'      => 'TinyMCE Advanced',
            'slug'      => 'tinymce-advanced',
            'required'  => false,
        ),
        array(
            'name'      => 'User Role Editor',
            'slug'      => 'user-role-editor',
            'required'  => false,
        ),
        array(
            'name'      => 'WPAdverts - Classifieds Plugin',
            'slug'      => 'wpadverts',
            'required'  => false,
        ),
        array(
            'name'      => 'WP Maintenance Mode',
            'slug'      => 'wp-maintenance-mode',
            'required'  => false,
        ),
        
        /*******************************************************************
        **
        ** Developpement Plugins
        **
        *******************************************************************/
        
        array(
            'name'      => 'Loco Translate',
            'slug'      => 'loco-translate',
            'required'  => false,
        ),
        array(
            'name'      => 'Log Deprecated Notices',
            'slug'      => 'log-deprecated-notices',
            'required'  => false,
        ),
        array(
            'name'      => 'Query Monitor',
            'slug'      => 'query-monitor',
            'required'  => false,
        ),
        array(
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => false,
        ),
        array(
            'name'      => 'Theme Check',
            'slug'      => 'theme-check',
            'required'  => false,
        ),
        array(
            'name'               => 'WordPress Admin Style',
            'slug'               => 'WordPress-Admin-Style',
            'source'             => 'https://github.com/bueltge/WordPress-Admin-Style/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/bueltge/WordPress-Admin-Style',
        ),  
 
    );
 
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => false,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Additional Plugins', 'startup-reloaded' ),
            'menu_title'                      => __( 'Plugins', 'startup-reloaded' ),
            'installing'                      => __( 'Installing Plugin: %s', 'startup-reloaded' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'startup-reloaded' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'startup-reloaded'),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'startup-reloaded'),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'startup-reloaded'),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'startup-reloaded'),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'startup-reloaded'),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'startup-reloaded'),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'startup-reloaded'),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'startup-reloaded'),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'startup-reloaded'),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'startup-reloaded'),
            'return'                          => __( 'Return to Required Plugins Installer', 'startup-reloaded' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'startup-reloaded' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'startup-reloaded' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}
?>