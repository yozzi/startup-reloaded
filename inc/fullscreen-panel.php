<div class="modal fade simple" id="fullscreen-panel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times fa-2x"></i></span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="modal-title text-center"><span class="sr-only">main navigation</span></h4>
            
                        <div class="modal-body text-center">
                            <?php wp_nav_menu(array( 'menu'=> 'fullscreen-panel', 'theme_location' => 'fullscreen-panel', 'depth' => 200, 'container' => false, 'menu_class' => '', 'fallback_cb' => 'wp_page_menu') ); ?>
                        </div>
                    </div>
               </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.fullscreen -->