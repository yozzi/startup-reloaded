<?php
    $args=array( 'post_type'=>'products', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
    $products = get_posts( $args );
    $total_products = count($products);
    $slider_arrows_hover    = of_get_option( 'slider-arrows-hover' );
    $auto_format_off = of_get_option( 'auto-format-off' );
?>

<section id="products">
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <ul id="filter" class="nav nav-pills">
            <li><a class="active" href="#" data-group="all"><?php _e( 'All', 'startup-reloaded' ) ?></a></li>
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
        <div id="shuffle" class="row">
            <?php foreach ($products as $key=> $product) {
                $main_pic  = wp_get_attachment_image( get_post_meta( $product->ID, '_startup_reloaded_products_main_pic_id', 1 ), 'shuffle_thumb' );
                $short  = get_post_meta( $product->ID, '_startup_reloaded_products_short', true );
                $description  = get_post_meta( $product->ID, '_startup_reloaded_products_description', true );
                $categories = get_the_terms( $product->ID, 'product-category' );
                $status  = get_post_meta( $product->ID, '_startup_reloaded_products_status', true );
                $price  = get_post_meta( $product->ID, '_startup_reloaded_products_price', true );
                $special_price  = get_post_meta( $product->ID, '_startup_reloaded_products_special_price', true );
                $gallery  = get_post_meta( $product->ID, '_startup_reloaded_products_gallery', true );
                $url  = get_post_meta( $product->ID, '_startup_reloaded_products_url', true );
            ?>
                <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-groups='[<?php if ( $categories ) { foreach( $categories as $category ) { print '"' . $category->slug . '",'; unset($category); } } ?>"all"]'>
                    <div class="product">
                        <div class="product-thumbnail">  
                            <?php if ( $main_pic ) { $image = $main_pic; }
                            else { $image = 'Il manque une image'; } ?>                       
                            
                            <?php echo $image ?>
                                                        
                            <?php if ( $status == 'Available') { ?><span class="label label-success"><?php _e( 'Available', 'startup-reloaded' ) ?></span><?php }
                            elseif ( $status == 'Sold out soon') { ?><span class="label label-warning"><?php _e( 'Sold out soon', 'startup-reloaded' ) ?></span><?php }
                            elseif ( $status == 'Back order') { ?><span class="label label-info"><?php _e( 'Back order', 'startup-reloaded' ) ?></span><?php }
                            elseif ( $status == 'Sold out' ) { ?><span class="label label-danger"><?php _e( 'Sold out', 'startup-reloaded' ) ?></span><?php }
                            elseif ( $status == 'Unavailable' ) { ?><span class="label label-danger"><?php _e( 'Unavailable', 'startup-reloaded' ) ?></span><?php }
                            elseif ( $status == 'Sale closed' ) { ?><span class="label label-danger"><?php _e( 'Sale closed', 'startup-reloaded' ) ?></span><?php } ?>                          
                        </div>
                        <div class="product-details">
                            <h4><?php echo $product->post_title; ?></h4>
                            <h4><?php if ( $categories ) { foreach( $categories as $category ) { print '<span class="label label-default">' . $category->name . '</span> '; unset($category); } } ?></h4>

                                <?php if ( $short ) { echo '<p>' . esc_html( $short ) . '</p>'; } ?>

                        <?php if ( $special_price != '0, 00' ) { echo '<div class="product-price well well-sm"><small><strike>' . esc_html( $price ) . ' $</strike></small> <span class="text-danger">' . esc_html( $special_price ) . ' $</span></div>'; }
                            elseif ( $price != '0, 00' ) { echo '<div class="product-price well well-sm">' . esc_html( $price ) . ' $</div>'; } ?>
<!--                            <a href="<?php echo esc_url( get_permalink($product->ID) ) ?>" class="btn btn-info btn-lg btn-block" role="button">More information</a>-->
                            
                            <button type="button" class="btn btn-custom btn-lg btn-block" data-toggle="modal" data-target="#myModal-<?php echo $product->ID; ?>"><?php _e( 'More information', 'startup-reloaded' ) ?></button>
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
                          <?php $total_slides = count($gallery); ?>
                           <?php if ( $gallery ) { ?>
                            <div id="carousel-popup-<?php echo $product->ID; ?>" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php $x = 1;
                                    foreach ( $gallery as $attachment_id => $img_product_main_url ) { ?>
                                        <div class="item <?php echo ( $x==1 ) ? 'active' : '' ?>">
                                            <?php $image = wp_get_attachment_image($attachment_id, 'shuffle_main'); ?>
                                            <?php if ( $total_slides > 1 ) { ?>
                                                <a href="#carousel-popup-<?php echo $product->ID; ?>" role="button" data-slide="next">
                                            <?php } ?>  
                                                    <?php echo $image; ?>
                                            <?php if ( $total_slides > 1 ) { ?>    
                                                </a>
                                            <?php } ?>  
                                        </div>
                                    <?php $x++;
                                    } ?>                      
                                </div>
                                    <!-- Controls -->
                                    <?php if ( $total_slides > 1 ) { ?>
                                        <div class="carousel-arrow left hvr-<?php echo $slider_arrows_hover ?> hidden-xs">                                       
                                            <a class="left carousel-control" href="#carousel-popup-<?php echo $product->ID; ?>" role="button" data-slide="prev">
                                                <i class="fa fa-chevron-left fa-lg"></i>
                                            </a>                
                                        </div>
                                        <div class="carousel-arrow right hvr-<?php echo $slider_arrows_hover ?> hidden-xs">
                                           <a class="right carousel-control" href="#carousel-popup-<?php echo $product->ID; ?>" role="button" data-slide="next">
                                                <i class="fa fa-chevron-right fa-lg"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                            </div>
                            <?php } else { echo 'Il manque une image'; } ?>
                          
                        <?php if ( $description ) { 
                                if( $auto_format_off ){
                                    echo '<p>' . $description . '</p>';
                                } else {
                                    echo '<p>' . wpautop( $description ) . '</p>';
                                }
                            } ?>
                      </div>
                      <div class="modal-footer">
                           <?php if ( $special_price != '0, 00' ) { echo '<div class="product-price well well-sm"><small><strike>' . esc_html( $price ) . ' $</strike></small> <span class="text-danger">' . esc_html( $special_price ) . ' $</span></div>'; }
                            elseif ( $price != '0, 00' ) { echo '<div class="product-price well well-sm">' . esc_html( $price ) . ' $</div>'; } ?>
                        <a href="<?php if ( $url ) { echo $url; } ?>" class="btn btn-custom btn-lg btn-block" role="button"><?php _e( 'Buy it now!', 'startup-reloaded' ) ?></a>
                      </div>
                    </div>
                  </div>
                </div>
            
            
            <?php } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>