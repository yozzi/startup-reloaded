<?php
$args=array( 'post_type'=>'charts', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$charts = get_posts( $args );
$total_charts = count($charts);
?>
<section id="charts"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">
            <?php foreach ($charts as $key=> $chart) {
                $type = get_post_meta( $chart->ID, '_startup_cpt_charts_type', true );
                $height = get_post_meta( $chart->ID, '_startup_cpt_charts_height', true );
                $data = get_post_meta( $chart->ID, '_startup_cpt_charts_data', true );
            ?>
            <div class="col-xs-12 col-sm-3">
                <div class="chart">
                    <h3 class="media-heading"><?php echo $chart->post_title ?></h3>
                    
                    
                    <?php if ( $type == 'bar' ) { ?>
                        <ul data-bar-id="<?php echo $chart->post_name ?>">
                    <?php } elseif ( ( $type == 'donut' ) ) { ?>
                        <ul data-pie-id="<?php echo $chart->post_name ?>" data-options='{"donut": "true"}'>
                    <?php } else { ?>
                        <ul data-pie-id="<?php echo $chart->post_name ?>">
                    <?php } ?>
                            <?php if ( $data ) {
                                foreach ( (array) $data as $key => $data ) { ?>
                                    <li data-value="<?php echo $data['value'] ?>"><?php echo $data['name'] ?></li>
                                <?php }    
                            } ?>
                        </ul>
                    <div id="<?php echo $chart->post_name ?>"<?php if ( $type == 'bar' ) { ?> style="height: <?php echo $height ?>px;"<?php } ?>></div>
                    
                    
                </div> 
            </div>
            <?php } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
