<ul class="list-unstyled">
    <?php while ( have_posts() ) : the_post();
        $short  = get_post_meta( get_the_ID(), '_startup_cpt_menus_short', true );
        if ( $short ) {
            $myshort = ' - <em>' . $short . '</em>';
        } else {
            $myshort = "";
        }
        the_title( '<li><h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', $myshort . '</a></h4></li>' );
    endwhile; ?>
</ul>