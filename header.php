<?php
/**
 * The Header for our theme.
 *
 * @package BEMpress
 */
?><!doctype html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head <?php hybrid_attr( 'head' ); ?>>
<?php tha_head_top(); ?>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php wp_head(); ?>


<?php tha_head_bottom(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>
    <!--[if lt IE 10]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://whatbrowser.org">Upgrade your browser</a> for a faster, safer, and better web experience.</p>
    <![endif]-->

<?php tha_body_top(); ?>

	<div class="skip-link">
		<a href="#content" class="button screen-reader-text">
			<?php esc_html_e( 'Skip to content (Press enter)', 'bempress' ); ?>
		</a>
	</div><!-- .skip-link -->

    <?php tha_header_before(); ?>

	<header <?php hybrid_attr( 'header' ); ?>>

        <?php tha_header_top(); ?>

            <div <?php hybrid_attr( 'branding' ); ?>>

	            <button class="menu-toggle" aria-controls="menu-primary" aria-expanded="false">
	            <span></span>
	            </button>

				<?php if( '1' == get_theme_mod( 'svg_logo' ) ) { ?>
	            <div class="logo-image">
	                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                    <?php get_template_part( 'images/svg', 'logo' ); ?>
	                </a>
	            </div>
	            <?php } ?>

	            <div class="logo-text">
		            <?php hybrid_site_title(); ?>
		            <?php hybrid_site_description(); ?>
            	</div>
            </div>

    <?php hybrid_get_menu( 'primary' ); ?>

        <?php tha_header_bottom(); ?>

	</header><!-- #header -->

    <?php tha_header_after(); ?>

    <div <?php hybrid_attr( 'site-container' ); ?>>

        <div <?php hybrid_attr( 'site-inner' ); ?>>
