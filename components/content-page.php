<article <?php hybrid_attr( 'post' ); ?>>

    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
    </div>

    <footer class="entry-footer">
        <?php wp_link_pages([
            'before' => '<nav class="page-nav"><p>' . __('Pages:', 'bempress'),
            'after' => '</p></nav>'
        ]); ?>
    </footer>

</article>
