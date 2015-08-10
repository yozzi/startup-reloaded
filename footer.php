<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package StartUp Reloaded
 */

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
</div>
</body>
</html>