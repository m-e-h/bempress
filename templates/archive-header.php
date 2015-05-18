<?php
/**
 * A template part to display meta data for an archive page.
 *
 * @package BEMpress
 */
?>

<div <?php hybrid_attr( 'archive-header' ); ?>>

    <div <?php hybrid_attr( 'wrap', 'archive-header' ); ?>>

        <h1 <?php hybrid_attr( 'archive-title' ); ?>><?php the_archive_title(); ?></h1>

        <?php if ( is_category() || is_tax() ) : ?>

            <?php hybrid_get_menu( 'sub-terms' ); ?>

        <?php endif; ?>

        <?php if ( ! is_paged() && $desc = get_the_archive_description() ) : ?>

            <div <?php hybrid_attr( 'archive-description' ); ?>>
                <?= $desc; ?>
            </div><!-- .archive-description -->

        <?php endif; ?>

    </div>

</div><!-- .archive-header -->
