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

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    $count = 1;
    while ( $query->have_posts() ) : $query->the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 't-bg__tint u-pv@respond featured-' . $count ); ?>>

        <?php
            $image = get_the_image( array( 'size'   => 'bempress-hd', 'format' => 'array' ) );
            $url = $image['src'];

if ( !empty( $url )  ) : ?>
            <style type="text/css">
        .page-highlight {
            background: url(<?php echo $url ?>) no-repeat 0 0;
             background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size:    cover;
            -o-background-size:      cover;
            background-size:         cover;
        }
            </style>
            <?php endif; // End header image check. ?>
<div class="wrap">
            <header class="entry-header">
                <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-summary clearfix">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

        </article><!-- #post-## -->
</div>
    <?php
    $count++;
    endwhile;
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
