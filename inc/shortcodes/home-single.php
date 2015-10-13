<?php
$home_id=258;
$home_post = get_post( $home_id );
?>
<section id="home-<?= $home_id ?>">
<!--    <div class="container">-->
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="home-section">
                    <h3><?php echo $home_post->post_title ?></h3>
                    <p><?php echo $home_post->post_content ?></p>
                </div>
            </div>
        </div>
<!--    </div>-->
</section>
