<?php
$args=array( 'post_type'=>'projects', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
$projects = get_posts( $args );
$total_projects = count($projects);
?>
<section id="projects">
    <div class="container">
        <div class="row">
            <?php foreach ($projects as $key=> $project) {
                $thumbnail  = wp_get_attachment_image( get_post_meta( $project->ID, '_startup_reloaded_projects_thumbnail_id', 1 ), 'thumbnail' );
                $short  = get_post_meta( $project->ID, '_startup_reloaded_projects_short', true );
                $type  = get_post_meta( $project->ID, '_startup_reloaded_projects_type', true );
                $status  = get_post_meta( $project->ID, '_startup_reloaded_projects_status', true );
                $main_pic  = wp_get_attachment_image( get_post_meta( $project->ID, '_startup_reloaded_projects_main_pic_id', 1 ), 'thumbnail' );
                $description  = get_post_meta( $project->ID, '_startup_reloaded_projects_description', true );
                $specifications  = get_post_meta( $project->ID, '_startup_reloaded_projects_specifications', true );
                $options  = get_post_meta( $project->ID, '_startup_reloaded_projects_options', true );
                $warranty  = get_post_meta( $project->ID, '_startup_reloaded_projects_warranty', true );
                $price  = get_post_meta( $project->ID, '_startup_reloaded_projects_price', true );
                $implantation  = get_post_meta( $project->ID, '_startup_reloaded_projects_implantation', true );
                $plans  = get_post_meta( $project->ID, '_startup_reloaded_projects_plans', true );
                $gallery  = get_post_meta( $project->ID, '_startup_reloaded_projects_gallery', true );
                $url   = get_post_meta( $project->ID, '_startup_reloaded_projects_url', true );
    
            ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="project">
                        <div class="project-header">
                            <p class="project-title"><?php echo $project->post_title ?></p>
                            
                            
                            <?php if ( $thumbnail ) { 
                                
                                $image = $thumbnail
                            
                            } elseif ( $main_pic ) {
                            
                                $image = $main_pic
                            
                            } else {
                            
                                $image = 'Il manque une image';
                            
                            } ?>
                            
                                <a href="<?php echo esc_url( get_permalink($project->ID) ) ?>"><? echo $image ;?></a>
                            
                            <?php if ( $short ) { ?><h5><?php echo esc_html( $short ); ?></h5><?php } ?>
                            <?php if ( $status ) { ?><div><em><?php echo esc_html( $status ); ?></em></div><?php } ?>
                            <a href="<?php echo esc_url( get_permalink($project->ID) ) ?>">Visiter ce projet</a>
                   
                   
                        </div>
                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
    </div>
</section>