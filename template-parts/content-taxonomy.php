<ul class="list-unstyled">
    <?php while ( have_posts() ) : the_post(); 
        the_title( '<li><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></li>' );
    endwhile; ?>
</ul>