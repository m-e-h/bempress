<?php while (have_posts()) : the_post(); ?>

    <article <?php hybrid_attr('post'); ?>>

        <div <?php hybrid_attr('entry-content'); ?>>
          <?php the_content(); ?>
        </div>

        <?php echo bempress_wysiwyg_output('bempress_extra_wysiwyg', get_the_ID()); ?>

        <footer <?php hybrid_attr('entry-footer'); ?>>
            <?php wp_link_pages([
                'before' => '<nav class="page-nav"><p>'.__('Pages:', 'bempress'),
                'after'  => '</p></nav>',
            ]); ?>
        </footer>

    </article>

<?php endwhile; ?>
