<?php
$args=array( 'post_type'=>'home', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$home_sections = get_posts( $args );
$counter = 0;

?>
<section id="home">
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">
            <?php foreach ($home_sections as $key=> $home_section) {
                $title = get_post_meta( $home_section->ID, '_startup_reloaded_home_title', true );
                $button_text = get_post_meta( $home_section->ID, '_startup_reloaded_home_button_text', true );
                $button_url = get_post_meta( $home_section->ID, '_startup_reloaded_home_button_url', true );
                $blank = get_post_meta( $home_section->ID, '_startup_reloaded_home_blank', true );
            ?>
                <?php if ( $counter == 0 ) {?>
                    <div class="col-xs-12">
                <?php } else { ?>
                    <div class="col-xs-12 col-sm-6">
                <?php } ?>
                    <div class="home-section">
                        <?php if ( $title ){ ?><h3><?php echo $home_section->post_title ?></h3><?php } ?>                     
                        <p><?php echo $home_section->post_content ?></p>
                        <?php if ( $button_text ) { ?>
                        <br />
                        <a class="btn btn-custom" href="<?php echo $button_url ?>"<?php if ( $blank ) { echo ' target="_blank"'; }?>>
                            <?php echo $button_text ?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            <?php 
                $counter ++;
                } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
