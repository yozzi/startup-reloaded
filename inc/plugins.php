<?php
require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'startup_reloaded_register_required_plugins' );

function startup_reloaded_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'StartUp Plugin',
            'slug'               => 'startup',
            'source'             => 'https://github.com/yozzi/startup/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup',
        ),
         array(
            'name'               => 'StartUp Home',
            'slug'               => 'startup-cpt-home',
            'source'             => 'https://github.com/yozzi/startup-cpt-home/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-home',
        ),
        array(
            'name'               => 'StartUp Milestones',
            'slug'               => 'startup-cpt-milestones',
            'source'             => 'https://github.com/yozzi/startup-cpt-milestones/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-milestones',
        ),
        array(
            'name'               => 'StartUp Portfolio',
            'slug'               => 'startup-cpt-portfolio',
            'source'             => 'https://github.com/yozzi/startup-cpt-portfolio/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-portfolio',
        ),
        array(
            'name'               => 'StartUp Pricing Table',
            'slug'               => 'startup-cpt-pricing-table',
            'source'             => 'https://github.com/yozzi/startup-cpt-pricing-table/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-pricing-table',
        ),
        array(
            'name'               => 'StartUp Projects',
            'slug'               => 'startup-cpt-projects',
            'source'             => 'https://github.com/yozzi/startup-cpt-projects/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-projects',
        ),
        array(
            'name'               => 'StartUp Rooms',
            'slug'               => 'startup-cpt-rooms',
            'source'             => 'https://github.com/yozzi/startup-cpt-rooms/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-rooms',
        ),
        array(
            'name'               => 'StartUp Services',
            'slug'               => 'startup-cpt-services',
            'source'             => 'https://github.com/yozzi/startup-cpt-services/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-services',
        ),
        array(
            'name'               => 'StartUp Slider',
            'slug'               => 'startup-cpt-slider',
            'source'             => 'https://github.com/yozzi/startup-cpt-slider/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-slider',
        ),
        array(
            'name'               => 'StartUp Team',
            'slug'               => 'startup-cpt-team',
            'source'             => 'https://github.com/yozzi/startup-cpt-team/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-team',
        ),
        array(
            'name'               => 'StartUp Testimonials',
            'slug'               => 'startup-cpt-testimonials',
            'source'             => 'https://github.com/yozzi/startup-cpt-testimonials/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-testimonials',
        ),     
        array(
            'name'               => 'StartUp Menus',
            'slug'               => 'startup-cpt-menus',
            'source'             => 'https://github.com/yozzi/startup-cpt-menus/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-menus',
        ),
        
        array(
            'name'               => 'StartUp Products',
            'slug'               => 'startup-cpt-products',
            'source'             => 'https://github.com/yozzi/startup-cpt-products/archive/master.zip',
            'required'           => false,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'https://github.com/yozzi/startup-cpt-products',
        ),

        array(
            'name'      => 'Bootstrap Shortcodes for WordPress',
            'slug'      => 'bootstrap-3-shortcodes',
            'required'  => false,
        ),
        array(
            'name'      => 'Simple Page Ordering',
            'slug'      => 'simple-page-ordering',
            'required'  => false,
        ),
        array(
            'name'      => 'User Role Editor',
            'slug'      => 'user-role-editor',
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
            'name'      => 'WP Maintenance Mode',
            'slug'      => 'wp-maintenance-mode',
            'required'  => false,
        ),
        array(
            'name'      => 'Loco Translate',
            'slug'      => 'loco-translate',
            'required'  => false,
        ),
        array(
            'name'      => 'Regenerate Thumbnails',
            'slug'      => 'regenerate-thumbnails',
            'required'  => false,
        ),
        array(
            'name'      => 'WPAdverts - Classifieds Plugin',
            'slug'      => 'wpadverts',
            'required'  => false,
        ),
        array(
            'name'      => 'Resize images before upload',
            'slug'      => 'resize-images-before-upload',
            'required'  => false,
        ),
        array(
            'name'      => 'Gallery Carousel Without JetPack',
            'slug'      => 'carousel-without-jetpack',
            'required'  => false,
        ),
        array(
            'name'      => 'Polylang',
            'slug'      => 'polylang',
            'required'  => false,
        ),
        array(
            'name'      => 'Theme My Login',
            'slug'      => 'theme-my-login',
            'required'  => false,
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
            'page_title'                      => __( 'Plugins additionnels', 'tgmpa' ),
            'menu_title'                      => __( 'Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'    => _n_noop( 'Le plugin requis suivant est actuellement désactivé: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended' => _n_noop( 'Le plugin recommandé suivant est actuellement désactivé: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}
?>