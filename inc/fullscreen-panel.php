<div class="modal fade fullscreen" id="fullscreen-panel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="color:#fff;">
            <div class="modal-header" style="border:0;">
                <button type="button" class="close btn btn-link" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close fa-lg" style="color:#999;"></i></button> 
                <h4 class="modal-title text-center"><span class="sr-only">main navigation</span></h4>
            </div>
            <div class="modal-body text-center">
                <?php wp_nav_menu(array( 'menu'=> 'fullscreen-panel', 'theme_location' => 'fullscreen-panel', 'depth' => 200, 'container' => false, 'menu_class' => '', 'fallback_cb' => 'wp_page_menu') ); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.fullscreen -->