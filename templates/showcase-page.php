<?php
/**
 * @package Abraham
 */
?>

<?php
// Get pages set in the customizer (if any)
$pages = array();
for ( $count = 1; $count <= 2; $count++ ) {
    $mod = get_theme_mod( 'page-highlight' );
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

$query1 = new WP_Query( $args );

if ( $query1->have_posts() ) :
    $count = 1;
    ?>

<section class="row page-highlight u-pv@respond t-bg__1--light">

<div class="block-row grid u-flex u-flex--row@md u-flex--w wrap">

<?php
    while ( $query1->have_posts() ) : $query1->the_post();
    ?>

<div class="block grid__item u-bl u-flexed--1 u-ph--">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'block__content u-p t-bg__frost shadow--z2 single-block-' . $count ); ?>>

        <?php
            $image = get_the_image( array( 'size'   => 'bempress-hd', 'format' => 'array' ) );
            $url = $image['src'];

if ( !empty( $url )  ) : ?>
            <style type="text/css">
        .page-highlight {
            background-image: url(<?php echo $url ?>);
             background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size:    cover;
            -o-background-size:      cover;
            background-size:         cover;
        }
            </style>
            <?php endif; // End header image check. ?>
            <?php the_title( sprintf( '<h2 class="block__title u-text--c"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <div class="block__body">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </div><!-- #post-## -->
</div>
    <?php
    $count++;
    endwhile;?>
    </section>
<?php
else :
    if ( current_user_can( 'customize' ) ) { ?>
        <div class="message">
            <p><?php _e( 'There are no pages available to display.', 'textdomain' ); ?></p>
            <p><?php printf(
                __( 'These pages can be set in the <a href="%s">customizer</a>.', 'textdomain' ),
                admin_url( 'customize.php?autofocus[control]=page_highlight' )
            ); ?>
            </p>
        </div>
    <?php }
endif;
?>
