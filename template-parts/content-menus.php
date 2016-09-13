<?php
//$args=array( 'post_type'=>'menus', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
//$menus = get_posts( $args );

if ( isset($atts) && $atts['id'] ) {
    // Si attribut id
    $menu = get_post( $atts['id'] );
    $title = get_the_title( $menu->ID );
    $main_pic  = wp_get_attachment_image( get_post_meta( $menu->ID, '_startup_cpt_menus_main_pic_id', 1 ), 'large' );
    $thumbnail  = get_post_meta( $menu->ID, '_startup_cpt_menus_thumbnail', true );                    
    $short  = get_post_meta( $menu->ID, '_startup_cpt_menus_short', true );
    $type  = get_post_meta( $menu->ID, '_startup_cpt_menus_type', true );
    $company = get_the_terms( $menu->ID, 'menu-company' );
    $inclusions  = get_post_meta( $menu->ID, '_startup_cpt_menus_inclusions', true );
    $miseenbouches  = get_post_meta( $menu->ID, '_startup_cpt_menus_miseenbouche', true );
    $entrees  = get_post_meta( $menu->ID, '_startup_cpt_menus_entree', true );
    $preludes  = get_post_meta( $menu->ID, '_startup_cpt_menus_prelude', true );
    $plats  = get_post_meta( $menu->ID, '_startup_cpt_menus_plat', true );
    $desserts  = get_post_meta( $menu->ID, '_startup_cpt_menus_dessert', true );
    $others  = get_post_meta( $menu->ID, '_startup_cpt_menus_others', true );
    $notes  = get_post_meta( $menu->ID, '_startup_cpt_menus_notes', true );
    $notes_portal  = get_post_meta( $menu->ID, '_startup_cpt_menus_notes_portal', true );
?>

<?php if ( $inclusions && in_array("cocktail", $inclusions) ) { ?>
    <div id="cocktail" class="course">
        <h3><?php _e( 'Welcome cocktail', 'salient' ) ?></h3>
    </div>
<?php } ?>

<?php if ( $inclusions && in_array("vin", $inclusions) ) { ?>
    <div id="vin" class="course">
        <h3><?php _e( '&frac12; bottle of wine', 'salient' ) ?></h3>
    </div>
<?php } ?>

<?php if ( !empty($miseenbouches[0]) ) { ?>
    <div id="miseenbouche" class="course">
        <h3><?php _e( 'Mise en bouche', 'salient' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $miseenbouches as $key => $miseenbouche ) { ?>
                <li>
                    <h4><?php echo esc_html( $miseenbouche['name'] ); if ( isset ($miseenbouche['extra']) && $miseenbouche['extra'] ) { ?> <small><?php _e( '+extra', 'salient' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($miseenbouche['desc']) && $miseenbouche['desc'] ) { ?><small><?php echo esc_html( $miseenbouche['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( !empty($entrees[0]) ) { ?>
    <div id="entree" class="course">
        <h3><?php _e( 'Appetizer', 'salient' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $entrees as $key => $entree ) { ?>
                <li>
                    <h4><?php echo esc_html( $entree['name'] ); if ( isset ($entree['extra']) && $entree['extra'] ) { ?> <small><?php _e( '+extra', 'salient' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($entree['desc']) && $entree['desc'] ) { ?><small><?php echo esc_html( $entree['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

 <?php if ( !empty($preludes[0]) ) { ?>
    <div id="preludes" class="course">
        <h3><?php _e( 'Prelude', 'salient' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $preludes as $key => $prelude ) { ?>
               <li>
                   <h4><?php echo esc_html( $prelude['name'] ); if ( isset ($prelude['extra']) && $prelude['extra'] ) { ?> <small><?php _e( '+extra', 'salient' ) ?></small><?php } ?></h4>
                   <?php if ( isset ($prelude['desc']) && $prelude['desc'] ) { ?><small><?php echo esc_html( $prelude['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( !empty($plats[0]) ) { ?>
    <div id="plats" class="course">
        <h3><?php _e( 'Main course', 'salient' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $plats as $key => $plat ) { ?>
                <li>
                    <h4><?php echo esc_html( $plat['name'] ); if ( isset ($plat['extra']) && $plat['extra'] ) { ?> <small><?php _e( '+extra', 'salient' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($plat['desc']) && $plat['desc'] ) { ?><small><?php echo esc_html( $plat['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( $inclusions && in_array("cheese", $inclusions) ) { ?>
    <div id="fromage" class="course">
        <h3><?php _e( 'Plate of fine cheese of Quebec', 'salient' ) ?></h3>
    </div>
<?php } ?>

<?php if ( !empty($desserts[0]) ) { ?>
    <div id="desserts" class="course">
        <h3><?php _e( 'Captain\'s dessert', 'salient' ) ?></h3>
        <ul class="list-unstyled">
            <?php foreach ( (array) $desserts as $key => $dessert ) { ?>
                <li>
                    <h4><?php echo esc_html( $dessert['name'] ); if ( isset ($dessert['extra']) && $dessert['extra'] ) { ?> <small><?php _e( '+extra', 'salient' ) ?></small><?php } ?></h4>
                    <?php if ( isset ($dessert['desc']) && $dessert['desc'] ) { ?><small><?php echo esc_html( $dessert['desc'] ); ?></small><?php } ?>
                </li>
            <?php } ?>     
        </ul>
    </div>
<?php } ?>

<?php if ( $others ) { ?>
    <div id="others" class="course bly">
        <?php echo do_shortcode($others) ?>
    </div>
<?php } ?>

<?php if ( $inclusions && in_array("digest", $inclusions) ) { ?>
    <div id="digestif" class="course">
        <h3><?php _e( 'Digestive', 'salient' ) ?></h3>
    </div>
<?php } ?>

<?php if ( $inclusions && in_array("coffee", $inclusions) ) { ?>
    <div id="cafe" class="course">
        <h3><?php _e( 'Coffee, tea, herbal tea', 'salient' ) ?></h3>
    </div>
<?php } ?>

<?php } else {
    // Si pas d'attribut id
    $args=array( 'post_type'=>'menus', 'orderby' => 'title','order' => 'ASC', 'numberposts' => -1 );
    $menus = get_posts( $args );
    ?>

    <ul class="list-unstyled">

        <?php foreach ( $menus as $key=> $menu ) {
            $title = get_the_title( $menu->ID );
            $url = esc_url( get_permalink( $menu->ID ) );
            $short  = get_post_meta( $menu->ID, '_startup_cpt_menus_short', true );
            if ( $short ) {
                $myshort = ' - <em>' . $short . '</em>';
            } else {
                $myshort = "";
            }
            ?>

            <li><h4><a href="<?php echo $url ?>" rel="bookmark"><?php echo $title . $myshort ?></a></h4></li>

        <?php } ?>
    </ul>
<?php } ?>