<?php
$order = of_get_option( 'testimonials-order' );
$number = of_get_option( 'testimonials-number' );
if ( $number ) { $max = $number; } else {$max = -1;};
$args=array( 'post_type'=>'testimonials', 'orderby' => $order,'order' => 'ASC', 'numberposts' => $max );
$testimonials = get_posts( $args );
$total_testimonials = count($testimonials);
?>
<section id="testimonials">
    <?php if (is_front_page()) { ?><div class="container"><?php } ?>
        <div class="row">            
            <?php if ($total_testimonials > 1){ ?>
                <div id="testimonials-carousel" class="carousel slide">
                    <ol class="carousel-indicators">
            <?php for($i=0 ; $i<$total_testimonials; $i++){ ?>
                <li data-target="#testimonials-carousel" data-slide-to="<?php echo $i ?>" class="<?php echo ($i==0)?'active':'' ?>"></li>
            <?php } ?>
        </ol>
                    <div class="carousel-inner">
                        <?php }  $count = 1;
foreach ($testimonials as $key=> $testimonial) { ?>
                            <div class="item<?php if ($count == 1){ echo ' active';} ?>">
                                <div class="col-xs-12">
                                    <blockquote class="testimonial">
                                        <?php echo $testimonial->post_content ?>
                                        <br />
                                        <small><?php echo $testimonial->post_title ?></small>
                                    </blockquote>
                                </div>        
                            </div>
                        <?php $count++;
                            }
                        if ($total_testimonials > 1){ ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php if (is_front_page()) { ?></div><?php } ?>
</section>
