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

        <div class="action-bar">
            <div <?php hybrid_attr( 'wrap', 'action-bar' ); ?>>

                <?php hybrid_site_title(); ?>

                <button class="menu-toggle" aria-controls="menu-primary" aria-expanded="false">
                <span></span>
                </button>

                <?php action_bar_right(); ?>
            </div>
        </div>

        <div <?php hybrid_attr( 'wrap', 'header' ); ?>>

        <?php tha_header_top(); ?>

        <?php tha_header_bottom(); ?>

        </div><!-- .wrap -->

	</header><!-- #header -->

    <?php tha_header_after(); ?>

	<?php hybrid_get_menu( 'primary' ); ?>

    <div <?php hybrid_attr( 'site-container' ); ?>>
