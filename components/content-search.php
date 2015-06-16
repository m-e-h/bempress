<article <?php hybrid_attr( 'post' ); ?>>

    <header class="entry-header">
        <h2 <?php hybrid_attr( 'entry-title' ); ?>>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <?php if (get_post_type() === 'post') {
        get_template_part('templates/entry-meta'); } ?>
    </header>

    <div <?php hybrid_attr( 'entry-summary' ); ?>>
    <?php the_excerpt(); ?>
    </div>

</article>
