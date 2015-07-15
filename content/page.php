<?php while (have_posts()) : the_post(); ?>

    <article <?php hybrid_attr('post'); ?>>

        <div <?php hybrid_attr('entry-content'); ?>>
          <?php the_content(); ?>
        </div>

        <footer <?php hybrid_attr('entry-footer'); ?>>
            <?php wp_link_pages(array(
                'before' => '<nav class="page-nav"><p>'.__('Pages:', 'bempress'),
                'after'  => '</p></nav>',
            )); ?>
        </footer>

        <?php the_field('bem_shortcake'); ?>

    </article>

<?php endwhile; ?>
