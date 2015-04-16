<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpclt
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

    <?php tha_entry_top(); ?>

    <?php get_template_part( 'templates/archive', 'header' ); ?>

    <?php get_template_part( 'templates/archive', 'content' ); ?>

    <?php get_template_part( 'templates/archive', 'footer' ); ?>

    <?php tha_entry_bottom(); ?>

</article><!-- #post-## -->
