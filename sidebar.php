<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package StartUp Reloaded
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="secondary-bg">
    <div id="secondary" class="container widget-area" role="complementary">
        <div class="row">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    </div><!-- #secondary -->
</div>
