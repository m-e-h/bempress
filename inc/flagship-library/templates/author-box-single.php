<?php
/**
 * The default author box template for single entries.
 *
 * If you need to make changes to this template, copy it into your theme or
 * child theme in the following format: '/flagship/author-box-single.php'.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.4.0
 */
?>
<section <?php hybrid_attr( 'author-box', 'single' ); ?>>

	<div class="avatar-wrap">
		<?php echo get_avatar( get_the_author_meta( 'email' ), 100, '', get_the_author() ); ?>
	</div><!-- .avatar-wrap -->

	<div class="author-info">

		<h3 class="author-box-title">
			<?php _e( 'Written by', 'flagship-library' ); ?> <?php the_author_posts_link(); ?>
		</h3>

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="description" itemprop="description">
				<?php echo wpautop( get_the_author_meta( 'description' ) ) ?>
			</div>
		<?php endif; ?>

	</div><!-- .author-info -->

	<ul class="social-icons">

		<?php if ( $twitter = get_the_author_meta( 'twitter' ) ) : ?>
		<li class="social-twitter">
			<a href="<?php echo esc_url( "https://twitter.com/{$twitter}" ); ?>">
				<span class="text"><?php _e( 'Twitter', 'flagship-library' ); ?></span>
			</a>
		</li>
		<?php endif; ?>

		<?php if ( $gplus = get_the_author_meta( 'googleplus' ) ) : ?>
		<li class="social-gplus">
			<a href="<?php echo esc_url( $gplus ); ?>">
				<span class="text"><?php _e( 'Google+', 'flagship-library' ); ?></span>
			</a>
		</li>
		<?php endif; ?>

		<?php if ( $facebook = get_the_author_meta( 'facebook' ) ) : ?>
		<li class="social-facebook">
			<a href="<?php echo esc_url( $facebook ); ?>">
				<span class="text"><?php _e( 'Facebook', 'flagship-library' ); ?></span>
			</a>
		</li>
		<?php endif; ?>

		<li class="social-rss">
			<a href="<?php echo esc_url( get_author_feed_link() ); ?>">
				<span class="text"><?php _e( 'RSS Feed', 'flagship-library' ); ?></span>
			</a>
		</li>

	</ul><!-- .social-icons -->

</section><!-- .author-box -->
