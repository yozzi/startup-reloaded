<?php
// General
    $str                                = of_get_option( 'general-serial' );
    $logo                               = of_get_option( 'general-logo' );
    $responsive                         = of_get_option( 'general-responsive' );
    $boxed                              = of_get_option( 'general-boxed' );
    $search                             = of_get_option( 'navbar-search' );
    $page_transition                    = of_get_option( 'page-transition' );
    $page_transition_in                 = of_get_option( 'page-transition-in' );
    $page_transition_out                = of_get_option( 'page-transition-out' );
    $back_to_top                        = of_get_option( 'general-back-to-top' );
    $ytplayer                           = of_get_option( 'general-ytplayer' );
    $fastclick                          = of_get_option( 'general-fastclick' );
    $smoothscroll                       = of_get_option( 'general-smoothscroll' );
    $ga                                 = of_get_option( 'general-ga' );
// Style
    $user_style                         = of_get_option( 'auto_stylesheet' );
    $background                         = of_get_option( 'style-background' );
    $cover                              = of_get_option( 'style-cover' );
    $page_background                    = of_get_option( 'style-page' );
    $page_header_visible                = of_get_option( 'page-header-hidden' );
    $page_header_background_color       = of_get_option( 'page-header-background-color' );
    $page_header_color                  = of_get_option( 'page-header-text-color' );
    $page_header_padding                = of_get_option( 'page-header-padding' );
    $page_header_position               = of_get_option( 'page-header-position' );
    $page_header_boxed                  = of_get_option( 'page-header-boxed' );
    $page_header_boxed_width            = of_get_option( 'page-header-boxed-width' );
    $footer                             = of_get_option( 'general-footer' );
    $bt_radius                          = of_get_option( 'button-radius' );
    $bt_background                      = of_get_option( 'button-background' );
    $bt_text                            = of_get_option( 'button-text' );
    $bt_hover_background                = of_get_option( 'button-hover-background' );
    $bt_hover_text                      = of_get_option( 'button-hover-text' );
    $custom_css                         = of_get_option( 'custom-css' );
    $footer_color                       = of_get_option( 'footer-color' );
// Navigation
    $navbar_on                          = of_get_option( 'navbar-on' );
    $navbar_position                    = of_get_option( 'navbar-position' );
    $navbar_transparent                 = of_get_option( 'navbar-transparent' );
    $navbar_logo_position               = of_get_option( 'navbar-logo-position' );
    $navbar_menu_position               = of_get_option( 'navbar-menu-position' );
    $navbar_hamburger_position          = of_get_option( 'navbar-hamburger-position' );
    $navbar_translucent                 = of_get_option( 'navbar-translucent' );
    $navbar_color                       = of_get_option( 'navbar-color' );
    $navbar_inverse                     = of_get_option( 'navbar-inverse' );
    $fullscreen_panel_on                = of_get_option( 'fullscreen-panel-on' );
    $fullscreen_panel_hamburger         = of_get_option( 'fullscreen-panel-hamburger' );
    $fullscreen_panel_hamburger_text    = of_get_option( 'fullscreen-panel-hamburger-text' );
    $left_panel_on                      = of_get_option( 'left-panel-on' );
    $left_panel_color                   = of_get_option( 'left-panel-color' );
    $left_panel_hamburger               = of_get_option( 'left-panel-hamburger' );
    $left_panel_hamburger_text          = of_get_option( 'left-panel-hamburger-text' );
    $left_panel_theme                   = of_get_option( 'left-panel-theme' );
    $left_panel_mode                    = of_get_option( 'left-panel-mode' );
    $right_panel_on                     = of_get_option( 'right-panel-on' );
    $right_panel_color                  = of_get_option( 'right-panel-color' );
    $right_panel_hamburger              = of_get_option( 'right-panel-hamburger' );
    $right_panel_hamburger_text         = of_get_option( 'right-panel-hamburger-text' );
    $right_panel_theme                  = of_get_option( 'right-panel-theme' );
    $right_panel_mode                   = of_get_option( 'right-panel-mode' );
// Slider
    $slider_order                       = of_get_option( 'slider-order' );
    $slider_number                      = of_get_option( 'slider-number' );
    $slider_on                          = of_get_option( 'slider-on' );
    $slider_height                      = of_get_option( 'slider-height' );
    $slider_interval                    = of_get_option( 'slider-interval' );
    $slider_transition                  = of_get_option( 'slider-transition' );
    $slider_arrows                      = of_get_option( 'slider-arrows' );
    $slider_arrows_hover                = of_get_option( 'slider-arrows-hover' );
    $slider_navigation                  = of_get_option( 'slider-navigation' );
// Post Types
    // Home
    $home_type                          = of_get_option( 'home-type' );
    // Blog
    $blog_number                        = of_get_option( 'blog-number' );
    $blog_style                         = of_get_option( 'blog-style' );
    $blog_filter                        = of_get_option( 'blog-filter' );
    // Milestones
    $milestones_order                   = of_get_option( 'milestones-order' );
    $milestones_number                  = of_get_option( 'milestones-number' );
    // Partners
    $partners_order                     = of_get_option( 'partners-order' );
    $partners_number                    = of_get_option( 'partners-number' );
    // Portfolio
    $portfolio_order                    = of_get_option( 'portfolio-order' );
    $portfolio_number                   = of_get_option( 'portfolio-number' );
    $portfolio_style                    = of_get_option( 'portfolio-style' );
    // Products
    $products_order                     = of_get_option( 'products-order' );
    $products_number                    = of_get_option( 'products-number' );
    // Projects
    $projects_order                     = of_get_option( 'projects-order' );
    $projects_number                    = of_get_option( 'projects-number' );
    // Services
    $services_order                     = of_get_option( 'services-order' );
    $services_number                    = of_get_option( 'services-number' );
    // Testimonials
    $testimonials_order                 = of_get_option( 'testimonials-order' );
    $testimonials_number                = of_get_option( 'testimonials-number' );
    // Team
    $team_slider                        = of_get_option( 'team-slider' );
    $team_order                         = of_get_option( 'team-order' );
    $team_number                        = of_get_option( 'team-number' );
// Advanced
    $auto_format_off                    = of_get_option( 'auto-format-off' );