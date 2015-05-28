<?php
/**
 * Handles the custom colors feature for the theme.
 */

use Mexitek\PHPColors\Color;

/**
 * Handles custom theme color options via the WordPress theme customizer.
 *
 * @since  1.0.0
 * @access public
 */
final class Bempress_Custom_Styles {

    /**
     * Holds the instance of this class.
     *
     * @since  1.0.0
     * @access private
     * @var    object
     */
    private static $instance;

    /**
     * Sets up the Custom Colors Palette feature.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct() {

        /* Output CSS into <head>. */
        add_action( 'wp_head', array( $this, 'wp_head_callback' ) );

        /* Add a '.custom-styles' <body> class. */
        add_filter( 'body_class', array( $this, 'body_class' ) );

        /* Add options to the theme customizer. */
        add_action( 'customize_register', array( $this, 'customize_register' ) );

        /* Filter the default colors late. */
        add_filter( 'theme_mod_primary_color', array( $this, 'primary_color_default' ), 95 );
        add_filter( 'theme_mod_secondary_color',    array( $this, 'secondary_color_default'    ), 95 );


        /* Delete the cached data for this feature. */
        add_action( 'update_option_theme_mods_' . get_stylesheet(), array( $this, 'cache_delete' ) );
    }

    /**
     * Returns a default primary color if there is none set.  We use this instead of setting a default
     * so that child themes can overwrite the default early.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $hex
     * @return string
     */
    public function primary_color_default( $hex ) {
        return $hex ? $hex : '31509d';
    }

    /**
     * Returns a default secondary color if there is none set.  We use this instead of setting a default
     * so that child themes can overwrite the default early.
     *
     * @since  1.0.0
     * @access public
     * @param  string  $hex
     * @return string
     */
    public function secondary_color_default( $hex ) {
        return $hex ? $hex : '8b8482';
    }

    /**
     * Adds the 'custom-styles' class to the <body> element.
     *
     * @since  1.0.0
     * @access public
     * @param  array  $classes
     * @return array
     */
    public function body_class( $classes ) {

        $classes[] = 'custom-styles';

        return $classes;
    }

    /**
     * Callback for 'wp_head' that outputs the CSS for this feature.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function wp_head_callback() {
        $stylesheet = get_stylesheet();
        /* Get the cached style. */
        $style = wp_cache_get( "{$stylesheet}_custom_styles" );
        /* If the style is available, output it and return. */
        if ( !empty( $style ) ) {
            echo $style;
            return;
        }
        $style  = $this->get_primary_styles();
        $style .= $this->get_secondary_styles();
        /* Put the final style output together. */
        $style = "\n" . '<style type="text/css" id="custom-styles-css">' . trim( $style ) . '</style>' . "\n";
        /* Cache the style, so we don't have to process this on each page load. */
        wp_cache_set( "{$stylesheet}_custom_styles", $style );
        /* Output the custom style. */
        echo $style;
    }


    /**
     * Formats the primary styles for output.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function get_primary_styles() {
        $style = '';
        $hex = get_theme_mod( 'primary_color', '' );
        $hfont = get_theme_mod( 'heading_font', '' );
        $bfont = get_theme_mod( 'body_font', '' );
        $rgb = join( ', ', hybrid_hex_to_rgb( $hex ) );

        $primaryColor = new Color( $hex );
        $color50    = $primaryColor->lighten(45);
        $color100   = $primaryColor->lighten(40);
        $color200   = $primaryColor->lighten(30);
        $color300   = $primaryColor->lighten(20);
        $color400   = $primaryColor->lighten(10);
        $color500   = $hex;
        $color600   = $primaryColor->darken(10);
        $color700   = $primaryColor->darken(20);
        $color800   = $primaryColor->darken(30);
        $color900   = $primaryColor->darken(40);

        /* === Color === */

        $style .= "
                .entry-content a
                { color: $hex; }
            ";
        $style .= "
            .badge a, .btn, .button, button, input[type=button], input[type=reset], input[type=submit],
                .t-bg__1
                { background-color: $hex; }
            ";
        $style .= "
        .badge a:active, .badge a:hover, .btn:active, .btn:hover, button:active, button:hover, input[type=button]:active, input[type=button]:hover, input[type=reset]:active, input[type=reset]:hover, input[type=submit]:active, input[type=submit]:hover,
                .t-bg__1--light
                { background-color: #{$color400}; }
            ";
        $style .= "
                .t-bg__1--dark
                { background-color: #{$color600}; }
            ";
        $style .= "
                .t-bg__1--glass
                { background-color: #{$color100}; }
            ";
        $style .= "
                .t-fill__1
                { fill: $hex; }
            ";
        $style .= "
                .t-fill__1--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .t-fill__1--dark
                { fill: #{$color600}; }
            ";
        $style .= "
                h1, h2, h3, h4
                { font-family: '$hfont'; }
            ";
        $style .= "
                body
                { font-family: '$bfont'; }
            ";
        /* Return the styles. */
        return str_replace( array( "\r", "\n", "\t" ), '', $style );
    }
    /**
     * Formats the primary styles for output.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function get_secondary_styles() {
        $style = '';
        $hex = get_theme_mod( 'secondary_color', '' );
        $rgb = join( ', ', hybrid_hex_to_rgb( $hex ) );

        $secondaryColor = new Color( $hex );
        $color50    = $secondaryColor->lighten(45);
        $color100   = $secondaryColor->lighten(40);
        $color200   = $secondaryColor->lighten(30);
        $color300   = $secondaryColor->lighten(20);
        $color400   = $secondaryColor->lighten(10);
        $color500   = $hex;
        $color600   = $secondaryColor->darken(10);
        $color700   = $secondaryColor->darken(20);
        $color800   = $secondaryColor->darken(30);
        $color900   = $secondaryColor->darken(40);

        /* === Color === */

        $style .= "
                .t-bg__2
                { background-color: $hex; }
            ";
        $style .= "
                .t-bg__2--light
                { background-color: #{$color400}; }
            ";
        $style .= "
                .t-bg__2--dark
                { background-color: #{$color600}; }
            ";
        $style .= "
                .t-bg__2--glass
                { background-color: #{$color100}; }
            ";
        $style .= "
                .t-fill__2
                { fill: $hex; }
            ";
        $style .= "
                .t-fill__2--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .t-fill__2--dark
                { fill: #{$color600}; }
                ";
        /* Return the styles. */
        return str_replace( array( "\r", "\n", "\t" ), '', $style );
    }

    public function customize_register( $wp_customize ) {

        /* Add the primary color setting. */
        $wp_customize->add_setting(
            'primary_color',
            array(
                'default'              => get_theme_mod( 'primary_color', '' ),
                'type'                 => 'theme_mod',
                'sanitize_callback'    => 'sanitize_hex_color_no_hash',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
                'transport'            => 'postMessage',
            )
        );

        /* Add the secondary color setting. */
        $wp_customize->add_setting(
            'secondary_color',
            array(
                'default'              => get_theme_mod( 'secondary_color', '' ),
                'type'                 => 'theme_mod',
                'sanitize_callback'    => 'sanitize_hex_color_no_hash',
                'sanitize_js_callback' => 'maybe_hash_hex_color',
                'transport'            => 'postMessage',
            )
        );

        /* Add secondary color control. */
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'custom-primary-color',
                array(
                    'label'    => esc_html__( 'Primary Color', 'bempress' ),
                    'section'  => 'colors',
                    'settings' => 'primary_color',
                    'priority' => 10,
                )
            )
        );

        /* Add the primary color control. */
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'custom-secondary-color',
                array(
                    'label'    => esc_html__( 'Secondary Color', 'bempress' ),
                    'section'  => 'colors',
                    'settings' => 'secondary_color',
                    'priority' => 15,
                )
            )
        );
    }

    /**
     * Deletes the cached style CSS that's output into the header.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function cache_delete() {
        wp_cache_delete( get_stylesheet() . '_custom_styles' );
    }
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        if ( !self::$instance )
            self::$instance = new self;
        return self::$instance;
    }
}

Bempress_Custom_Styles::get_instance();
