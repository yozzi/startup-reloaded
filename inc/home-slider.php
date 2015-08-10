<?php
    $args                   = array( 'post_type'=>'slider', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
    $sliders                = get_posts( $args );
    $total_sliders          = count( $sliders );
    $slider_on              = of_get_option( 'slider-on' );
    $slider_height          = of_get_option( 'slider-height' );
    $slider_interval        = of_get_option( 'slider-interval' );
    $slider_transition      = of_get_option( 'slider-transition' );
    $slider_arrows          = of_get_option( 'slider-arrows' );
    $slider_arrows_hover    = of_get_option( 'slider-arrows-hover' );
    $slider_navigation      = of_get_option( 'slider-navigation' );

    if ($slider_on == 1) { 
?>

    <div id="slider" class="carousel slide <?php echo $slider_transition ?>" data-interval="<?php echo $slider_interval ?>">
        <!-- Indicators -->
        <?php if ($slider_navigation == 'slider_pagination') { ?>
        <ol class="carousel-indicators">
            <?php for($i=0 ; $i<$total_sliders; $i++){ ?>
                <li data-target="#slider" data-slide-to="<?php echo $i ?>" class="<?php echo ($i==0)?'active':'' ?>"></li>
            <?php } ?>
        </ol>
        <?php } ?>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
                foreach ($sliders as $key=> $slider) {
                    $position           = get_post_meta( $slider->ID, '_startup_reloaded_slider_position', true );
                    $effect             = get_post_meta( $slider->ID, '_startup_reloaded_slider_effect', true );
                    $background_color   = get_post_meta( $slider->ID, '_startup_reloaded_slider_background_color', true );
                    $background_video   = get_post_meta( $slider->ID, '_startup_reloaded_slider_background_video', true );
                    $boxed              = get_post_meta( $slider->ID, '_startup_reloaded_slider_boxed', true );
                    $button_text        = get_post_meta( $slider->ID, '_startup_reloaded_slider_button_text', true );
                    $button_url         = get_post_meta( $slider->ID, '_startup_reloaded_slider_button_url', true );
                    $blank              = get_post_meta( $slider->ID, '_startup_reloaded_slider_blank', true );
                    $bg_image_url       = wp_get_attachment_url( get_post_thumbnail_id( $slider->ID ) );
                    $title_animation    = get_post_meta( $slider->ID, '_startup_reloaded_slider_title_animation', true );
                    $title_delay        = get_post_meta( $slider->ID, '_startup_reloaded_slider_title_delay', true );
                    $content_animation  = get_post_meta( $slider->ID, '_startup_reloaded_slider_content_animation', true );
                    $content_delay      = get_post_meta( $slider->ID, '_startup_reloaded_slider_content_delay', true );
                    $button_animation   = get_post_meta( $slider->ID, '_startup_reloaded_slider_button_animation', true );
                    $button_delay       = get_post_meta( $slider->ID, '_startup_reloaded_slider_button_delay', true );
            ?>

                <div id="slide-<?php echo $key ?>" class="item <?php echo ( $key==0 ) ? 'active' : '' ?>" style="<?php if ( $slider_height ) { echo 'height: ' . $slider_height . 'px;'; } else { echo 'height: 550px;';} if ( $bg_image_url ) { echo 'background-image: url('. $bg_image_url .')';} elseif ( $background_color ) { echo 'background-color: ' . $background_color . ';';} ?>">
                    <div class="effect <?php if ( $effect ) { echo $effect; } ?>">
                        <?php if ( $background_video ) {?><div class="video"><?php } ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="carousel-content <?php if ( $position ) { echo $position; } ?>">
                                            <h2 <?php if ( $boxed ) { echo 'class="boxed"'; } ?> data-animation="animated <?php echo $title_animation ?>" style="-webkit-animation-delay: <?php echo $title_delay ?>ms;-moz-animation-delay: <?php echo $title_delay ?>ms;animation-delay: <?php echo $title_delay ?>ms;">
                                                <?php echo $slider->post_title ?>
                                            </h2>
                                            <?php if( $slider->post_content ) { ?>
                                            <br />
                                            <p <?php if ( $boxed ) { echo 'class="boxed"'; } ?> data-animation="animated <?php echo $content_animation ?>" style="-webkit-animation-delay: <?php echo $content_delay ?>ms;-moz-animation-delay: <?php echo $content_delay ?>ms;animation-delay: <?php echo $content_delay ?>ms;">
                                                <?php echo do_shortcode( $slider->post_content ) ?>
                                            </p>
                                            <?php } ?>

                                            <?php if ( $button_text ) { ?>
                                            <br>
                                            <a class="btn btn-default btn-lg" href="<?php echo $button_url ?>" data-animation="animated <?php echo $button_animation ?>" style="-webkit-animation-delay: <?php echo $button_delay ?>ms;-moz-animation-delay: <?php echo $button_delay ?>ms;animation-delay: <?php echo $button_delay ?>ms;" <?php if ( $blank ) { echo 'target="_blank"'; }?>>
                                                <?php echo $button_text ?>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php if ( $background_video ) {?></div><?php } ?>
                    </div>
                </div>
            <?php if ( $background_video ) {?>
                <div class="player" id="background-video-<?php echo $key ?>" data-property="{videoURL:'http://youtu.be/<?php echo $background_video ?>', containment:'#slide-<?php echo $key ?> .video', mute:true, loop:true, opacity:1, showControls:false}"></div>
            <?php } ?>
                <!--/.item-->
                <?php } // endforeach ?>
            </div>
            <!--/.carousel-inner-->
        <!-- Controls -->
        <?php if ( $slider_arrows ) { ?>
            <a class="left carousel-control hidden-xs hvr-<?php echo $slider_arrows_hover ?>" href="#slider" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg"></i>
            </a>
            <a class="right carousel-control hidden-xs hvr-<?php echo $slider_arrows_hover ?>" href="#slider" data-slide="next">
                <i class="fa fa-chevron-right fa-lg"></i>
            </a>
        <?php } ?>

        <!-- Goto content -->
        <?php if ( $slider_navigation == 'slider_content_arrow' ) { ?>
            <a href="#primary" class="slider-down-arrow hvr-<?php echo $slider_arrows_hover ?> scroll">
                <i class="fa fa-chevron-down fa-lg"></i>
            </a>
        <?php } ?>
    </div>
<?php } ?>