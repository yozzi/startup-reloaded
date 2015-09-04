<?php
    $args=array( 'post_type'=>'portfolio', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
    $portfolio = get_posts( $args );
    $total_portfolio = count($portfolio);
    $slider_arrows_hover = of_get_option( 'slider-arrows-hover' );
    $auto_format_off = of_get_option( 'auto-format-off' );
?>

<section id="portfolio">

    <ul id="filter" class="nav nav-pills">
        <li><a class="active" href="#" data-group="all">All</a></li>
        <?php 
            $args = array( 'hide_empty' => 0 );
            $myterms = get_terms( 'portfolio-category', $args );
            if ( ! empty( $myterms ) && ! is_wp_error( $myterms ) ){
                foreach ( $myterms as $myterms ) {
                    echo '<li><a href="#" data-group="' . $myterms->slug . '">' . $myterms->name . '</a></li>';
                }
            }
        ?>
    </ul>

<!--    <div class="container">-->
        <div id="grid" class="row">
            <?php foreach ($portfolio as $key=> $portfolio_item) {
                $thumbnail  = wp_get_attachment_image( get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_thumbnail_id', 1 ), 'shuffle_thumb' );
                $main_pic  = wp_get_attachment_image( get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_main_pic_id', 1 ), 'shuffle_thumb' );
                $short  = get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_short', true );
                $description  = get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_description', true );
                $categories = get_the_terms( $portfolio_item->ID, 'portfolio-category' );
                $gallery  = get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_gallery', true );
                $url  = get_post_meta( $portfolio_item->ID, '_startup_reloaded_portfolio_url', true );
            ?>
                <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-groups='[<?php if ( $categories ) { foreach( $categories as $category ) { print '"' . $category->slug . '",'; unset($category); } } ?>"all"]'>
                    <div class="portfolio-item">
                        <div class="portfolio-item-thumbnail">  
                            <?php if ( $thumbnail ) { $image = $thumbnail; }
                            elseif ( $main_pic ) { $image = $main_pic; }
                            else { $image = 'Il manque une image'; } ?>
                            <? echo $image ;?>
                        </div>
                        <div class="portfolio-item-details">
                            <h4><?php echo $portfolio_item->post_title; ?></h4>

                                <?php if ( $short ) { echo '<p>' . esc_html( $short ) . '</p>'; } ?>

                                <a href="<?php echo esc_url( get_permalink($portfolio_item->ID) ) ?>" class="btn btn-info btn-lg btn-block" role="button">More information</a>
                            
                        </div>  
                                
                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
<!--    </div>-->
</section>