<?php
$args=array( 'post_type'=>'services', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => -1 );
$services = get_posts( $args );
$total_services = count($services);
?>
<section id="services">
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">
            <?php foreach ($services as $key=> $service) {
                $service_icon    = get_post_meta($service->ID, '_startup_reloaded_services_icon', true );
            ?>
                <div class="col-xs-12 col-sm-4">
                       
          <div class="service">
                        <div class="pull-left">
              <i class="fa fa-<?php echo $service_icon; ?>"></i>
            </div>
                        <div class="media-body">
              <h3 class="media-heading"><?php echo $service->post_title ?></h3>
              <?php echo $service->post_content ?>            </div>
          </div> 
                </div>
            <?php } // endforeach ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
