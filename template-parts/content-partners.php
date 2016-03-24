<?php

require get_template_directory() . '/inc/theme-options.php';

if ( $partners_number ) { $max = $partners_number; } else {$max = -1;};
$args=array( 'post_type'=>'partners', 'orderby' => $partners_order,'order' => 'ASC', 'numberposts' => $max );
$partners = get_posts( $args );
$total_partners = count($partners);
?>
<section id="partners"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">            
            <?php if ($total_partners > 4){ ?>
                <div id="partners-carousel" class="carousel slide" data-interval="2000" data-ride="carousel" data-type="multi">
                    <div class="carousel-inner">
                        <?php } $count = 1; ?>
                            
                                <?php foreach ($partners as $key=> $partner) {
                                    $logo = wp_get_attachment_image( get_post_meta( $partner->ID, '_startup_cpt_partners_logo_id', 1 ), 'partners' );
                                    $url = get_post_meta( $partner->ID, '_startup_cpt_partners_url', true ); ?>
                                    <div class="item<?php if ($count == 1){ echo ' active';} ?>">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="partner">
                                                <div class="partner-inner">
                                                    <?php if ($logo) { ?>
                                                        <?php if ($url) { ?><a href="<?php echo $url ?>" target="_blank"><?php } ?><?php echo $logo ?><?php if ($url) { ?></a><?php } ?>
                                                    <?php } else { ?>
                                                    <h4><?php if ($url) { ?><a href="<?php echo $url ?>" target="_blank"><?php } ?><?php echo $partner->post_title ?><?php if ($url) { ?></a><?php } ?></h4>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                <?php $count++; } ?>

                        <?php if ($total_partners > 4){ ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>