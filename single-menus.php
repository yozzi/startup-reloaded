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
            $main_pic  = wp_get_attachment_image( get_post_meta( get_the_ID(), '_startup_cpt_menus_main_pic_id', 1 ), 'large' );
            $thumbnail  = get_post_meta( get_the_ID(), '_startup_cpt_menus_thumbnail', true );                    
            $short  = get_post_meta( get_the_ID(), '_startup_cpt_menus_short', true );
            $type  = get_post_meta( get_the_ID(), '_startup_cpt_menus_type', true );                                
            $inclusions  = get_post_meta( get_the_ID(), '_startup_cpt_menus_inclusions', true );
            $miseenbouches  = get_post_meta( get_the_ID(), '_startup_cpt_menus_miseenbouche', true );
            $entrees  = get_post_meta( get_the_ID(), '_startup_cpt_menus_entree', true );
            $preludes  = get_post_meta( get_the_ID(), '_startup_cpt_menus_prelude', true );
            $plats  = get_post_meta( get_the_ID(), '_startup_cpt_menus_plat', true );
            $desserts  = get_post_meta( get_the_ID(), '_startup_cpt_menus_dessert', true );
            $notes  = get_post_meta( get_the_ID(), '_startup_cpt_menus_notes', true );
        ?>
            
        <div class="col-lg-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	           <header class="entry-header">
                   <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                   <?php if ( $short ) { ?><h2><?php echo esc_html( $short ); ?></h2><?php } ?>
                   
                   <?php if ( $main_pic ) { echo $main_pic ; } ?>
	           </header><!-- .entry-header -->
                
                <div class="entry-content">
                    
                    <?php if ( isset ($inclusions[0]) ) { ?>
                        <div id="cocktail" class="course">
                            <h3>Cocktail de bienvenue</h3>
                        </div>
                    <?php } ?>
                    
                    <?php if ( isset ($inclusions[1]) ) { ?>
                        <div id="vin" class="course">
                            <h3>&frac12; bouteille de vin</h3>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $miseenbouches ) { ?>
                        <div id="miseenbouche" class="course">
                            <h3>Mise en bouche</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $miseenbouches as $key => $miseenbouche ) { ?>
                                <li><h4><?php echo esc_html( $miseenbouche['name'] ); if ( isset ($miseenbouche['extra']) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( isset ($miseenbouche['desc']) ) { ?><li><?php echo esc_html( $miseenbouche['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $entrees ) { ?>
                        <div id="entree" class="course">
                            <h3>Entr&eacute;e en mati&egrave;re</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $entrees as $key => $entree ) { ?>
                                <li><h4><?php echo esc_html( $entree['name'] ); if ( isset ($entree['extra']) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( isset ($entree['desc']) ) { ?><li><?php echo esc_html( $entree['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                     <?php if ( $preludes ) { ?>
                        <div id="preludes" class="course">
                            <h3>Pr&eacute;lude</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $preludes as $key => $prelude ) { ?>
                               <li><h4><?php echo esc_html( $prelude['name'] ); if ( isset ($prelude['extra']) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( isset ($prelude['desc']) ) { ?><li><?php echo esc_html( $prelude['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $plats ) { ?>
                        <div id="plats" class="course">
                            <h3>Plat principal</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $plats as $key => $plat ) { ?>
                                <li><h4><?php echo esc_html( $plat['name'] ); if ( isset ($plat['extra']) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( isset ($plat['desc']) ) { ?><li><?php echo esc_html( $plat['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( isset ($inclusions[2]) ) { ?>
                        <div id="fromage" class="course">
                            <h3>Assiette de fromages fins du Qu&eacute;bec</h3>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $desserts ) { ?>
                        <div id="desserts" class="course">
                            <h3>Dessert du capitaine</h3>
                            <ul class="list-unstyled">
                                <?php foreach ( (array) $desserts as $key => $dessert ) { ?>
                                <li><h4><?php echo esc_html( $dessert['name'] ); if ( isset ($dessert['extra']) ) { echo ' <small>+extra</small>'; } ?></h4></li>
                                    <?php if ( isset ($dessert['desc']) ) { ?><li><?php echo esc_html( $dessert['desc'] ); ?></li><?php } ?>
                                <?php } ?>     
                            </ul>
                        </div>
                    <?php } ?>
                    
                    <?php if ( isset ($inclusions[3]) ) { ?>
                        <div id="digestif" class="course">
                            <h3>Digestif</h3>
                        </div>
                    <?php } ?>
                    
                    <?php if ( isset ($inclusions[4]) ) { ?>
                        <div id="cafe" class="course">
                            <h3>Caf&eacute;, th&eacute; ou infusion</h3>
                        </div>
                    <?php } ?>
                    
                    <?php if ( $notes ) { ?>
                        <div id="notes">
                            <small><?php echo esc_html( $notes ) ?></small>
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
