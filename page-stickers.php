<?php
/**
* Template Name: Stickers */

get_header();

require get_template_directory() . '/inc/theme-options.php';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="entry-content">
                <?php if(!$boxed) { ?><div class="container"><?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $user = get_userdatabylogin($wp_query->query_vars['member']);   
                                $content = '[stickers user=' . $user->ID . ']';
                                $content = do_shortcode($content);
                                echo $content;
                            ?>
                        </div>
                    </div>
                <?php if(!$boxed) { ?></div><?php } ?>
            </div><!-- .entry-content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>