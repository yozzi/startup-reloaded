<?php
/**
* Template Name: Menu pour site */

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Croisi&egrave;res AML - Menu</title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/printfriendly.css">
    <style>
        #printfriendly{
            margin: 30px;
            box-shadow: 0 0 30px #ccc;
        }
        
        #printfriendly .startup-cpt-menus.entry-content {
            padding: 24px;
        }
        
        #printfriendly .startup-cpt-menus.entry-content #triangle{
            margin-top: -24px;
        }
        
        #printfriendly .startup-cpt-menus.entry-content #others ul li {
            margin-bottom: 20px;
            color: #555;
        }
        
        #printfriendly .startup-cpt-menus.entry-content #others ul li em {
            margin-top: -20px;
        }
    </style>
</head>
    
<body>

<?php if ( array_key_exists("id",$_GET) ) {
    $menu_id = $_GET["id"];
    $args=array( 'post_type'=>'menus', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
    $menus = get_posts( $args );
    $menu = get_post( $menu_id );
    $title = get_the_title( $menu->ID );     
    $short  = get_post_meta( $menu->ID, '_startup_cpt_menus_short', true );
    $seasons  = get_the_terms( $menu->ID, 'menu-season' );
    $inclusions  = get_post_meta( $menu->ID, '_startup_cpt_menus_inclusions', true );
    $miseenbouches  = get_post_meta( $menu->ID, '_startup_cpt_menus_miseenbouche', true );
    $entrees  = get_post_meta( $menu->ID, '_startup_cpt_menus_entree', true );
    $preludes  = get_post_meta( $menu->ID, '_startup_cpt_menus_prelude', true );
    $plats  = get_post_meta( $menu->ID, '_startup_cpt_menus_plat', true );
    $desserts  = get_post_meta( $menu->ID, '_startup_cpt_menus_dessert', true );
    $others  = get_post_meta( $menu->ID, '_startup_cpt_menus_others', true );
    $notes  = get_post_meta( $menu->ID, '_startup_cpt_menus_notes', true );
    $notes_site  = get_post_meta( $menu->ID, '_startup_cpt_menus_notes_site', true );
    ?>
<div id="printfriendly">
   <header class="entry-header startup-cpt-menus">
       <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1 class="entry-title"><?php echo $title ?></h1>
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


        <?php if ( $notes || $notes_site ) { ?>

            <div id="notes">

                <?php if ( $notes ) { ?>
                    <div id="notes-both">
                        <small><?php echo esc_html( $notes ) ?></small>
                    </div>
                <?php } ?>

                <?php if ( $notes_site ) { ?>
                    <div id="notes-site">
                        <small><?php echo esc_html( $notes_site ) ?></small>
                    </div>
                <?php } ?>


            </div>

        <?php } ?>    
    </div><!-- .entry-content -->

</div>

<?php } else { // Si pas d'attribut id ?>
   <?php _e( 'You must set the menu ID in url using ?id=', 'startup-reloaded' ) ?>
<?php } ?>
</body>
    
</html>