<?php
$args=array( 'post_type'=>'team', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$members = get_posts( $args );

if ( $atts['id'] ) {
    // Si attribut id
        $member               = get_post( $atts['id'] );
        $member_image_url     = wp_get_attachment_image_src( get_post_thumbnail_id($member->ID), 'grid_thumb' );
        $member_social_icon_1 = get_post_meta($member->ID, '_startup_cpt_team_icon_1', true );
        $member_social_link_1 = get_post_meta($member->ID, '_startup_cpt_team_link_1', true );
        $member_social_icon_2 = get_post_meta($member->ID, '_startup_cpt_team_icon_2', true );
        $member_social_link_2 = get_post_meta($member->ID, '_startup_cpt_team_link_2', true );
        $member_social_icon_3 = get_post_meta($member->ID, '_startup_cpt_team_icon_3', true );
        $member_social_link_3 = get_post_meta($member->ID, '_startup_cpt_team_link_3', true );
        $member_social_icon_4 = get_post_meta($member->ID, '_startup_cpt_team_icon_4', true );
        $member_social_link_4 = get_post_meta($member->ID, '_startup_cpt_team_link_4', true );
    ?>


<img src="<?php echo $member_image_url[0] ?>" class="img-responsive wp-post-image" alt="<?php echo $member->post_title ?>">
<p class="desc">
    <h2><?php echo $member->post_title ?></h2>
    <?php echo $member->post_content ?>
    <ul class="social">
        <li class="facebook"><a target="_blank" href="<?php echo $member_social_link_1; ?>"><i class="fa fa-<?php echo $member_social_icon_1; ?>"></i></a></li>
        <li class="twitter"><a target="_blank" href="<?php echo $member_social_link_2; ?>"><i class="fa fa-<?php echo $member_social_icon_2; ?>"></i></a></li>
        <li class="plusone"><a target="_blank" href="<?php echo $member_social_link_3; ?>"><i class="fa fa-<?php echo $member_social_icon_3; ?>"></i></a></li>
        <li class="pinterest"><a target="_blank" href="<?php echo $member_social_link_4; ?>"><i class="fa fa-<?php echo $member_social_icon_4; ?>"></i></a></li>
    </ul>
</p>   
    <?php } else {
    // Si pas d'attribut id ?>
            Vous devez renseigner le ID du menu
<?php } ?>