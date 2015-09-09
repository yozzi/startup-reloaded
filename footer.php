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
?>

	</div><!-- #content -->
    <div id="colophon-bg">
        <footer id="colophon" class="container site-footer" role="contentinfo">
            <div class="row site-info">
                <div class="col-xs-12">
                <?php echo $footer ; ?>
                </div>
            </div><!-- .site-info -->
        </footer><!-- #colophon -->
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if( $page_transition ) { ?>
        </div>
<?php } ?>

<?php if ( $back_to_top ) { ?>
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-angle-up"></i>
        </span>
    </div>
<?php } ?>

</body>
</html>