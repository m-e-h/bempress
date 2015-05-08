<?php
/**
 * Functions used to implement options
 *
 * @package Abraham
 */


add_action( 'wp_enqueue_scripts', 'bempress_custom_fonts' );

add_action( 'customize_controls_init', 'bempress_customize_css' );

add_action( 'admin_print_styles', 'bempress_admin_styles' );




/**
 * Enqueue Google Fonts.
 */
function bempress_custom_fonts() {

	// Font options
	$fonts = [
		get_theme_mod( 'primary-font', customizer_library_get_default( 'primary-font' ) ),
		get_theme_mod( 'secondary-font', customizer_library_get_default( 'secondary-font' ) )
	];

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'bempress_custom_fonts', $font_uri, [], null, 'screen' );

}




/**
 * Adds visual selectors for the layout option in the Theme Customizer.
 */
function bempress_customize_css() { ?>

	<style type="text/css">
		#customize-control-theme-layout-control input[value="1c-narrow"]:before {
			content: "\f134";
		}
		#customize-control-theme-layout-control input[value="1c"]:before {
			content: "\f134";
		}
		#customize-control-theme-layout-control input[value="1c"]:after {
			  content: " ";
			  width: 22px;
			  height: 10px;
			  background: #ddd;
			  position: absolute;
			  top: -6px;
			  left: 5px;
		}
		#customize-control-theme-layout-control input[value="2c-l"]:before {
			content: "\f135";
		}
		#customize-control-theme-layout-control input[value="2c-r"]:before {
			content: "\f136";
		}
		#customize-control-theme-layout-control input[type=radio] {
			font-family: dashicons;
			font-size: 32px;
		  	margin-right: 20px;
			color: #ddd;
			border: 0;
			line-height: 0;
			height: 0;
			width: 0;
			position: relative;
		}
		#customize-control-theme-layout-control input[type=radio]:checked:before {
			color: #888;
			text-indent: 0;
			-webkit-border-radius: 0;
			border-radius: 0;
			font-size: 32px;
			width: 0;
			height: 0;
			margin: 0;
			line-height: 0;
			background: none;
		}
	</style>
<?php }




/**
 * Adds visual selectors for the layout option in the Post Admin.
 */
function bempress_admin_styles() {
	?>
	<style type="text/css">
		#theme-layouts-post-meta-box input[value=default]:before {
			content: "\f159";
		}
		#theme-layouts-post-meta-box input[value="1c-narrow"]:before {
			content: "\f134";
		}
		#theme-layouts-post-meta-box input[value="1c"]:before {
			content: "\f134";
		}
		#theme-layouts-post-meta-box input[value="1c"]:after {
			  content: " ";
			  width: 22px;
			  height: 10px;
			  background: #ddd;
			  position: absolute;
			  top: -6px;
			  left: 5px;
		}
		#theme-layouts-post-meta-box input[value="2c-l"]:before {
			content: "\f135";
		}
		#theme-layouts-post-meta-box input[value="2c-r"]:before {
			content: "\f136";
		}
		#theme-layouts-post-meta-box input[type=radio] {
			font-family: dashicons;
			font-size: 32px;
		  	margin-right: 20px;
			color: #ddd;
			border: 0;
			line-height: 0;
			height: 0;
			width: 0;
			position: relative;
		}
		#theme-layouts-post-meta-box input[type=radio]:checked:before {
			color: #888;
			text-indent: 0;
			-webkit-border-radius: 0;
			border-radius: 0;
			font-size: 32px;
			width: 0;
			height: 0;
			margin: 0;
			line-height: 0;
			background: none;
		}
		#theme-layouts-post-meta-box li {
		  margin-bottom: 15px;
		}
	</style>
	<?php
}












/* Add layout option in Customize. */
add_action( 'customize_register', 'meh_layouts_customize_register' );

function meh_layouts_customize_register( $wp_customize ) {

    /* If viewing the customize preview screen, add a script to show a live preview. */
    if ( $wp_customize->is_preview() )
        add_action( 'wp_footer', 'theme_classes_customizer_script', 21 );
}

function theme_classes_customizer_script() {

$layoutclasses = new AttrTrumps();
$right = $layoutclasses->site_inner_sidebar_right;
$left = $layoutclasses->site_inner_sidebar_left;
$single = $layoutclasses->site_inner_single_column;
$wide = $layoutclasses->site_inner_full_width;
$widecontent = $layoutclasses->content_full_width;
$widesidebar = $layoutclasses->sidebar_full_width;
$content_single_column = $layoutclasses->content_single_column;
$sidebar_single_column = $layoutclasses->sidebar_single_column;
$content_sidebar_right = $layoutclasses->content_sidebar_right;
$content_sidebar_left = $layoutclasses->content_sidebar_left;
$sidebar_sidebar_right = $layoutclasses->sidebar_sidebar_right;
$sidebar_sidebar_left = $layoutclasses->sidebar_sidebar_left;
?>

<script type="text/javascript">

wp.customize(
    'theme_layout',
    function( value ) {
        value.bind(
            function( to ) {
            if(to == '2c-r') {
                jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
                jQuery( '#site-inner' ).addClass(<?= json_encode($left); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_left); ?>);
                jQuery( '#content' ).addClass(<?= json_encode($content_sidebar_right); ?>);
                jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_sidebar_right); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
            }
            else if(to == '2c-l') {
                jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
                jQuery( '#site-inner' ).addClass(<?= json_encode($right); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_right); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_right); ?>);
                jQuery( '#content' ).addClass(<?= json_encode($content_sidebar_left); ?>);
                jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_sidebar_left); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
            }
            if(to == '1c') {
                jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
                jQuery( '#site-inner' ).addClass(<?= json_encode($wide); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_right); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_right); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_left); ?>);
                jQuery( '#content' ).addClass(<?= json_encode($widecontent); ?>);
                jQuery( '#sidebar-primary' ).addClass(<?= json_encode($widesidebar); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
            }
            else if(to == '1c-narrow') {
                jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
                jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
                jQuery( '#site-inner' ).addClass(<?= json_encode($single); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
                jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
                jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
                jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_single_column); ?>);
                jQuery( '#content' ).addClass(<?= json_encode($content_single_column); ?>);
            }
            }
        );
    }
);

</script>
<?php
}
