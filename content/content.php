<?php
if ( is_singular( get_post_type() ) ) : ?>

    <?php get_template_part('templates/content-single', get_post_type()); ?>

<?php 
else : // If not viewing a single post. ?>

    <?php if (!have_posts()) : ?>

        <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'bempress'); ?>
        </div>
    
        <?php get_search_form(); ?>
    
    <?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>

<?php
endif;
