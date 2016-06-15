<?php
/**
* Template Name: Stickers */

get_header();

require get_template_directory() . '/inc/theme-options.php';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="entry-content">
                <div class="container">
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
                </div>
            </div><!-- .entry-content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>