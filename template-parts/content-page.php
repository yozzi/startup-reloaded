<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package StartUp Reloaded
 */
$page_header_visible = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_visible', true );
if ( !$page_header_visible ) { $page_header_visible = of_get_option( 'page-header-hidden' ); }
$page_header_background_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_color', true );
if ( !$page_header_background_color ) { $page_header_background_color = of_get_option( 'page-header-background-color' ); }
$page_header_color = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_color', true );
if ( !$page_header_color ) { $page_header_color = of_get_option( 'page-header-text-color' ); }
$page_header_subtitle = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_subtitle', true );
$page_header_background = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_background_id', 1 ), 'large' );
$page_header_padding = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_padding', true );
if ( !$page_header_padding ) { $page_header_padding = of_get_option( 'page-header-padding' ); }
$page_header_position = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_position', true );
if ( !$page_header_position ) { $page_header_position = of_get_option( 'page-header-position' ); }
$page_header_effect = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_effect', true );
$page_header_boxed = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_boxed', true );
if ( !$page_header_boxed ) { $page_header_boxed = of_get_option( 'page-header-boxed' ); }
$page_header_parallax = get_post_meta( get_the_ID(), '_startup_reloaded_pages_header_parallax', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_front_page() && !$page_header_visible ){?>
        <div class="effect <?php echo $page_header_effect ?>">
        <header class="entry-header <?php echo $page_header_position ?>" style="<?php if ( $page_header_color ){ echo 'color:' . $page_header_color . ';'; }; if ( $page_header_padding ){ echo 'padding-top:' . $page_header_padding . 'px;padding-bottom:' . $page_header_padding . 'px;';if ( $page_header_background && $page_header_parallax == '' ){  echo 'background: url(' . $page_header_background[0] . '); background-size:cover;';} elseif ( $page_header_background_color && $page_header_parallax == '' ) { echo 'background: ' . $page_header_background_color . ';'; };} ?>" <?php if ( $page_header_parallax ){ echo 'data-parallax="scroll" data-image-src="' . $page_header_background[0] . '"'; } ?>>      
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ( $page_header_boxed == 1 ){ the_title( '<h3 class="entry-title boxed">', '</h3>' ); }  
                            else { the_title( '<h3 class="entry-title">', '</h3>' ); } ?>                                                      
                        <?php if ( $page_header_subtitle && $page_header_boxed == 1 ){ echo '<h4 class="boxed">' . $page_header_subtitle . '</h4>'; }  
                            else if ( $page_header_subtitle ){ echo '<h4>' . $page_header_subtitle . '</h4>'; } ?>
                    </div>
                </div>
            </div>
        </header><!-- .entry-header -->
        </div>
    <?php }?>
    
	<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php the_content();
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->