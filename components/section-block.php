<?php
/**
 * This is the template for the different block-type shortcodes.
 *
 * @package Bempress
 */

global $mehsc_atts;
?>

<div class="<?php echo esc_attr( $mehsc_atts['width'] ); ?> grid__item flex flexed--auto u-ph- u-pb">

    <div id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $mehsc_atts['block_type'] ); ?> block__content shadow--z1 flexed--auto t-bg__white u-radius flex">

    <?php if( ! empty( $mehsc_atts['icon'] ) ) : ?>

    <div class="block__figure">
            <?php get_template_part( 'images/vector/svg', esc_attr($mehsc_atts['icon'] )); ?>
    </div>

    <?php endif; ?>

    <?php if ( 'show_img' === $mehsc_atts['show_image'] ) : ?>

    <?php
    if ( 'block' === $mehsc_atts['block_type'] ) {
        get_the_image([
            'size' => 'bempress-sm',
            'before' => '<div class="block__figure">',
            'after' => '</div>',
        ]);
    } elseif ( 'flag' === $mehsc_atts['block_type'] ) {
        get_the_image([
            'size' => 'thumbnail',
            'before' => '<div class="block__figure flag-image u-round u-mh">',
            'after' => '</div>',
        ]);
    }
    ?>

    <?php endif; ?>

        <div class="block__wrap flexed--1">

            <div class="block__title u-p- t-bg__2">
            <?php the_title( sprintf( '<a class="u-h3 block__title--link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
            </div>
            <?php if ( 'excerpt' === $mehsc_atts['show_content'] ) : ?>

                <div class="block__body u-p-">
                <?php the_excerpt(); ?>
                </div>

            <?php elseif ( 'content' === $mehsc_atts['show_content'] ) : ?>

                <div class="block__body u-p-">
                <?php the_content(); ?>
                </div>

            <?php endif; ?>

        </div><!-- .block__body -->

    </div><!-- .block__content -->

</div><!-- .block -->

<?php
wp_reset_postdata();
