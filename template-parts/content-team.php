<?php
$slider = of_get_option( 'team-slider' );
$order = of_get_option( 'team-order' );
$number = of_get_option( 'team-number' );
if ( $number ) { $max = $number; } else {$max = -1;};
if ( $atts['cat'] ) {
    $args=array(
        'post_type'=>'team',
        'tax_query' => array(
            array(
                'taxonomy' => 'team-category',
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
    $args=array( 'post_type'=>'team', 'orderby' => $order,'order' => 'ASC', 'numberposts' => $max );
}
$team = get_posts( $args );
$total_team = count($team);
?>
<section id="team<?php if ( $atts['cat'] ) { echo '-' . $atts['cat']; } ?>" style="background:<?php echo $atts['bg'] ?>">
    <?php if ( is_front_page() ) { ?><div class="container"><?php } ?>
        <?php if ( $slider ) { ?><div class="row"><?php } ?>
            <?php if ( $total_team > 4 && $slider ) { ?>
                <div id="team-carousel" class="carousel slide">
                    <div class="carousel-inner">
                        <?php }
                        $count = 1;

                        foreach ( $team as $key=> $team ) {
                            //$team_image_url     = wp_get_attachment_url( get_post_thumbnail_id($team->ID) );
                            $team_image_url     = wp_get_attachment_image_src( get_post_thumbnail_id($team->ID), 'grid_thumb' );
                            
                            $team_capacity      = get_post_meta($team->ID, '_startup_reloaded_team_capacity', true );
                            $team_social_icon_1 = get_post_meta($team->ID, '_startup_reloaded_team_icon_1', true );
                            $team_social_link_1 = get_post_meta($team->ID, '_startup_reloaded_team_link_1', true );
                            $team_social_icon_2 = get_post_meta($team->ID, '_startup_reloaded_team_icon_2', true );
                            $team_social_link_2 = get_post_meta($team->ID, '_startup_reloaded_team_link_2', true );
                            $team_social_icon_3 = get_post_meta($team->ID, '_startup_reloaded_team_icon_3', true );
                            $team_social_link_3 = get_post_meta($team->ID, '_startup_reloaded_team_link_3', true );
                            $team_social_icon_4 = get_post_meta($team->ID, '_startup_reloaded_team_icon_4', true );
                            $team_social_link_4 = get_post_meta($team->ID, '_startup_reloaded_team_link_4', true );
                            $team_page          = get_post_meta($team->ID, '_startup_reloaded_team_page', true );

                            if ( $count%4 == 1 ) { 
                                if ( $slider ) { ?>
                                    <div class="item<?php if ( $count == 1 ) { echo ' active'; } ?>">
                                <?php } else { ?>
                                    <div class="row">
                                <?php } ?>
                            <?php } ?>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="team-member">
                                    <div class="team-image">
                                        <img src="<?php echo $team_image_url[0] ?>" class="img-responsive wp-post-image" alt="<?php echo $team->post_title ?>">
                                    </div>
                                    <div class="team-desc">                     
                                        <strong class="name"><?php echo $team->post_title ?></strong>
                                        <p class="small text-muted designation"><?php echo $team_capacity ?></p>
                                        <p class="desc"><?php echo $team->post_content ?></p>
                                        <p>
                                            <ul class="social">
                                                <li class="facebook"><a target="_blank" href="<?php echo $team_social_link_1; ?>"><i class="fa fa-<?php echo $team_social_icon_1; ?>"></i></a></li>
                                                <li class="twitter"><a target="_blank" href="<?php echo $team_social_link_2; ?>"><i class="fa fa-<?php echo $team_social_icon_2; ?>"></i></a></li>
                                                <li class="plusone"><a target="_blank" href="<?php echo $team_social_link_3; ?>"><i class="fa fa-<?php echo $team_social_icon_3; ?>"></i></a></li>
                                                <li class="pinterest"><a target="_blank" href="<?php echo $team_social_link_4; ?>"><i class="fa fa-<?php echo $team_social_icon_4; ?>"></i></a></li>
                                            </ul>
                                        </p>
                                        <?php if ( $team_page ) { ?>
                                            <p>
                                                <a href="<?php  echo site_url() . '/' . $team_page ?>" class="btn btn-custom btn-sm" role="button"><?php _e( 'Profile', 'startup-reloaded' ) ?></a>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>        
                            <?php if ( $count%4 == 0 ) { ?>
                                </div>
                            <?php }
                            $count++;
                        } // endforeach

                        if  ( $count%4 != 1  ) {
                            echo "</div>";
                        };
                        if ( $total_team > 4 && $slider ) { ?>
                            </div>
                                <a class="left carousel-control hidden-xs" href="#team-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                <a class="right carousel-control hidden-xs" href="#team-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                            </div>
                        <?php } ?>
        <?php if ( $slider ) { ?></div><?php } ?>
    <?php if ( is_front_page() ) { ?></div><?php } ?>
</section>