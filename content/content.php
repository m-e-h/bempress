<?php
if ( is_singular( get_post_type() ) ) : ?>

    <?php get_template_part('components/content-single', get_post_type()); ?>

<?php
else : // If not viewing a single post. ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('components/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'components/content', 'none' ); ?>

	<?php endif; // End check for posts. ?>

<?php
endif;
