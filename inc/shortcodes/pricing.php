<?php
$args=array( 'post_type'=>'pricing', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$pricing = get_posts( $args );
$total_pricing = count($pricing);
?>
<section id="pricing">
    <div class="container">
        <div class="row">
            <?php foreach ($pricing as $key=> $pricing) {
                $pricing_currency    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_currency', true );
                $pricing_price    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_price', true );
                $pricing_unit    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_unit', true );
                $pricing_button_text    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_button_text', true );
                $pricing_button_url    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_button_url', true );
                $pricing_icon_1    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_icon_1', true );
                $pricing_text_1    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_text_1', true );
                $pricing_icon_2    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_icon_2', true );
                $pricing_text_2    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_text_2', true );
                $pricing_icon_3    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_icon_3', true );
                $pricing_text_3    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_text_3', true );
                $pricing_icon_4    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_icon_4', true );
                $pricing_text_4    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_text_4', true );
                $pricing_featured    = get_post_meta($pricing->ID, '_startup_reloaded_pricing_featured', true );
    
            ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="pricing-table<?php if ( $pricing_featured ){echo ' featured';} ?>">
                        <div class="pricing-header">
                            <p class="pricing-title"><?php echo $pricing->post_title ?></p>
                            <p class="pricing-rate"><sup><?php echo $pricing_currency; ?></sup> <?php echo $pricing_price; ?> <span><?php echo $pricing_unit; ?></span>
                            </p>
                            <?php if ( $pricing_button_text ) {?>
                            <a href="<?php echo $pricing_button_url; ?>" class="btn btn-custom"><?php echo $pricing_button_text; ?></a>
                            <?php }?>
                        </div>

                        <div class="pricing-list">
                            <ul>
                                <li><i class="fa fa-<?php echo $pricing_icon_1; ?>"></i><?php echo $pricing_text_1; ?></li>
                                <li><i class="fa fa-<?php echo $pricing_icon_2; ?>"></i><?php echo $pricing_text_2; ?></li>
                                <li><i class="fa fa-<?php echo $pricing_icon_3; ?>"></i><?php echo $pricing_text_3; ?></li>
                                <li><i class="fa fa-<?php echo $pricing_icon_4; ?>"></i><?php echo $pricing_text_4; ?></li>
                            </ul>
                        </div>
                       

                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
    </div>
</section>
