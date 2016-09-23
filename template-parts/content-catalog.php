<?php
    require get_template_directory() . '/inc/theme-options.php';
    $args = array( 'post_type'=>'catalog', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
    $catalog = get_posts( $args );
    $total_catalog = count($catalog);
?>

<section id="catalog"<?php if ( isset($atts) && $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div id="grid" class="row no-gutters">
            <?php foreach ($catalog as $key=> $catalog_item) {
                $main_pic = wp_get_attachment_image( get_post_meta( $catalog_item->ID, '_startup_cpt_catalog_main_pic_id', 1 ), 'col-3-square' );
                $cities  = get_the_terms( $catalog_item->ID, 'catalog-city' );
            ?>
                <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="catalog-item">
                        <div class="catalog-item-thumbnail">  
                            <?php if ( $main_pic ) { $image = $main_pic; }
                            else { $image = __( 'Image missing!', 'startup-reloaded' ); } ?>
                            <?php echo $image ?>
                            
                            <div class="catalog-item-title">
                                <h3><?php echo $catalog_item->post_title ?></h3>
                                <?php if ( $cities && ! is_wp_error( $cities ) ) : 

                                    $city_names = array();

                                    foreach ( $cities as $city ) {
                                        $city_names[] = $city->name;
                                    }

                                    $all_cities = join( ", ", $city_names );

                                    echo $all_cities;
                                ?>

                               <?php endif; ?>
                            </div>
                            <div class="catalog-item-details">
                                <a href="<?php echo esc_url( get_permalink($catalog_item->ID) ) ?>"><div class="caption"><i class="fa fa-plus-circle fa-5x"></i></div></a>
                            </div>
                        </div>       
                    </div>
                </div>

            <?php } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>