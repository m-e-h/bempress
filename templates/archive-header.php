<?php
/**
 * A template part to display meta data for an archive page.
 *
 * @package BEMpress
 */
?>

<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

    		<h1 <?php hybrid_attr( 'archive-title' ); ?>><?php the_archive_title(); ?></h1>

    		<?php if ( is_category() || is_tax() ) : ?>

    			<?php hybrid_get_menu( 'sub-terms' ); ?>

    		<?php endif; ?>

    		<?php if ( ! is_paged() && $desc = get_the_archive_description() ) : ?>

    			<div <?php hybrid_attr( 'archive-description' ); ?>>
    				<?= $desc; ?>
    			</div><!-- .archive-description -->

    		<?php endif; ?>

<?php elseif ( is_singular() ) : ?>

    <?php $doc_post_title = get_post_field( 'post_title', get_queried_object_id() ); ?>

    <header class="entry__header">
        <h1 <?php hybrid_attr( 'entry-title' ); ?>><?php echo $doc_post_title; ?></h1>
    </header><!-- .entry-header -->

<?php else : ?>

    <div <?php hybrid_attr( 'branding' ); ?>>
        <?php hybrid_site_title(); ?>
        <?php hybrid_site_description(); ?>
    </div><!-- #branding -->

<?php endif; ?>
