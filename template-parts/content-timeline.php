<?php
$args=array( 'post_type'=>'timeline', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$timelines = get_posts( $args );
$total_timelines = count($timelines);
?>
<section id="timeline"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
    <section id="cd-timeline" class="cd-container">
        <div class="row">
            <?php foreach ($timelines as $key=> $timeline) {
                $icon    = get_post_meta($timeline->ID, '_startup_reloaded_timeline_icon', true );
                $color   = get_post_meta($timeline->ID, '_startup_reloaded_timeline_color', true );
                $date    = get_post_meta($timeline->ID, '_startup_reloaded_timeline_date', true );
                $page    = get_permalink( get_post_meta($timeline->ID, '_startup_reloaded_timeline_page', true ) );
            ?>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img" style="background:<?php echo $color ?>">
                        <i class="fa fa-<?php echo $icon ?> fa-2x"></i>
                    </div>

                    <div class="cd-timeline-content">
                        <h2><?php echo $timeline->post_title ?></h2>
                        <p><?php echo $timeline->post_content ?></p>
                        <?php if ( $page ) { ?>
                                            <p>
                                                <a href="<?php echo $page ?>" class="btn btn-custom btn-sm"><?php _e( 'Read more', 'startup-reloaded' ) ?></a>
                                            </p>
                                        <?php } ?>
                        <span class="cd-date"><?php echo $date ?></span>
                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
    </section>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
