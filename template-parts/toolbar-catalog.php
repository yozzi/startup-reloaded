<div id="toolbar">  
    <nav class="navbar navbar-default navbar-inverse navbar-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form class="navbar-form"> 
                        
                        <input type="text" class="form-control" name="fname" value="<?php echo get_permalink(); ?>">
                        
                        <div class="input-group tools">  
                            <a href="mailto:?subject=Croisi&egrave;res AML : <?php echo get_the_title(); ?>&body=<?php _e( 'Hi, here is the link for the page', 'startup-reloaded' ) ?> <?php echo get_the_title(); ?> : <?php echo get_permalink(); ?>" class="btn btn-default" target=_blank><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            
                            <?php if(function_exists('pf_show_link')){
                                pf_show_link(); ?>
                                <a href="#" rel="nofollow" onclick="window.print(); return false;" class="noslimstat btn btn-default"><i class="fa fa-file-text" aria-hidden="true"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>