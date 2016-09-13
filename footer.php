<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package StartUp Reloaded
 */

require get_template_directory() . '/inc/theme-options.php';

?>

	</div><?php //#content ?>
    <div id="colophon-bg">
        <footer id="colophon" class="container site-footer" role="contentinfo">
            <?php if ( has_nav_menu( 'navbar-bottom' ) ) { ?>
                <div class="row">
                    <div class="col-xs-12">
                        <?php get_template_part( 'template-parts/navbar', 'bottom' ) ?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="row site-info">
                <div class="col-xs-12">
                <?php echo $footer ?>
                <?php if ( current_user_can( 'manage_options' ) ) { echo '<span class="label label-default pull-right">' . startup_reloaded_get_current_template() . '</span>'; } ?>
                </div>
            </div><?php //.site-info ?>
        </footer><?php //#colophon ?>
    </div>
</div><?php //#page ?>

<?php if( $fullscreen_panel_on ){ get_template_part( 'template-parts/panel', 'fullscreen' ); } ?>

<?php wp_footer(); ?>

<?php get_template_part( 'template-parts/scripts', 'footer' ) ?>

<?php if ( $back_to_top ) { ?>
    <div class="scroll-top-wrapper">
        <span class="scroll-top-inner">
            <i class="fa fa-chevron-up fa-lg"></i>
        </span>
    </div>
<?php } ?>
        </div>
<?php if( $left_panel_on || $right_panel_on ){ ?>
    </div>
<?php } ?>
</body>
</html>