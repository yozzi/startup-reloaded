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
                
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    
                    <form class="form-horizontal" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                        <div class="form-group">
                            <div class="col-xs-9">
                                <input class="form-control" type="text" value="" name="s" id="s" />
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-custom btn-block" type="submit" id="searchsubmit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>   
                    </form>
                    <!-- /.input-group -->
                </div>
                
                

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
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
                    <!-- /.row -->
                </div>
                
                 <!-- Blog Archives Well -->
                <div class="well">
                    <h4>Blog Archives</h4>
                    <div class="row">
                        <div class="col-lg-12">
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
                    <!-- /.row -->
                </div>


            </div>
            
        </div>
    </div>
    
</article><!-- #post-## -->