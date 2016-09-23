<?php
/**
 * The template for displaying the catalog.
 *
 * @package StartUp Reloaded
 */

get_header(); ?>

 <?php if ( current_user_can('read_private_pages') ) { get_template_part( 'template-parts/toolbar', 'catalog' ); } ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php while ( have_posts() ) : the_post();
            $main_pic  = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_cpt_catalog_main_pic_id', 1 ), 'col-12-crop' );
            $content_pic  = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_cpt_catalog_content_pic_id', 1 ), 'col-6-full' );
            $short  = get_post_meta( get_the_ID(), '_startup_cpt_catalog_short', true );
            $seasons  = get_the_terms( get_the_ID(), 'catalog-season' );
            $cities  = get_the_terms( get_the_ID(), 'catalog-city' );
            $desc  = get_post_meta( get_the_ID(), '_startup_cpt_catalog_description', true );
            $notes  = get_post_meta( get_the_ID(), '_startup_cpt_catalog_notes', true );
        ?>
            
        <div class="col-xs-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="pf-content">
                   <header class="entry-header startup-cpt-catalog">
                       <div class="row">
                            <div class="col-xs-12">
                                <?php if ( $cities && ! is_wp_error( $cities ) ) {
                                    $city_names = array();
                                    foreach ( $cities as $city ) {
                                        $city_names[] = $city->name;
                                    };
                                    $all_cities = join( " - ", $city_names );
                                    }
                                ?>
                                
                                <h1 class="entry-title"><?php echo $all_cities ?> - <?php the_title(); ?></h1>
                                
                                
                                <div id="catalog-header">
                                    <?php if ( $seasons && ! is_wp_error( $seasons ) ) : 
                                    $season_names = array();
                                    foreach ( $seasons as $season ) {
                                        $season_names[] = $season->name;
                                    }
                                    $all_seasons = join( ", ", $season_names );
                                ?>

                                <?php echo '<h3>' . __( 'Season', 'startup-reloaded' ) . ' ' . $all_seasons . '</h3>' ?>

                                <?php endif; ?>

                                    <div id="pf-entry-title"><?php the_title() ?></div>
                                        <?php if ( $short ) { ?><h2><em><?php echo esc_html( $short ); ?></em></h2><?php } ?>
                                                                <?php if ( $main_pic[0] ) { ?>
                                    <img src="<?php echo $main_pic[0] ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                <?php } ?>
                                </div>
                           </div>
                           <div id="pf-entry-logos">
                               <img src="http://portail.dev/wp-content/uploads/2016/09/logo-aml.png">
                                <?php if ( has_term( 'croisieres-lachance', 'catalog-company' ) ){ ?>
                                    <img src="http://portail.dev/wp-content/uploads/2016/09/logo-lachance.png">
                               <?php } ?>
                           </div>
                       </div>
                   </header><!-- .entry-header -->
                
                    <div class="entry-content startup-cpt-catalog">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                
                                <?php if ( $desc ) { ?>
                                    <div id="desc">
                                        <?php if ( $desc ) { ?>
                                            <?php echo $desc ?>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                
                                <img src="<?php echo $content_pic[0] ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <?php if ( $notes ) { ?>
                                    <div id="notes">
                                        <?php if ( $notes ) { ?>
                                                <small><?php echo esc_html( $notes ) ?></small>
                                        <?php } ?>
                                            <small><?php _e( 'Prices subject to change without notice.', 'startup-reloaded' ) ?></small>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <?php if ( $notes ) { ?>
                                    <div id="notes">
                                        <?php if ( $notes ) { ?>
                                                <small><?php echo esc_html( $notes ) ?></small>
                                        <?php } ?>
                                            <small><?php _e( 'Prices subject to change without notice.', 'startup-reloaded' ) ?></small>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </div>
	           <footer class="entry-footer">
                   <?php startup_reloaded_entry_footer(); ?>
	           </footer><!-- .entry-footer -->
            </article><!-- #post-## -->
        </div>

        <?php //the_post_navigation(); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<script>
    // Autoselect input text
    jQuery(document).ready(function() {
        jQuery("input:text").focus(function() { jQuery(this).select(); } );
    });
</script>
<?php get_footer(); ?>
