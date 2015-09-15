<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package StartUp Reloaded
 */

$page_transition = of_get_option( 'page-transition' );
$back_to_top = of_get_option( 'general-back-to-top' );
$footer = of_get_option( 'general-footer' );
$portfolio_style = of_get_option( 'portfolio-style' );
$left_panel_on = of_get_option( 'left-panel-on' );
$right_panel_on = of_get_option( 'right-panel-on' );
?>

	</div><!-- #content -->
    <div id="colophon-bg">
        <footer id="colophon" class="container site-footer" role="contentinfo">
            <div class="row site-info">
                <div class="col-xs-12">
                <?= $footer ?>
                </div>
            </div><!-- .site-info -->
        </footer><!-- #colophon -->
    </div>
</div><!-- #page -->


 <!-- FULLSCREEN MODAL CODE (.fullscreen) -->
<div class="modal fade fullscreen" id="menuModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="color:#fff;">
            <div class="modal-header" style="border:0;">
                <button type="button" class="close btn btn-link" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close fa-lg" style="color:#999;"></i></button> 
                <h4 class="modal-title text-center"><span class="sr-only">main navigation</span></h4>
            </div>
            <div class="modal-body text-center">
                <ul style="list-style-type:none;">
                    <li><a href="#" class="big">Hello</a></li>
                    <li><a href="#" class="big">A Menu Item</a></li>
                    <li><a href="#" class="big">Another Item</a></li>
                    <li><a href="#" class="big">This One Too!!</a></li>
                    <li><a href="http://meagency.com" class="big">me.agency</a></li>
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.fullscreen -->

<?php wp_footer(); ?>

<?php  if( $portfolio_style == 'shuffle' || is_plugin_active('startup-cpt-products/startup-cpt-products.php')){ ?>
    <script type="text/javascript">
       //On utilise imagesloaded pour que Shuffle ne fasse pas de bug d'overlapping avec les tailles d'images responsives

        jQuery('#shuffle').imagesLoaded( function() {
          // images have loaded

            /* initialize shuffle plugin */
            var $grid = jQuery('#shuffle');

            $grid.shuffle({
                itemSelector: '.item' // the selector for the items in the grid
            });

            jQuery('#filter a').click(function (e) {
            e.preventDefault();

            // set active class
            jQuery('#filter a').removeClass('active');
            jQuery(this).addClass('active');

            // get group name from clicked item
            var groupName = jQuery(this).attr('data-group');

            // reshuffle grid
            $grid.shuffle('shuffle', groupName );
        });

        });
    </script>
<?php } ?>

<?php if ( $back_to_top ) { ?>
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-angle-up"></i>
        </span>
    </div>
<?php } ?>
<?php if( $page_transition ) { ?>
        </div>
<?php } ?>
<?php if( $left_panel_on || $right_panel_on ) { ?></div><?php } ?>
</body>
</html>