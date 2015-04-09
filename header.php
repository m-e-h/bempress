<?php
/**
 * The Header for our theme.
 *
 * @package BEMpress
 */
?>

<!doctype html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php tha_head_top(); ?>
<meta http-equiv="x-ua-compatible" content="ie=edge">

<?php wp_head(); ?>
<?php tha_head_bottom(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

<?php tha_body_top(); ?>

	<div <?php hybrid_attr( 'site-container' ); ?>>

		<div class="skip-link">
			<a href="#content" class="button screen-reader-text">
				<?php _e( 'Skip to content (Press enter)', 'bempress' ); ?>
			</a>
		</div><!-- .skip-link -->

        <?php tha_header_before(); ?>

		<header <?php hybrid_attr( 'header' ); ?>>



			<div <?php hybrid_attr( 'wrap', 'header' ); ?>>

                <?php tha_header_top(); ?>

				<div <?php hybrid_attr( 'branding' ); ?>>
					<?php flagship_the_logo(); ?>
					<?php hybrid_site_title(); ?>
					<?php hybrid_site_description(); ?>
				</div><!-- #branding -->

                <?php tha_header_bottom(); ?>

			</div><!-- .wrap -->
<?php hybrid_get_menu( 'primary' ); ?>
		</header><!-- #header -->

        <?php tha_header_after(); ?>

		<div <?php hybrid_attr( 'site-inner' ); ?>>
