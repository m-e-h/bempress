<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */
?>

		<?php tha_footer_before(); ?>

		<footer <?php hybrid_attr( 'footer' ); ?>>

			<?php tha_footer_top(); ?>

			<div <?php hybrid_attr( 'wrap', 'footer' ); ?>>

			<?php hybrid_get_sidebar( 'footer' ); ?>

				<p class="credit">
					<?php
					printf(
						__( 'Copyright &#169; %1$s %2$s.', 'abraham' ),
						date_i18n( 'Y' ), hybrid_get_site_link()
					);
					?>
				</p><!-- .credit -->

			</div><!-- .wrap -->

			<?php tha_footer_bottom(); ?>

		</footer><!-- .footer -->

		<?php tha_footer_after(); ?>

	</div><!-- .site-container -->

	<?php tha_body_bottom(); ?>
	<?php wp_footer(); ?>

</body>
</html>
