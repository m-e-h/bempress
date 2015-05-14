<?php
/**
 * Handles the custom colors feature for the theme.  This feature allows the theme or child theme author to
 * set a custom color by default.  However the user can overwrite this default color via the theme customizer
 * to a color of their choosing.
 *
 * @package    Saga
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2014, Justin Tadlock
 * @link       http://themehybrid.com/themes/saga
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

use Mexitek\PHPColors\Color;

/**
 * Handles custom theme color options via the WordPress theme customizer.
 *
 * @since  1.0.0
 * @access public
 */
final class Saga_Custom_Colors {
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
        /* Add a '.custom-colors' <body> class. */
        add_filter( 'body_class', array( $this, 'body_class' ) );
        /* Delete the cached data for this feature. */
        add_action( 'update_option_theme_mods_' . get_stylesheet(), array( $this, 'cache_delete' ) );
    }

    /**
     * Adds the 'custom-colors' class to the <body> element.
     *
     * @since  1.0.0
     * @access public
     * @param  array  $classes
     * @return array
     */
    public function body_class( $classes ) {
        $classes[] = 'custom-colors';
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
        $style = wp_cache_get( "{$stylesheet}_custom_colors" );
        /* If the style is available, output it and return. */
        if ( !empty( $style ) ) {
            echo $style;
            return;
        }
        $style  = $this->get_primary_styles();
        $style .= $this->get_secondary_styles();
        /* Put the final style output together. */
        $style = "\n" . '<style type="text/css" id="custom-colors-css">' . trim( $style ) . '</style>' . "\n";
        /* Cache the style, so we don't have to process this on each page load. */
        wp_cache_set( "{$stylesheet}_custom_colors", $style );
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
                { color: #{$hex}; }
            ";
        $style .= "
                .t-bg__1
                { background-color: #{$hex}; }
            ";
        $style .= "
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
                { fill: #{$hex}; }
            ";
        $style .= "
                .t-fill__1--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .t-fill__1--dark
                { fill: #{$color600}; }
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
                { background-color: #{$hex}; }
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
                { fill: #{$hex}; }
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

    /**
     * Deletes the cached style CSS that's output into the header.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function cache_delete() {
        wp_cache_delete( get_stylesheet() . '_custom_colors' );
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
Saga_Custom_Colors::get_instance();
