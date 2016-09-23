<?php
    $tapu = crc32(get_the_ID());
    $tapu = sprintf("%u\n",$tapu);
    $tapu = substr($tapu, 0, 4);
?>
<div id="toolbar">  
    <nav class="navbar navbar-default navbar-inverse navbar-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form class="navbar-form"> 
                        <div class="input-group">
                            <span class="input-group-addon"><?php _e( 'With price', 'startup-reloaded' ) ?></span>
                            
                            <input type="text" class="form-control" name="fname" value="<?php echo get_permalink(); ?>?<?php echo $tapu ?>">
                            
                            <span class="input-group-btn">
                                <a href="<?php echo get_permalink(); ?>?<?php echo $tapu ?>" class="btn btn-default"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><?php _e( 'Without price', 'startup-reloaded' ) ?></span>
                            
                            <input type="text" class="form-control" name="fname" value="<?php echo get_permalink(); ?>">
                            
                            <span class="input-group-btn">
                                <a href="<?php echo get_permalink(); ?>" class="btn btn-default"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </span>
                        </div>
                        
                        <div class="input-group tools">
                            <a href="mailto:?subject=Croisi&egrave;res AML : <?php echo get_the_title(); ?>&body=<?php _e( 'Hi, here is the link for the page', 'startup-reloaded' ) ?> <?php echo get_the_title(); ?> : <?php echo get_permalink(); ?><?php if (array_key_exists($tapu,$_GET)) { echo '%3F' . $tapu; } ?>" class="btn btn-default" target=_blank><i class="fa fa-envelope" aria-hidden="true"></i></a>

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