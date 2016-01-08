<?php
$args=array( 'post_type'=>'menus', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$menus = get_posts( $args );

if ( $atts['id'] ) {
    // Si attribut id
        $menu = get_post( $atts['id'] );
        $title = get_the_title( $menu->ID );
        $main_pic  = wp_get_attachment_image( get_post_meta( $menu->ID, '_startup_cpt_menus_main_pic_id', 1 ), 'large' );
        $thumbnail  = get_post_meta( $menu->ID, '_startup_cpt_menus_thumbnail', true );                    
        $short  = get_post_meta( $menu->ID, '_startup_cpt_menus_short', true );
        $type  = get_post_meta( $menu->ID, '_startup_cpt_menus_type', true );                                
        $inclusions  = get_post_meta( $menu->ID, '_startup_cpt_menus_inclusions', true );
        $miseenbouches  = get_post_meta( $menu->ID, '_startup_cpt_menus_miseenbouche', true );
        $entrees  = get_post_meta( $menu->ID, '_startup_cpt_menus_entree', true );
        $preludes  = get_post_meta( $menu->ID, '_startup_cpt_menus_prelude', true );
        $plats  = get_post_meta( $menu->ID, '_startup_cpt_menus_plat', true );
        $desserts  = get_post_meta( $menu->ID, '_startup_cpt_menus_dessert', true );
        $notes  = get_post_meta( $menu->ID, '_startup_cpt_menus_notes', true );
    ?>
           


<h1><?php echo $title ?></h1>

<?php if ( $short ) { ?><h2><?php echo esc_html( $short ); ?></h2><?php } ?>

<?php if ( $main_pic ) { echo $main_pic ; } ?>


<?php if ( isset ($inclusions[0]) ) { ?>
    <div id="cocktail" class="course">
        <h3><?php _e( 'Welcome cocktail', 'startup-reloaded' ) ?></h3>
    </div>
<?php } ?>

<?php if ( isset ($inclusions[1]) ) { ?>
    <div id="vin" class="course">
        <h3><?php _e( '&frac12; bottle of wine', 'startup-reloaded' ) ?></h3>
    </div>
<?php } ?>

<?php if ( $miseenbouches ) { ?>
    <div id="miseenbouche" class="course">
        <h3><?php _e( 'Mise en bouche', 'startup-reloaded' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $miseenbouches as $key => $miseenbouche ) { ?>
                <li>
                    <h4><?php echo esc_html( $miseenbouche['name'] ); if ( isset ($miseenbouche['extra']) && $miseenbouche['extra'] ) { ?> <small><?php _e( '+extra', 'startup-reloaded' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($miseenbouche['desc']) && $miseenbouche['desc'] ) { ?><small><?php echo esc_html( $miseenbouche['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( $entrees ) { ?>
    <div id="entree" class="course">
        <h3><?php _e( 'Appetizer', 'startup-reloaded' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $entrees as $key => $entree ) { ?>
                <li>
                    <h4><?php echo esc_html( $entree['name'] ); if ( isset ($entree['extra']) && $entree['extra'] ) { ?> <small><?php _e( '+extra', 'startup-reloaded' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($entree['desc']) && $entree['desc'] ) { ?><small><?php echo esc_html( $entree['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

 <?php if ( $preludes ) { ?>
    <div id="preludes" class="course">
        <h3><?php _e( 'Prelude', 'startup-reloaded' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $preludes as $key => $prelude ) { ?>
               <li>
                   <h4><?php echo esc_html( $prelude['name'] ); if ( isset ($prelude['extra']) && $prelude['extra'] ) { ?> <small><?php _e( '+extra', 'startup-reloaded' ) ?></small><?php } ?></h4>
                   <?php if ( isset ($prelude['desc']) && $prelude['desc'] ) { ?><small><?php echo esc_html( $prelude['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( $plats ) { ?>
    <div id="plats" class="course">
        <h3><?php _e( 'Main course', 'startup-reloaded' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $plats as $key => $plat ) { ?>
                <li>
                    <h4><?php echo esc_html( $plat['name'] ); if ( isset ($plat['extra']) && $plat['extra'] ) { ?> <small><?php _e( '+extra', 'startup-reloaded' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($plat['desc']) && $plat['desc'] ) { ?><small><?php echo esc_html( $plat['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( isset ($inclusions[2]) ) { ?>
    <div id="fromage" class="course">
        <h3><?php _e( 'Plate of fine cheese of Quebec', 'startup-reloaded' ) ?></h3>
    </div>
<?php } ?>

<?php if ( $desserts ) { ?>
    <div id="desserts" class="course">
        <h3><?php _e( 'Captain\'s dessert', 'startup-reloaded' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $desserts as $key => $dessert ) { ?>
                <li>
                    <h4><?php echo esc_html( $dessert['name'] ); if ( isset ($dessert['extra']) && $dessert['extra'] ) { ?> <small><?php _e( '+extra', 'startup-reloaded' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($dessert['desc']) && $dessert['desc'] ) { ?><small><?php echo esc_html( $dessert['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( isset ($inclusions[3]) ) { ?>
    <div id="digestif" class="course">
        <h3><?php _e( 'Digestive', 'startup-reloaded' ) ?></h3>
    </div>
<?php } ?>

<?php if ( isset ($inclusions[4]) ) { ?>
    <div id="cafe" class="course">
        <h3><?php _e( 'Coffee, tea, herbal tea', 'startup-reloaded' ) ?></h3>
    </div>
<?php } ?>

<?php if ( $notes ) { ?>
    <div id="notes">
        <small><?php echo esc_html( $notes ) ?></small>
    </div>
<?php } ?>




    <?php } else {
    // Si pas d'attribut id ?>
            Vous devez renseigner le ID du menu
<?php } ?>