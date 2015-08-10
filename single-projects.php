
<?php
/**
 * The template for displaying the projects.
 *
 * @package StartUp Reloaded
 */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php while ( have_posts() ) : the_post();
            $project_thumbnail  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_thumbnail', true );                    
            $project_short  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_short', true );
            $project_type  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_type', true );                    
            $project_status  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_status', true );
            $project_main_pic  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_main_pic', true );                    
            $project_description  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_description', true );
            $project_specifications  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_specifications', true );                    
            $project_options  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_options', true );
            $project_warranty  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_warranty', true );                    
            $project_price  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_price', true );
            $project_gmap  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gmap', true );
            $project_zoom  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_zoom', true );
            $project_implantation  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_implantation', true );                    
            $project_plans  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_plans', true );
            $project_gallery  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gallery', true );
            $project_url   = get_post_meta( get_the_ID(), '_startup_reloaded_projects_url', true );
        ?>
            
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	           <header class="entry-header">
		          <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
                   <?php if ( $project_short ) { ?><h5><?php echo esc_html( $project_short ); ?></h5><?php } ?>
                   <?php if ( $project_status ) { ?><div><em><?php echo esc_html( $project_status ); ?></em></div><?php } ?>
                   
                   <?php if ( $project_main_pic ) { ?>
                    <?php $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_reloaded_projects_main_pic_id', 1 ), 'large' );
                            echo $image ;?>
                   <?php } ?>
	           </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php if ( $project_description ) { ?>
                        <?php echo esc_html( $project_description ); ?>
                    <?php } ?>
                    
                    <?php if ( $project_specifications ) { ?>
                        <h5>Specifications</h5>
                        <ul>
                            <?php foreach ( (array) $project_specifications as $key => $project_specification ) { ?>
                                <li><?php echo esc_html( $project_specification ); ?></li>
                            <?php } ?>     
                        </ul>
                    <?php } ?>
                    
                    <?php if ( $project_options ) { ?>
                        <h5>Options</h5>
                        <ul>
                            <?php foreach ( (array) $project_options as $key => $project_option ) { ?>
                                <li><?php echo esc_html( $project_option ); ?></li>
                            <?php } ?>     
                        </ul>
                    <?php } ?>
                    
                    <?php if ( $project_warranty ) { ?>
                        <h5>Garantie</h5>
                        <?php echo esc_html( $project_warranty ); ?>
                    <?php } ?>
                    
                    <?php if ( $project_price ) { ?>
                        <h5>Prix</h5>
                        <?php echo esc_html( $project_price ); ?>
                    <?php } ?>
                    
                    <?php if ( $project_implantation ) { ?>
                        <h5>Certificat d'implantation</h5>
                        <?php $image = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_reloaded_projects_implantation_id', 1 ), 'large' );
                            echo $image ;?>
                    <?php } ?>
                    
                    <?php if ( $project_gmap ) { ?>
                        <h5>Localisation</h5>
                        <?php $mapGPS = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gmap', true ); ?>
                        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                        <div id="gmap_canvas" style="height:500px;width:100%;"></div>
                        <script type="text/javascript">
                            function init_map(){
                                var myOptions = {
                                    <?php if ( $project_zoom ) { ?>
                                        zoom:<?php echo $project_zoom; ?>,
                                    <?php } else { ?>
                                        zoom:14,
                                    <?php } ?>
                                    center:new google.maps.LatLng(<?php echo $mapGPS[latitude]; ?>,<?php echo $mapGPS[longitude]; ?>)
                                };
                                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                                marker = new google.maps.Marker({map: map,clickable: false,position: new google.maps.LatLng(<?php echo $mapGPS[latitude]; ?>,<?php echo $mapGPS[longitude]; ?>)});
                            }
                            google.maps.event.addDomListener(window, 'load', init_map);
                        </script>
                    <?php } ?>
                    
                    <?php if ( $project_plans ) { ?>
                        <h5>Plans</h5>
                        <?php foreach ( $project_plans as $attachment_id => $img_medium_url ) {
                            $image = wp_get_attachment_link($attachment_id, 'medium');
                            echo $image;
                        } ?>
                    
                    <?php } ?>
                    
                    <?php if ( $project_gallery ) { ?>
                        <h5>Galerie photos</h5>
                        <div id="project-gallery"><?php foreach ( $project_gallery as $attachment_id => $img_thumbnail_url ) {
                            $image = wp_get_attachment_link($attachment_id, 'thumbnail');
                            echo $image;
        } ?></div>
                    
                    <?php } ?> 
                    
                    <?php if ( $project_url ) { ?>
                    <div><a href="<?php echo esc_html( $project_url ); ?>" target="_blank">Visitez ce projet sur DuProprio</a></div>
                    <?php } ?> 
                </div><!-- .entry-content -->

	           <footer class="entry-footer">
                   <?php startup_reloaded_entry_footer(); ?>
	           </footer><!-- .entry-footer -->
            </article><!-- #post-## -->
        </div>

        <?php the_post_navigation(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
