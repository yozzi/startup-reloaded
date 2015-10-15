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
        $title = get_post_meta( $section->ID, '_startup_reloaded_sections_title', true );
        $position = get_post_meta( $section->ID, '_startup_reloaded_sections_position', true );
        $effect = get_post_meta( $section->ID, '_startup_reloaded_sections_effect', true );
        $background_color = get_post_meta( $section->ID, '_startup_reloaded_sections_background_color', true );
        $color = get_post_meta( $section->ID, '_startup_reloaded_sections_color', true );
        $background = wp_get_attachment_image_src( get_post_meta( $section->ID, '_startup_reloaded_sections_background_id', 1 ), 'large' );
        $background_position = get_post_meta( $section->ID, '_startup_reloaded_sections_background_position', true );
        $background_video = get_post_meta( $section->ID, '_startup_reloaded_sections_background_video', true );
        $padding = get_post_meta( $section->ID, '_startup_reloaded_sections_padding', true );
        $boxed = get_post_meta( $section->ID, '_startup_reloaded_sections_boxed', true );
        $parallax = get_post_meta( $section->ID, '_startup_reloaded_sections_parallax', true );
        $button_text = get_post_meta( $section->ID, '_startup_reloaded_sections_button_text', true );
        $button_url = get_post_meta( $section->ID, '_startup_reloaded_sections_button_url', true );
        $blank = get_post_meta( $section->ID, '_startup_reloaded_sections_blank', true );
        ob_start(); ?>
            <section id="section-<?= $atts['id'] ?>" class="section <?php echo $position ?>"  style="<?php if ( $color ){ echo 'color:' . $color . ';'; }; if ( $background && $parallax == '' ){  echo 'background: url(' . $background[0] . '); background-size:cover; background-position: center ' . $background_position . ';';} elseif ( $background_color && $parallax == '' ) { echo 'background: ' . $background_color . ';';} ?>" <?php if ( $parallax ){ echo 'data-parallax="scroll" data-image-src="' . $background[0] . '"'; } ?>>
                <div class="effect <?php echo $effect; ?>" style="<?php if ( $padding ){ echo 'padding-top:' . $padding . 'px;padding-bottom:' . $padding . 'px;'; } ?>">
                    <?php if ( $background_video ) {?><div class="video"><?php } ?>
                        <?php if ( $boxed ){ ?>
                            <?php if ( $title ){ ?><h3 class="boxed"><?= $section->post_title ?></h3><br /><?php } ?>
                            <p class="boxed"><?= $section->post_content ?></p>
                        <?php } else{ ?>
                            <?php if ( $title ){ ?><h3><?= $section->post_title ?></h3><?php } ?>
                            <p><?= $section->post_content ?></p>
                        <?php } ?>
                    
                         <?php if ( $button_text ) { ?>
                            <br />
                            <a class="btn btn-custom btn-lg" href="<?php echo $button_url ?>"<?php if ( $blank ) { echo ' target="_blank"'; }?>>
                                <?php echo $button_text ?>
                            </a>
                        <?php } ?>
                    
                    <?php if ( $background_video ) {?></div><?php } ?>
                </div>
            </section>
            <?php if ( $background_video ) {?>
                <div class="player" id="section-background-video-<?= $atts['id'] ?>" data-property="{videoURL:'http://youtu.be/<?php echo $background_video ?>', containment:'#section-<?= $atts['id'] ?> .video', mute:true, loop:true, opacity:1, showControls:false}"></div>
            <?php } ?>
        <?php return ob_get_clean();  
    } else {
    // Si pas d'attribut
        return 'Vous devez renseigner l\'ID de la section dans le shortcode';
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