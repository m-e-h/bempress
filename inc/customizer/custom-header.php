<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package bempress
 */

if ( ! function_exists( 'bempress_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see bempress_custom_header_setup().
 */
function bempress_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
        .site-title,
        .site-description {
            color: #<?= esc_attr( $header_text_color ); ?>;
        }
	<?php endif; ?>
    <?php
        // Is there an image?
        if ( get_header_image() ) :
    ?>
        .hero-wrap,
        .page-title__bg {
            //background-image: url(<?php header_image(); ?>);
        }
        <?php endif; // End header image check. ?>
    </style>



    <?php
}
endif; // bempress_header_style
