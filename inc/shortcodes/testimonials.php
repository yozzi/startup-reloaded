<?php
$args=array( 'post_type'=>'testimonials', 'orderby' => 'menu_order','order' => 'ASC', 'numberposts' => 0 );
$testimonials = get_posts( $args );
$total_testimonials = count($testimonials);
?>
<section id="testimonials">
    <div class="container">
        <div class="row">            
            <?php if ($total_testimonials > 1){ ?>
                <div id="testimonials-carousel" class="carousel slide">
                    <div class="carousel-inner">
                        <?php }  foreach ($testimonials as $key=> $testimonial) { ?>
                            <div class="item<?php if ($count == 1){ echo ' active';} ?>">
                                <div class="col-xs-12">
                                    <div class="testimonial">
                                        <strong class="name"><?php echo $testimonial->post_title ?></strong>
                                        <p class="desc"><?php echo $testimonial->post_content ?></p>
                                    </div>
                                </div>        
                            </div>
                        <?php } if ($total_testimonials > 1){ ?>
                    </div>
                </div>
            <?php } ?>   
        </div>
    </div>
</section>
