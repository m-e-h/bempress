<?php if (!have_posts()) : ?>
<section <?php hybrid_attr( 'post' ); ?>>

    <div <?php hybrid_attr( 'entry-content' ); ?>>

        <?php _e('Sorry, no results were found.', 'bempress'); ?>
    </div>

    <?php get_search_form(); ?>

</section>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

    <article <?php hybrid_attr( 'post' ); ?>>

        <header class="entry-header">
            <h2 <?php hybrid_attr( 'entry-title' ); ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <?php if (get_post_type() === 'post') {
            get_template_part('components/entry-meta'); } ?>
        </header>

        <div <?php hybrid_attr( 'entry-summary' ); ?>>
        <?php the_excerpt(); ?>
        </div>

    </article>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>
