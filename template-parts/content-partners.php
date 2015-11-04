<?php
$args=array( 'post_type'=>'partners', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$partners = get_posts( $args );
$total_partners = count($partners);
?>
<section id="partners">
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">            
            <?php if ($total_partners > 4){ ?>
                <div id="partners-carousel" class="carousel slide" data-interval="4000" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php }  $count = 1; ?>
                            <div class="item<?php if ($count == 1){ echo ' active';} ?>">
                                <?php foreach ($partners as $key=> $partner) {
                                    $logo  = wp_get_attachment_image( get_post_meta( $partner->ID, '_startup_reloaded_partners_logo_id', 1 ), 'partners' );
                                    $url  = get_post_meta( $partner->ID, '_startup_reloaded_partners_url', true ); ?>
                                    <div class="col-sm-3 col-xs-6">
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
                                    <?php if (($count % 4) == 0 && ($count < $total_partners )){ ?>
                                        </div><div class="item">
                                    <?php } ?>
                                
                                <?php $count++; } ?>
                            </div>
                        <?php if ($total_partners > 4){ ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
