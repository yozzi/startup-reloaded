<?php
    $args=array( 'post_type'=>'products', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
    $products = get_posts( $args );
    $total_products = count($products);
?>

<section id="products">

    <ul id="filter" class="nav nav-pills">
        <li><a class="active" href="#" data-group="all">Tous</a></li>
        <?php 
            $args = array( 'hide_empty' => 0 );
            $myterms = get_terms( 'product-category', $args );
            if ( ! empty( $myterms ) && ! is_wp_error( $myterms ) ){
                foreach ( $myterms as $myterms ) {
                    echo '<li><a href="#" data-group="' . $myterms->slug . '">' . $myterms->name . '</a></li>';
                }
            }
        ?>
    </ul>

<!--    <div class="container">-->
        <div id="grid" class="row">
            <?php foreach ($products as $key=> $product) {
                $thumbnail  = wp_get_attachment_image( get_post_meta( $product->ID, '_startup_reloaded_products_thumbnail_id', 1 ), 'product_thumb' );
                $main_pic  = wp_get_attachment_image( get_post_meta( $product->ID, '_startup_reloaded_products_main_pic_id', 1 ), 'product_thumb' );
                $main_pic_popup  = wp_get_attachment_image( get_post_meta( $product->ID, '_startup_reloaded_products_main_pic_id', 1 ), 'product_main' );
                $short  = get_post_meta( $product->ID, '_startup_reloaded_products_short', true );
                $description  = get_post_meta( $product->ID, '_startup_reloaded_products_description', true );
                $categories = get_the_terms( $product->ID, 'product-category' );
                $status  = get_post_meta( $product->ID, '_startup_reloaded_products_status', true );
                $price  = get_post_meta( $product->ID, '_startup_reloaded_products_price', true );
                $special_price  = get_post_meta( $product->ID, '_startup_reloaded_products_special_price', true );
                $url  = get_post_meta( $product->ID, '_startup_reloaded_products_url', true );
            ?>
                <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-groups='[<?php if ( $categories ) { foreach( $categories as $category ) { print '"' . $category->slug . '",'; unset($category); } } ?>"all"]'>
                    <div class="product">
                        <div class="product-thumbnail">        
                            <?php if ( $thumbnail ) { $image = $thumbnail; }
                            elseif ( $main_pic ) { $image = $main_pic; }
                            else { $image = 'Il manque une image'; } ?>
                            <? echo $image ;?>
                            <?php if ( $status == 'Available') { ?><span class="label label-success"><?php _e( $status, 'startup-reloaded-products' ) ?></span><?php }
                            elseif ( $status == 'Sold out soon') { ?><span class="label label-warning"><?php _e( $status, 'startup-reloaded-products' ) ?></span><?php }
                            elseif ( $status == 'Back order') { ?><span class="label label-info"><?php _e( $status, 'startup-reloaded-products' ) ?></span><?php }
                            elseif ( $status == 'Sold out' || $status == 'Unavailable') { ?><span class="label label-danger"><?php _e( $status, 'startup-reloaded-products' ) ?></span><?php }
                            elseif ( $status ) { ?><span class="label label-default"><?php _e( $status, 'startup-reloaded-products' ) ?></span><?php } ?>
                        </div>
                        <div class="product-details">
                            <h4><?php echo $product->post_title; ?></h4>

                                <?php if ( $short ) { echo '<p>' . esc_html( $short ) . '</p>'; } ?>

                        <?php if ( $special_price != '0, 00' ) { echo '<div class="product-price well well-sm"><small><strike>' . esc_html( $price ) . ' $</strike></small> <span class="text-danger">' . esc_html( $special_price ) . ' $</span></div>'; }
                            elseif ( $price != '0, 00' ) { echo '<div class="product-price well well-sm">' . esc_html( $price ) . ' $</div>'; } ?>
<!--                            <a href="<?php echo esc_url( get_permalink($product->ID) ) ?>" class="btn btn-info btn-lg btn-block" role="button">More information</a>-->
                            
                            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal-<?php echo $product->ID; ?>">Voir les d&eacute;tails</button>
                        </div>  
                                
                    </div>
                </div>
            
                <!-- Modal -->
                <div class="modal fade" id="myModal-<?php echo $product->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel"><?php echo $product->post_title ?></h2>
                      </div>
                      <div class="modal-body">
                          <?php if ( $main_pic_popup ) { ?>
                            <? echo $main_pic_popup ;?>
                          <?php } else { echo 'Il manque une image'; } ?>
                          
                        <?php if ( $description ) { echo '<h4>Description</h4><p>' . $description . '</p>'; } ?>
                      </div>
                      <div class="modal-footer">
                           <?php if ( $special_price != '0, 00' ) { echo '<div class="product-price well well-sm"><small><strike>' . esc_html( $price ) . ' $</strike></small> <span class="text-danger">' . esc_html( $special_price ) . ' $</span></div>'; }
                            elseif ( $price != '0, 00' ) { echo '<div class="product-price well well-sm">' . esc_html( $price ) . ' $</div>'; } ?>
                        <a href="<?php if ( $url ) { echo $url; } ?>" class="btn btn-primary btn-lg btn-block" role="button">J'ach&egrave;te !</a>
                      </div>
                    </div>
                  </div>
                </div>
            
            
            <?php } // endforeach ?>
        </div>
<!--    </div>-->
</section>