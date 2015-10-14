<?php
// Home
function startup_reloaded_shortcode_home_single( $atts ) {

	// Attributes
    $atts = shortcode_atts(array(
            'id' => 'none',
        ), $atts);
    
	// Code
    if ($atts['id'] != "none"){
    // Si attribut
        $home_post = get_post( $atts['id'] );
        ob_start();  
        echo '<section id="home-' . $atts['id'] . '">';
        echo '    <div class="row">';
        echo '        <div class="col-xs-12 col-sm-6">';
        echo '            <div class="home-section">';
        echo '                <h3>' . $home_post->post_title . '</h3>';
        echo '                <p>' . $home_post->post_content . '</p>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</section>';       
        return ob_get_clean();  
    } else {
    // Si pas d'attribut
        ob_start();
        require get_template_directory() . '/inc/shortcodes/home.php';
        return ob_get_clean();       
    }
}
add_shortcode( 'home', 'startup_reloaded_shortcode_home_single' );

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