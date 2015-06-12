<?php
/**
 * This is the template for the different block-type shortcodes.
 *
 * @package Bempress
 */

global $mehsc_atts;
?>

<div class="<?php echo esc_attr( $mehsc_atts['width'] ); ?> block grid__item u-flex u-flexed--auto u-p--">

    <div id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $mehsc_atts['block_type'] ); ?> block__content shadow--z1 u-flexed--auto t-bg__white u-br u-oh u-flex">

        <div class="block__figure">

    <?php if( ! empty( $mehsc_atts['icon'] ) ) : ?>

            <?php get_template_part( 'images/vector/svg', esc_attr($mehsc_atts['icon'] )); ?>

    <?php endif; ?>

    <?php if ( 'show_img' === $mehsc_atts['show_image'] ) : ?>

    <?php
    if ( 'block' === $mehsc_atts['block_type'] ) {
        get_the_image( ['size' => 'bempress-sm',] );
    } elseif ( 'flag' === $mehsc_atts['block_type'] ) {
        get_the_image( ['size' => 'thumbnail',] );
    }
    ?>

    <?php endif; ?>

        </div>

        <div class="block__body u-flexed--1 u-p-">

            <?php the_title( sprintf( '<a class="h4 block__title u-inline-block u-mb-" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>

            <?php if ( 'excerpt' === $mehsc_atts['show_content'] ) : ?>

                <?php the_excerpt(); ?>

            <?php elseif ( 'content' === $mehsc_atts['show_content'] ) : ?>

                <?php the_content(); ?>

            <?php endif; ?>

        </div><!-- .block__body -->

    </div><!-- .block__content -->

</div><!-- .block -->

<?php
wp_reset_postdata();
