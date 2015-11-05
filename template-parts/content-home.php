<?php
$args=array( 'post_type'=>'home', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$home_sections = get_posts( $args );
$counter = 0;




if ( $atts['id'] ) {
    // Si attribut id
        $home_post = get_post( $atts['id'] );
        $title = get_post_meta( $home_post->ID, '_startup_reloaded_home_title', true );
        $button_text = get_post_meta( $home_post->ID, '_startup_reloaded_home_button_text', true );
        $button_url = get_post_meta( $home_post->ID, '_startup_reloaded_home_button_url', true );
        $blank = get_post_meta( $home_post->ID, '_startup_reloaded_home_blank', true );
    ?>
            <section id="home-<?php echo $atts['id'] ?>"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="home-section">
                                <?php if ( $title ){ ?><h3><?php echo $home_post->post_title ?></h3><?php } ?>
                                <p><?php echo $home_post->post_content ?></p>
                                <?php if ( $button_text ) { ?>
                                <br />
                                <a class="btn btn-custom" href="<?php echo $button_url ?>"<?php if ( $blank ) { echo ' target="_blank"'; }?>>
                                    <?php echo $button_text ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php } else {
    // Si pas d'attribut id ?>
            <section id="home"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
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
<?php } ?>