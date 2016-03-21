<?php

require get_template_directory() . '/inc/theme-options.php';

if ( $milestones_number ) { $max = $milestones_number; } else {$max = -1;};
$args=array( 'post_type'=>'milestones', 'orderby' => $milestones_order,'order' => 'ASC', 'numberposts' => $max );
$milestones = get_posts( $args );
?>
<section id="milestones"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">
            <?php foreach ($milestones as $key=> $milestone) {
                $milestone_icon    = get_post_meta( $milestone->ID, '_startup_cpt_milestones_icon', true );
                $milestone_value    = get_post_meta( $milestone->ID, '_startup_cpt_milestones_value', true );
                $milestone_unit   = get_post_meta( $milestone->ID, '_startup_cpt_milestones_unit', true );
            ?>
                <div class="col-xs-6 col-sm-3">
                    <div class="milestone">
                        <i class="fa fa-<?php echo $milestone_icon; ?> fa-5x"></i>
                        <span class="milestone-data">
                            <span class="milestone-count"><?php echo $milestone_value; ?></span><span>
                            <?php echo $milestone_unit; ?>
                        </span>
                        </span>
                        <div class="milestone-details">
                            <?php echo $milestone->post_title ?>
                        </div>

                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
