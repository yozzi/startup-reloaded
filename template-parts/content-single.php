<?php
/**
 * @package StartUp Reloaded
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php require get_template_directory() . '/inc/post-header.php';  ?>
    
    <div class="container">
        <div class="row">
            
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                
                <div class="entry-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php the_content(); ?>
                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startup-reloaded' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>
                    </div>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <div class="row">
                        <div class="col-lg-12">
                          <?php startup_reloaded_entry_footer(); ?>
                        </div>
                    </div>     
                </footer><!-- .entry-footer -->
                
            </div>
            
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-4">
                
                <!-- Blog Search -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Blog Search</h3>
                    </div>
                    <div class="panel-body">
                         <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="text" value="" name="s" id="s" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-custom" type="submit" id="searchsubmit">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                
                

                <!-- Blog Categories -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Blog Categories</h3>
                    </div>
                    <div class="panel-body">
                        <?php $args = array(
                                      'taxonomy'     => 'category',
                                      'orderby'      => 'name',
                                      'show_count'   => 0,
                                      'pad_counts'   => 0,
                                      'hierarchical' => 0,
                                      'title_li'     => ''
                                    );
                            ?>

                            <ul class="list-unstyled">
                                <?php wp_list_categories( $args ); ?>
                            </ul>
                    </div>
                </div>
 
                
                <!-- Blog Archives -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Blog Archives</h3>
                    </div>
                    <div class="panel-body">
                        <?php $args = array(
                                    'type'            => 'monthly',
                                    'limit'           => '',
                                    'format'          => 'html', 
                                    'before'          => '',
                                    'after'           => '',
                                    'show_post_count' => false,
                                    'echo'            => 1,
                                    'order'           => 'DESC'
                                );
                            ?>
                            <ul class="list-unstyled">
                                <?php wp_get_archives( $args ); ?>
                            </ul>
                        
                    </div>
                </div>


            </div>
            
        </div>
    </div>
    
</article><!-- #post-## -->