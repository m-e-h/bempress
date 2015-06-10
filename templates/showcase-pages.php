<?php
/**
 * @package Abraham
 */
?>

<?php
// Get pages set in the customizer (if any)
$pages = array();
for ( $count = 1; $count <= 5; $count++ ) {
    $mod = get_theme_mod( 'showcase-page-' . $count );
    if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
    }
}

$args = array(
    'posts_per_page' => 5,
    'post_type' => 'page',
    'post__in' => $pages,
    'orderby' => 'post__in'
);

$query2 = new WP_Query( $args );

if ( $query2->have_posts() ) :
    $count = 1;
    ?>

<section class="row pages-highlight u-pv@respond t-bg__2">

<div class="block-row grid u-flex u-flex--row@md u-flex--w wrap">

<?php
    while ( $query2->have_posts() ) : $query2->the_post();
    ?>

<div class="block u-min--300 grid__item u-flex u-flexed--1 u-p--">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'block__content shadow--z1 u-p- u-flexed--auto t-bg__white block__' . $count ); ?>>

<?php get_the_image( array(
        'size'   => 'bempress-sm',
        'before'        => '<div class="featured-media u-mb- u-mtn- u-mhn- block__image">',
        'after'         => '</div>',
        ) ); ?>
            <?php the_title( sprintf( '<h2 class="block__title u-mb-"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <div class="block__body">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

        </div><!-- block-content-## -->
</div><!-- block-## -->
    <?php
    $count++;
    endwhile; ?>
</div><!-- block-row-## -->
    </section>
<?php
endif;
