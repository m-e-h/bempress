<?php
/**
 * @package Abraham
 */

global $mehsc_atts;
?>

<div class="<?php echo esc_attr( $mehsc_atts['width'] ); ?> grid__item u-flex u-flexed--auto u-p-- <?php echo esc_attr( $mehsc_atts['block_type'] ); ?>">

    <div id="post-<?php the_ID(); ?>" class="flag__content shadow--z1 u-flexed--auto t-bg__white u-br u-oh u-flex u-flex--ai-fs u-flex--row">

        <?php if( ! empty( $mehsc_atts['icon'] ) ) : ?>
        <div class="u-mr- flag__figure">
        <?php get_template_part( 'images/vector/svg', esc_attr($mehsc_atts['icon'] )); ?>
        </div>
        <?php endif; ?>

    <?php if ( 'show_img' === $mehsc_atts['show_image'] ) : ?>

        <?php get_the_image( array(
                'size'   => 'thumbnail',
                'before'        => '<div class="u-mr- flag__figure">',
                'after'         => '</div>',
                ) ); ?>

        <?php endif; ?>

        <div class="flag__body u-flexed--1 u-p-">

            <?php the_title( sprintf( '<a class="h4 flag__title u-inline-block u-mb-" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>

<?php if ( 'excerpt' === $mehsc_atts['show_content'] ) : ?>

                <?php the_excerpt(); ?>

<?php elseif ( 'content' === $mehsc_atts['show_content'] ) : ?>

                <?php the_content(); ?>

<?php endif; ?>

        </div><!-- .entry-content -->

        </div><!-- #post-## -->

</div><!-- flag-## -->
<?php
wp_reset_postdata();
