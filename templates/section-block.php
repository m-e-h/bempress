<?php
/**
 * @package Abraham
 */

global $mehsc_atts;



    ?>

<div class="block u-flex u-min--300 grid__item u-flexed--1 u-p-- <?php echo esc_attr( $mehsc_atts['width'] ); ?>">
        <div id="post-<?php the_ID(); ?>" class="block__content u-flexed--1 shadow--z1 u-p- t-bg__white">
<?php get_the_image( array(
        'size'   => 'bempress-sm',
        'before'        => '<div class="featured-media u-mb- u-mtn- u-mhn- block__image">',
        'after'         => '</div>',
        ) ); ?>
            <?php the_title( sprintf( '<h2 class="block__title u-mb-"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
<?php if ( 'excerpt' === $mehsc_atts['show'] ) : ?>
            <div class="block__body">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

<?php elseif ( 'content' === $mehsc_atts['show'] ) : ?>
            <div class="block__body">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
<?php endif; ?>

        </div><!-- #post-## -->
</div>
<?php
wp_reset_postdata();
