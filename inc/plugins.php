<?php
require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'startup_reloaded_register_required_plugins' );

function startup_reloaded_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'StartUp Plugin', // The plugin name.
            'slug'               => 'startup', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Milestones Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-milestones', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-milestones/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-milestones', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Portfolio Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-portfolio', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-portfolio/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-portfolio', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Pricing Table Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-pricing-table', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-pricing-table/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-pricing-table', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Projects Custom Post Type Type', // The plugin name.
            'slug'               => 'startup-cpt-projects', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-projects/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-projects', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Rooms Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-rooms', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-rooms/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-rooms', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Services Custom Post Type Type', // The plugin name.
            'slug'               => 'startup-cpt-services', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-services/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-services', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Slider Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-slider', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-slider/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-slider', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Team Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-team', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-team/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-team', // If set, overrides default API URL and points to an external URL.
        ),
        array(
            'name'               => 'StartUp Testimonials Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-testimonials', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-testimonials/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-testimonials', // If set, overrides default API URL and points to an external URL.
        ),     
        array(
            'name'               => 'StartUp Menus Custom Post Type', // The plugin name.
            'slug'               => 'startup-cpt-testimonials', // The plugin slug (typically the folder name).
            'source'             => 'https://github.com/yozzi/startup-cpt-menus/archive/master.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://github.com/yozzi/startup-cpt-menus', // If set, overrides default API URL and points to an external URL.
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
 
    );
 
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Plugins additionnels', 'tgmpa' ),
            'menu_title'                      => __( 'Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'Le plugin requis suivant est actuellement désactivé: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'Le plugin recommandé suivant est actuellement désactivé: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
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