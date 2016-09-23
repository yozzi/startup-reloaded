<?php

require get_template_directory() . '/inc/theme-options.php';

if ( $atts['order'] ) {
    $order = $atts['order'];
} else {
    $order = $partners_order;
}

if ( $partners_number ) { $max = $partners_number; } else {$max = -1;};


if ( $atts['cat'] ) {
    $args=array(
        'post_type'=>'partners',
        'tax_query' => array(
            array(
                'taxonomy' => 'partners-category',
                'field' => 'ID',
                'terms' => $atts['cat']
                )
           ),
        'orderby' => $order,
        'order' => 'ASC',
        'numberposts' => $max
    );
} elseif ( $atts['id'] ) {
    //Fiche unique ici
} else {

    $args=array( 'post_type'=>'partners', 'orderby' => $order,'order' => 'ASC', 'numberposts' => $max );
}
$partners = get_posts( $args );
$total_partners = count($partners);
?>
<section id="partners"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if ( $atts['carousel'] ) { ?>
        <div class="row">          
            <?php if ($total_partners > 4){ ?>
                <div id="partners-carousel" class="carousel slide" data-interval="2000" data-ride="carousel" data-type="multi">
                    <div class="carousel-inner partners-inner">
                        <?php } $count = 1; ?>
                            
                                <?php foreach ($partners as $key=> $partner) {
                                    $logo = wp_get_attachment_image( get_post_meta( $partner->ID, '_startup_cpt_partners_logo_id', 1 ), 'col-2-full' );
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
    <?php } else { ?>
        <div class="row">
            <?php foreach ($partners as $key=> $partner) {
                $logo = wp_get_attachment_image( get_post_meta( $partner->ID, '_startup_cpt_partners_logo_id', 1 ), 'col-2-full' );
                $url = get_post_meta( $partner->ID, '_startup_cpt_partners_url', true ); ?>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
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
            <?php } ?> 
        </div>
    <?php } ?>
</section>