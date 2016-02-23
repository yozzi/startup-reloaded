<?php
if ( $atts['id'] ) {
    // Si attribut id
        $author               = get_post( $atts['id'] );
        $author_image_url     = wp_get_attachment_image_src( get_post_thumbnail_id($author->ID), 'thumbnail' );
        $author_social_icon_1 = get_post_meta($author->ID, '_startup_cpt_team_icon_1', true );
        $author_social_link_1 = get_post_meta($author->ID, '_startup_cpt_team_link_1', true );
        $author_social_icon_2 = get_post_meta($author->ID, '_startup_cpt_team_icon_2', true );
        $author_social_link_2 = get_post_meta($author->ID, '_startup_cpt_team_link_2', true );
        $author_social_icon_3 = get_post_meta($author->ID, '_startup_cpt_team_icon_3', true );
        $author_social_link_3 = get_post_meta($author->ID, '_startup_cpt_team_link_3', true );
        $author_social_icon_4 = get_post_meta($author->ID, '_startup_cpt_team_icon_4', true );
        $author_social_link_4 = get_post_meta($author->ID, '_startup_cpt_team_link_4', true );
        $author_page            = get_permalink( get_post_meta($author->ID, '_startup_cpt_team_page', true ) );
        $author_page_test       = get_post_meta($author->ID, '_startup_cpt_team_page', true );
    ?>

<div class="author-bio"<?php if ( $atts['bg'] ) { ?> style="background:<?php echo $atts['bg'] ?>"<?php } ?>>
    <?php if ( $author_image_url ) { ?>
        <div class="bio-avatar">
            <?php if ( $author_page_test ) { ?><a href="<?php echo $author_page ?>"><?php } ?>
            <img src="<?php echo $author_image_url[0] ?>" class="img-responsive wp-post-image img-circle" alt="<?php echo $author->post_title ?>">
            <?php if ( $author_page_test ) { ?></a><?php } ?>
        </div>
    <?php } ?>
    
    <h4 class="bio-name">
        <?php if ( $author_page_test ) { ?><a href="<?php echo $author_page ?>"><?php } ?>
        <?php echo $author->post_title ?>
        <?php if ( $author_page_test ) { ?></a><?php } ?>
    </h4>
    <?php if ( $author_social_link_1 || $author_social_link_2 || $author_social_link_3 || $author_social_link_4 ) { ?>
        <p class="bio-meta">
            <?php if ( $author_social_link_1 ) { ?>
                <span class="facebook"><a target="_blank" href="<?php echo $author_social_link_1; ?>"><i class="fa fa-<?php echo $author_social_icon_1; ?>"></i></a></span>
            <?php } ?>
            
            <?php if ( $author_social_link_2 ) { ?>
                <span class="twitter"><a target="_blank" href="<?php echo $author_social_link_2; ?>"><i class="fa fa-<?php echo $author_social_icon_2; ?>"></i></a></span>
            <?php } ?>
            
            <?php if ( $author_social_link_3 ) { ?>
                <span class="plusone"><a target="_blank" href="<?php echo $author_social_link_3; ?>"><i class="fa fa-<?php echo $author_social_icon_3; ?>"></i></a></span>
            <?php } ?>
            
            <?php if ( $author_social_link_4 ) { ?>
                <span class="pinterest"><a target="_blank" href="<?php echo $author_social_link_4; ?>"><i class="fa fa-<?php echo $author_social_icon_4; ?>"></i></a></span>
            <?php } ?>
        </p>
    <?php } ?>
    
    <?php if ( $author->post_content ) { ?>
        <p class="bio-desc"><?php echo $author->post_content ?></p>
    <?php } ?>
    
    <div class="clearfix"></div>
</div>



    <?php } else {
    // Si pas d'attribut id ?>
            Vous devez renseigner le ID de l'auteur
<?php } ?>