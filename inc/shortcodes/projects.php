<?php
$args=array( 'post_type'=>'projects', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
$projects = get_posts( $args );
$total_projects = count($projects);
?>
<section id="projects">
    <div class="container">
        <div class="row">
            <?php foreach ($projects as $key=> $project) {
                $project_thumbnail  = get_post_meta( $project->ID, '_startup_reloaded_projects_thumbnail', true );  
                $project_short  = get_post_meta( $project->ID, '_startup_reloaded_projects_short', true );  
                $project_type  = get_post_meta( $project->ID, '_startup_reloaded_projects_type', true );                  
                $project_status  = get_post_meta( $project->ID, '_startup_reloaded_projects_status', true );
                $project_main_pic  = get_post_meta( $project->ID, '_startup_reloaded_projects_main_pic', true );                    
                $project_description  = get_post_meta( $project->ID, '_startup_reloaded_projects_description', true );
                $project_specifications  = get_post_meta( $project->ID, '_startup_reloaded_projects_specifications', true );                    
                $project_options  = get_post_meta( $project->ID, '_startup_reloaded_projects_options', true );
                $project_warranty  = get_post_meta( $project->ID, '_startup_reloaded_projects_warranty', true );                    
                $project_price  = get_post_meta( $project->ID, '_startup_reloaded_projects_price', true );
                $project_implantation  = get_post_meta( $project->ID, '_startup_reloaded_projects_implantation', true );                    
                $project_plans  = get_post_meta( $project->ID, '_startup_reloaded_projects_plans', true );
                $project_gallery  = get_post_meta( $project->ID, '_startup_reloaded_projects_gallery', true );
                $project_url   = get_post_meta( $project->ID, '_startup_reloaded_projects_url', true );
    
            ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="project">
                        <div class="project-header">
                            <p class="project-title"><?php echo $project->post_title ?></p>
                            
                            
                            <?php if ( $project_thumbnail ) { 
                                
                                $image = wp_get_attachment_image( get_post_meta( $project->ID, '_startup_reloaded_projects_thumbnail_id', 1 ), 'thumbnail' );
                            
                            } elseif ( $project_main_pic ) {
                            
                                $image = wp_get_attachment_image( get_post_meta( $project->ID, '_startup_reloaded_projects_main_pic_id', 1 ), 'thumbnail' );
                            
                            } else {
                            
                                $image = 'Il manque une image';
                            
                            } ?>
                            
                                <a href="<?php echo esc_url( get_permalink($project->ID) ) ?>"><? echo $image ;?></a>
                            
                            <?php if ( $project_short ) { ?><h5><?php echo esc_html( $project_short ); ?></h5><?php } ?>
                            <?php if ( $project_status ) { ?><div><em><?php echo esc_html( $project_status ); ?></em></div><?php } ?>
                            <a href="<?php echo esc_url( get_permalink($project->ID) ) ?>">Visiter ce projet</a>
                   
                   
                        </div>
                    </div>
                </div>
            <?php } // endforeach ?>
        </div>
    </div>
</section>