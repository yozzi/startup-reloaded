<?php
// Home
add_shortcode( 'home', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/home.php';
    return ob_get_clean();
});

// Home Single
add_shortcode( 'home-single', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/home-single.php';
    return ob_get_clean();
});

// Blog
add_shortcode( 'blog', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/blog.php';
    return ob_get_clean();
});

// Milestones
add_shortcode( 'milestones', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/milestones.php';
    return ob_get_clean();
});

// Services
add_shortcode( 'services', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/services.php';
    return ob_get_clean();
});

// Pricing table
add_shortcode( 'pricing', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/pricing.php';
    return ob_get_clean();
});

// Team
add_shortcode( 'team', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/team.php';
    return ob_get_clean();
});

// Projects
add_shortcode( 'projects', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/projects.php';
    return ob_get_clean();
});

// Testimonials
add_shortcode( 'testimonials', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/testimonials.php';
    return ob_get_clean();
});

// Products
add_shortcode( 'products', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/products.php';
    return ob_get_clean();
});

// Portfolio
add_shortcode( 'portfolio', function( $atts, $content= null ){
    ob_start();
    require get_template_directory() . '/inc/shortcodes/portfolio.php';
    return ob_get_clean();
});
?>