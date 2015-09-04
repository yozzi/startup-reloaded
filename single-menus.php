<?php
/**
 * The template for displaying the menus.
 *
 * @package StartUp Reloaded
 */

get_header(); ?>

	<div id="primary" class="container content-area">
		<main id="main" class="row site-main" role="main">

		<?php while ( have_posts() ) : the_post();
            $main_pic  = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_reloaded_menus_main_pic_id', 1 ), 'large' );
            $thumbnail  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_thumbnail', true );                    
            $short  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_short', true );
            $type  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_type', true );                                
            $inclusions  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_inclusions', true );
            $miseenbouches  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_miseenbouche', true );
            $entrees  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_entree', true );
            $preludes  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_prelude', true );
            $plats  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_plat', true );
            $desserts  = get_post_meta( get_the_ID(), '_startup_reloaded_menus_dessert', true );
        ?>
            
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	           <header class="entry-header">
                   <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
                   <?php if ( $short ) { ?><h5><?php echo esc_html( $short ); ?></h5><?php } ?>
                   
                   <?php if ( $main_pic ) { echo $image ; } ?>
	           </header><!-- .entry-header -->

                <div class="entry-content"> 
                    <?php if ( $miseenbouches ) { ?>
                        <div id="miseenbouche" class="course">
                            <h3>Mise en bouche</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $miseenbouches as $key => $miseenbouche ) { ?>
                                <li><h4><?php echo esc_html( $miseenbouche['name'] ); if ( array_key_exists('extra', $miseenbouche) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( array_key_exists('desc', $miseenbouche) ) { ?><li><?php echo esc_html( $miseenbouche['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $entrees ) { ?>
                        <div id="entree" class="course">
                            <h3>Entr&eacute; en mati&egrave;re</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $entrees as $key => $entree ) { ?>
                                <li><h4><?php echo esc_html( $entree['name'] ); if ( array_key_exists('extra', $entree) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( array_key_exists('desc', $entree) ) { ?><li><?php echo esc_html( $entree['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                     <?php if ( $preludes ) { ?>
                        <div id="preludes" class="course">
                            <h3>Pr&eacute;lude</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $preludes as $key => $prelude ) { ?>
                               <li><h4><?php echo esc_html( $prelude['name'] ); if ( array_key_exists('extra', $prelude) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( array_key_exists('desc', $prelude) ) { ?><li><?php echo esc_html( $prelude['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $plats ) { ?>
                        <div id="plats" class="course">
                            <h3>Plat principal</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $plats as $key => $plat ) { ?>
                                <li><h4><?php echo esc_html( $plat['name'] ); if ( array_key_exists('extra', $plat) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( array_key_exists('desc', $plat) ) { ?><li><?php echo esc_html( $plat['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $desserts ) { ?>
                        <div id="desserts" class="course">
                            <h3>Dessert du capitaine</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $desserts as $key => $dessert ) { ?>
                                <li><h4><?php echo esc_html( $dessert['name'] ); if ( array_key_exists('extra', $dessert) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( array_key_exists('desc', $dessert) ) { ?><li><?php echo esc_html( $dessert['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
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
