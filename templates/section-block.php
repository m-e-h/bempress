<?php
/**
 * @package Abraham
 */

global $mehsc_atts;
?>

<div class="<?php echo esc_attr( $mehsc_atts['width'] ); ?> block grid__item u-flex u-flexed--1 u-p-- <?php echo esc_attr( $mehsc_atts['block_type'] ); ?>">
        <div id="post-<?php the_ID(); ?>" class="block__content shadow--z1 u-p- u-flexed--auto t-bg__white">
<?php if ( 'show_img' === $mehsc_atts['show_image'] ) : ?>
<?php get_the_image( array(
        'size'   => 'bempress-sm',
        'before'        => '<div class="featured-media u-mb- u-mtn- u-mhn- block__image">',
        'after'         => '</div>',
        ) ); ?>
<?php endif; ?>
            <?php the_title( sprintf( '<h2 class="block__title u-mb-"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
<?php if ( 'excerpt' === $mehsc_atts['show_content'] ) : ?>
            <div class="block__body">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

<?php elseif ( 'content' === $mehsc_atts['show_content'] ) : ?>
            <div class="block__body">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
<?php endif; ?>

        </div><!-- #post-## -->
</div><!-- block-## -->
<?php
wp_reset_postdata();
