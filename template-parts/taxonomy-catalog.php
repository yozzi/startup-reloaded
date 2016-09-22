<section id="catalog">
    <div id="grid" class="row no-gutters">
        <?php while ( have_posts() ) : the_post();
            $main_pic = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_cpt_catalog_main_pic_id', 1 ), 'grid_thumb' );
        ?>    
            <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="catalog-item">
                    <div class="catalog-item-thumbnail">  
                        <?php if ( $main_pic ) { $image = $main_pic; }
                        else { $image = __( 'Image missing!', 'startup-reloaded' ); } ?>
                        <?php echo $image ?>

                        <div class="catalog-item-title">
                            <?php the_title( '<h3>', '</h3>' ) ?>
                        </div>
                        <div class="catalog-item-details">
                            <a href="<?php echo esc_url( the_permalink() ) ?>"><div class="caption"><i class="fa fa-plus-circle fa-5x"></i></div></a>
                        </div>
                    </div>       
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<section>