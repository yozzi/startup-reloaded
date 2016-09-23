<?php
/**
 * The template for displaying the menus.
 *
 * @package StartUp Reloaded
 */

get_header(); ?>




 <?php if ( current_user_can('read_private_pages') ) { get_template_part( 'template-parts/toolbar', 'menus' ); } ?>



	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php while ( have_posts() ) : the_post();
            $default_pic_url = startup_cpt_menus_get_option( 'startup_cpt_menus_default_pic' );
            if ( $default_pic_url ) {
                $default_pic_id = wp_get_image_id($default_pic_url);
                $default_pic  = wp_get_attachment_image_src($default_pic_id, 'col-3-square');
            }
            $main_pic  = wp_get_attachment_image_src( get_post_meta( get_the_ID(), '_startup_cpt_menus_main_pic_id', 1 ), 'col-3-square' );
            $thumbnail  = get_post_meta( get_the_ID(), '_startup_cpt_menus_thumbnail', true );                    
            $short  = get_post_meta( get_the_ID(), '_startup_cpt_menus_short', true );
            $seasons  = get_the_terms( get_the_ID(), 'menu-season' );
            $inclusions  = get_post_meta( get_the_ID(), '_startup_cpt_menus_inclusions', true );
            $miseenbouches  = get_post_meta( get_the_ID(), '_startup_cpt_menus_miseenbouche', true );
            $entrees  = get_post_meta( get_the_ID(), '_startup_cpt_menus_entree', true );
            $preludes  = get_post_meta( get_the_ID(), '_startup_cpt_menus_prelude', true );
            $plats  = get_post_meta( get_the_ID(), '_startup_cpt_menus_plat', true );
            $desserts  = get_post_meta( get_the_ID(), '_startup_cpt_menus_dessert', true );
            $others  = get_post_meta( get_the_ID(), '_startup_cpt_menus_others', true );
            $notes  = get_post_meta( get_the_ID(), '_startup_cpt_menus_notes', true );
            $notes_portal  = get_post_meta( get_the_ID(), '_startup_cpt_menus_notes_portal', true );
            $price  = get_post_meta( get_the_ID(), '_startup_cpt_menus_price', true );
            
            $tapu = crc32(get_the_ID());
            $tapu = sprintf("%u\n",$tapu);
            $tapu = substr($tapu, 0, 4);
            if (array_key_exists($tapu,$_GET)) { $showprice = TRUE; }
            
            if ( $main_pic ) {
                $photo = $main_pic[0];
            } elseif ( $default_pic_url ){
                $photo = $default_pic[0];
            }
 
        ?>
            
            
            
       
            
            
            
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="pf-content">
                   <header class="entry-header startup-cpt-menus">
                       <div class="row">
                            <div class="col-sm-4 hidden-xs">
                                <?php if ( $photo ) { ?>
                                    <img src="<?php echo $photo ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                                <?php } ?>

                            </div>
                            <div class="col-xs-12 col-sm-8">
                               <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                <div id="pf-entry-title"><?php the_title() ?></div>
                                <?php if ( $short ) { ?><h2><em><?php echo esc_html( $short ); ?></em></h2><?php } ?>

                               <?php if ( $seasons && ! is_wp_error( $seasons ) ) : 

                                    $season_names = array();

                                    foreach ( $seasons as $season ) {
                                        $season_names[] = $season->name;
                                    }

                                    $all_seasons = join( ", ", $season_names );
                                ?>

                                <?php
                                    echo '<hr>';
                                    echo __( 'Season', 'startup-reloaded' ) . ' ' . $all_seasons;
                                ?>

                               <?php endif; ?>
                                
                           </div>
                           <div id="pf-entry-logos">
                               <img src="http://portail.dev/wp-content/uploads/2016/09/logo-aml.png">
                                <?php if ( has_term( 'croisieres-lachance', 'menu-company' ) ){ ?>
                                    <img src="http://portail.dev/wp-content/uploads/2016/09/logo-lachance.png">
                               <?php } ?>
                           </div>
                       </div>
                   </header><!-- .entry-header -->
                

            
                    <div class="entry-content startup-cpt-menus">
                        <div id="triangle"></div>

                        <?php if ( $inclusions && in_array("cocktail", $inclusions) ) { ?>
                            <div id="cocktail" class="inclusion">
                                <h3><?php _e( 'Welcome cocktail', 'startup-reloaded' ) ?></h3>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( $inclusions && in_array("vin", $inclusions) ) { ?>
                            <div id="wine" class="inclusion">
                                <h3><?php _e( '&frac12; bottle of wine', 'startup-reloaded' ) ?></h3>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( !empty($miseenbouches[0]) ) { ?>
                            <div id="miseenbouche" class="course">
                                <h3><?php _e( 'Mise en bouche', 'startup-reloaded' ) ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ( (array) $miseenbouches as $key => $miseenbouche ) { ?>
                                        <li>
                                            <?php echo esc_html( $miseenbouche['name'] ); if ( isset ($miseenbouche['extra']) ) { echo ' <small>+' . __( 'extra', 'startup-reloaded' ) . '</small>'; } ?>
                                            <?php if ( array_key_exists('desc', $miseenbouche) && $miseenbouche['desc'] ) { ?><br /><em><?php echo esc_html( $miseenbouche['desc'] ); ?></em><?php } ?>
                                        </li>
                                    <?php } ?> 
                                </ul>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( !empty($entrees[0]) ) { ?>
                            <div id="appetizer" class="course">
                                <h3><?php _e( 'Appetizer', 'startup-reloaded' ) ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ( (array) $entrees as $key => $entree ) { ?>
                                        <li>
                                            <?php echo esc_html( $entree['name'] ); if ( isset ($entree['extra']) ) { echo ' <small>+' . __( 'extra', 'startup-reloaded' ) . '</small>'; } ?>
                                            <?php if ( array_key_exists('desc', $entrees) && $entrees['desc'] ) { ?><br /><em><?php echo esc_html( $entrees['desc'] ); ?></em><?php } ?>
                                        </li>
                                    <?php } ?>     
                                </ul>
                            </div>
                            <hr />
                        <?php } ?>

                         <?php if ( !empty($preludes[0]) ) { ?>
                            <div id="prelude" class="course">
                                <h3><?php _e( 'Prelude', 'startup-reloaded' ) ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ( (array) $preludes as $key => $prelude ) { ?>
                                        <li>
                                           <?php echo esc_html( $prelude['name'] ); if ( isset ($prelude['extra']) ) { echo ' <small>+' . __( 'extra', 'startup-reloaded' ) . '</small>'; } ?>
                                           <?php if ( array_key_exists('desc', $prelude) && $prelude['desc'] ) { ?><br /><em><?php echo esc_html( $prelude['desc'] ); ?></em><?php } ?>
                                        </li>
                                    <?php } ?>     
                                </ul>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( !empty($plats[0]) ) { ?>
                            <div id="main" class="course">
                                <h3><?php _e( 'Main course', 'startup-reloaded' ) ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ( (array) $plats as $key => $plat ) { ?>
                                        <li>
                                            <?php echo esc_html( $plat['name'] ); if ( isset ($plat['extra']) ) { echo ' <small>+' . __( 'extra', 'startup-reloaded' ) . '</small>'; } ?>
                                            <?php if ( array_key_exists('desc', $plat) && $plat['desc'] ) { ?><br /><em><?php echo esc_html( $plat['desc'] ); ?></em><?php } ?>
                                        </li>
                                    <?php } ?>     
                                </ul>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( $inclusions && in_array("cheese", $inclusions) ) { ?>
                            <div id="cheese" class="inclusion">
                                <h3><?php _e( 'Plate of fine cheese of Quebec', 'startup-reloaded' ) ?></h3>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( !empty($desserts[0]) ) { ?>
                            <div id="dessert" class="course">
                                <h3><?php _e( 'Captain\'s dessert', 'startup-reloaded' ) ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ( (array) $desserts as $key => $dessert ) { ?>
                                        <li>
                                            <?php echo esc_html( $dessert['name'] ); if ( isset ($dessert['extra']) ) { echo ' <small>+' . __( 'extra', 'startup-reloaded' ) . '</small>'; } ?>
                                            <?php if ( array_key_exists('desc', $dessert) && $dessert['desc'] ) { ?><br /><em><?php echo esc_html( $dessert['desc'] ); ?></em><?php } ?>
                                        </li>       
                                    <?php } ?>     
                                </ul>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( $others ) { ?>
                            <div id="others" class="course">
                                <?php echo apply_filters ( 'the_title', $others ) ?>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( $inclusions && in_array("digest", $inclusions) ) { ?>
                            <div id="digestive" class="inclusion">
                                <h3><?php _e( 'Digestive', 'startup-reloaded' ) ?></h3>
                            </div>
                            <hr />
                        <?php } ?>

                        <?php if ( $inclusions && in_array("coffee", $inclusions) ) { ?>
                            <div id="coffee" class="inclusion">
                                <h3><?php _e( 'Coffee, tea, herbal tea', 'startup-reloaded' ) ?></h3>
                            </div>
                            <hr />
                        <?php } ?>


                        <?php if (isset($showprice)) { ?>


                            <?php if ( $price ) { ?>
                                    <div id="price">
                                        <h1><span class="label label-default"><?php echo esc_html( $price ) ?> $</span></h1>
                                    </div>
                            <?php } ?>

                        <?php } ?> 

                        <?php if ( $notes || $notes_portal ) { ?>

                            <div id="notes">

                                <?php if ( $notes ) { ?>
                                    <div id="notes-both">
                                        <small><?php echo esc_html( $notes ) ?></small>
                                    </div>
                                <?php } ?>

                                <?php if ( $notes_portal ) { ?>
                                    <div id="notes-portal">
                                        <small><?php echo esc_html( $notes_portal ) ?></small>
                                    </div>
                                <?php } ?>
                                
                                <div id="notes-legal">
                                    <small><?php _e( 'Prices subject to change without notice.', 'startup-reloaded' ) ?></small>
                                </div>

                            </div>

                        <?php } ?>    
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
