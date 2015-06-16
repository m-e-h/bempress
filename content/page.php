<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('components/content', 'page'); ?>
<?php endwhile; ?>
