<?php
/**
 * @package Abraham
 */
?>

<footer class="entry__footer">
    <p class="entry__meta wrap">
        <span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
        <time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
        <?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?>
        <?php edit_post_link(); ?>
    </p><!-- .entry-meta -->
</footer><!-- .entry-footer -->
