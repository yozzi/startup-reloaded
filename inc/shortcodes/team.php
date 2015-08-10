<?php
$args=array( 'post_type'=>'team', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
$team = get_posts( $args );
$total_team = count($team);
?>
<section id="team">
    
    
    <div class="container">
        <div class="row">            
            <?php if ($total_team > 4){ ?>
                <div id="team-carousel" class="carousel slide">
                    <div class="carousel-inner">
                            <?php }

                            $count = 1;
                            
                            foreach ($team as $key=> $team) {
                                
                            $team_image_url       = wp_get_attachment_url( get_post_thumbnail_id($team->ID) );
                            $team_capacity          = get_post_meta($team->ID, '_startup_reloaded_team_capacity', true );
                            $team_social_icon_1    = get_post_meta($team->ID, '_startup_reloaded_team_icon_1', true );
                            $team_social_link_1    = get_post_meta($team->ID, '_startup_reloaded_team_link_1', true );
                            $team_social_icon_2    = get_post_meta($team->ID, '_startup_reloaded_team_icon_2', true );
                            $team_social_link_2    = get_post_meta($team->ID, '_startup_reloaded_team_link_2', true );
                            $team_social_icon_3    = get_post_meta($team->ID, '_startup_reloaded_team_icon_3', true );
                            $team_social_link_3    = get_post_meta($team->ID, '_startup_reloaded_team_link_3', true );
                            $team_social_icon_4    = get_post_meta($team->ID, '_startup_reloaded_team_icon_4', true );
                            $team_social_link_4    = get_post_meta($team->ID, '_startup_reloaded_team_link_4', true );
                        if ($count%4 == 1){  
                        ?>
                        <div class="item<?php if ($count == 1){ echo ' active';} ?>">
                        <?php } ?>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="team-member">
                                    <div class="team-image"><img width="400" height="400" src="<?php echo $team_image_url ?>" class="img-responsive wp-post-image" alt="<?php echo $team->post_title ?>">
                                    </div>
                                    <div class="team-desc"><strong class="name"><?php echo $team->post_title ?></strong>
                                        <p class="small text-muted designation"><?php echo $team_capacity ?></p>
                                        <p class="desc"><?php echo $team->post_content ?></p>
                                        <ul class="social">
                                            <li class="facebook"><a target="_blank" href="<?php echo $team_social_link_1; ?>"><i class="fa fa-<?php echo $team_social_icon_1; ?>"></i></a>
                                            </li>
                                            <li class="twitter"><a target="_blank" href="<?php echo $team_social_link_2; ?>"><i class="fa fa-<?php echo $team_social_icon_2; ?>"></i></a>
                                            </li>
                                            <li class="plusone"><a target="_blank" href="<?php echo $team_social_link_3; ?>"><i class="fa fa-<?php echo $team_social_icon_3; ?>"></i></a>
                                            </li>
                                            <li class="pinterest"><a target="_blank" href="<?php echo $team_social_link_4; ?>"><i class="fa fa-<?php echo $team_social_icon_4; ?>"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>        
                            <?php if ($count%4 == 0){ ?>
                        </div>
                            <?php }
                        $count++;
                        } // endforeach

                        if ($count%4 != 1) echo "</div>";
                        if ($total_team > 4){ ?>
                        </div>
                        <a class="left carousel-control hidden-xs" href="#team-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="right carousel-control hidden-xs" href="#team-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <?php } ?>
                       
        </div>
    </div>
    

            

</section>
