<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php hybrid_get_content_template(); ?>
<?php endwhile; ?>
