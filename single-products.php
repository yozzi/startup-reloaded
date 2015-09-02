
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
            $thumbnail  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_thumbnail', true );                    
            $short  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_short', true );
            $type  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_type', true );                    
            $status  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_status', true );
            $main_pic  = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_reloaded_projects_main_pic_id', 1 ), 'large' );      
            $description  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_description', true );
            $specifications  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_specifications', true );                    
            $options  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_options', true );
            $warranty  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_warranty', true );                    
            $price  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_price', true );
            $gmap  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gmap', true );
            $zoom  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_zoom', true );
            $implantation  = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_reloaded_projects_implantation_id', 1 ), 'large' );
            $plans  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_plans', true );
            $gallery  = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gallery', true );
            $url   = get_post_meta( get_the_ID(), '_startup_reloaded_projects_url', true );
        ?>
            
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	           <header class="entry-header">
		          <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
                   <?php if ( $short ) { ?><h5><?php echo esc_html( $short ); ?></h5><?php } ?>
                   <?php if ( $status ) { ?><div><em><?php echo esc_html( $status ); ?></em></div><?php } ?>
                   
                   <?php if ( $main_pic ) { 
                            echo $main_pic ;?>
                   <?php } ?>
	           </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php if ( $description ) { ?>
                        <?php echo esc_html( $description ); ?>
                    <?php } ?>
                    
                    <?php if ( $specifications ) { ?>
                        <h5>Specifications</h5>
                        <ul>
                            <?php foreach ( (array) $specifications as $key => $specification ) { ?>
                                <li><?php echo esc_html( $specification ); ?></li>
                            <?php } ?>     
                        </ul>
                    <?php } ?>
                    
                    <?php if ( $options ) { ?>
                        <h5>Options</h5>
                        <ul>
                            <?php foreach ( (array) $options as $key => $option ) { ?>
                                <li><?php echo esc_html( $option ); ?></li>
                            <?php } ?>     
                        </ul>
                    <?php } ?>
                    
                    <?php if ( $warranty ) { ?>
                        <h5>Garantie</h5>
                        <?php echo esc_html( $warranty ); ?>
                    <?php } ?>
                    
                    <?php if ( $price ) { ?>
                        <h5>Prix</h5>
                        <?php echo esc_html( $price ); ?>
                    <?php } ?>
                    
                    <?php if ( $implantation ) { ?>
                        <h5>Certificat d'implantation</h5>
                        <?php 
                            echo $implantation ;?>
                    <?php } ?>
                    
                    <?php if ( $gmap ) { ?>
                        <h5>Localisation</h5>
                        <?php $mapGPS = get_post_meta( get_the_ID(), '_startup_reloaded_projects_gmap', true ); ?>
                        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                        <div id="gmap_canvas" style="height:500px;width:100%;"></div>
                        <script type="text/javascript">
                            function init_map(){
                                var myOptions = {
                                    <?php if ( $zoom ) { ?>
                                        zoom:<?php echo $zoom; ?>,
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
                    
                    <?php if ( $plans ) { ?>
                        <h5>Plans</h5>
                        <?php foreach ( $plans as $attachment_id => $img_medium_url ) {
                            $image = wp_get_attachment_link($attachment_id, 'medium');
                            $attachment_meta = wp_get_attachment($attachment_id);
                            echo $image;
                            if ( $attachment_meta['description'] ){
                                echo '<br />' . $attachment_meta['description'];
                            }
                        }
                    } ?>
                    
                    <?php if ( $gallery ) { ?>
                        <h5>Galerie photos</h5>
                        <div id="project-gallery"><?php foreach ( $gallery as $attachment_id => $img_thumbnail_url ) {
                            $image = wp_get_attachment_link($attachment_id, 'thumbnail');
                            echo $image;
        } ?></div>
                    
                    <?php } ?> 
                    
                    <?php if ( $url ) { ?>
                    <div><a href="<?php echo esc_html( $url ); ?>" target="_blank">Visitez ce projet sur DuProprio</a></div>
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
