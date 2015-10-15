<?php
// Home
function startup_reloaded_shortcode_home( $atts ) {

	// Attributes
    $atts = shortcode_atts(array(
            'id' => 'none',
        ), $atts);
    
	// Code
    if ($atts['id'] != "none"){
    // Si attribut
        $home_post = get_post( $atts['id'] );
        ob_start(); ?>
            <section id="home-<?= $atts['id'] ?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="home-section">
                            <h3><?= $home_post->post_title ?></h3>
                            <p><?= $home_post->post_content ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php return ob_get_clean();  
    } else {
    // Si pas d'attribut
        ob_start();
        require get_template_directory() . '/inc/shortcodes/home.php';
        return ob_get_clean();       
    }
}
add_shortcode( 'home', 'startup_reloaded_shortcode_home' );

// Sections
function startup_reloaded_shortcode_sections( $atts ) {

	// Attributes
    $atts = shortcode_atts(array(
            'id' => 'none',
        ), $atts);
    
	// Code
    if ($atts['id'] != "none"){
    // Si attribut
        $section = get_post( $atts['id'] );
        ob_start(); ?>
            <section id="section-<?= $atts['id'] ?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="section">
                            <h3><?= $section->post_title ?></h3>
                            <p><?= $section->post_content ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php return ob_get_clean();  
    } else {
    // Si pas d'attribut
        return 'Vous devez renseigner l\'ID du post dans le shortcode';
    }
}
add_shortcode( 'section', 'startup_reloaded_shortcode_sections' );

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