<?php while (have_posts()) : the_post(); ?>

    <?php tha_entry_before(); ?>

    <article <?php hybrid_attr('post'); ?>>

        <?php tha_entry_top(); ?>

        <div <?php hybrid_attr('entry-content'); ?>>
            <?php tha_entry_content_before(); ?>
            <?php the_content(); ?>
            <?php tha_entry_content_after(); ?>
        </div>

        <footer <?php hybrid_attr('entry-footer'); ?>>
            <?php wp_link_pages(array(
                'before' => '<nav class="page-nav"><p>'.__('Pages:', 'bempress'),
                'after'  => '</p></nav>',
            )); ?>
        </footer>

        <?php tha_entry_bottom(); ?>

    </article>

    <?php tha_entry_after(); ?>

<?php endwhile; ?>
