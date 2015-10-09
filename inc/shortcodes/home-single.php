<?php
$id=;
$home_sections = get_posts( $args );
$counter = 0;

?>
<section id="home">
    <div class="container">
        <div class="row">
            <?php foreach ($home_sections as $key=> $home_section) {
                //$milestone_icon    = get_post_meta( $milestone->ID, '_startup_reloaded_milestones_icon', true );
                //$milestone_value    = get_post_meta( $milestone->ID, '_startup_reloaded_milestones_value', true );
                //$milestone_unit   = get_post_meta( $milestone->ID, '_startup_reloaded_milestones_unit', true );
            ?>
                <?php if ( $counter == 0 ) {?>
                    <div class="col-xs-12">
                <?php } else { ?>
                    <div class="col-xs-12 col-sm-6">
                <?php } ?>
                    <div class="home-section">
                                             
                        <h3><?php echo $home_section->post_title ?></h3>
                        <p><?php echo $home_section->post_content ?></p>

                    </div>
                </div>
            <?php 
                $counter ++;
                } // endforeach ?>
        </div>
    </div>
</section>
