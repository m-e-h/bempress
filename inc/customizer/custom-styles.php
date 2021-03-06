<?php

/**
 * Handles the custom colors feature for the theme.
 */
use Mexitek\PHPColors\Color;

/**
 * Handles custom theme color options via the WordPress theme customizer.
 *
 * @since  1.0.0
 */
final class Bempress_Custom_Styles {
    /**
     * Holds the instance of this class.
     *
     * @since  1.0.0
     *
     * @var object
     */
    private static $instance;

    /**
     * Sets up the Custom Colors Palette feature.
     *
     * @since  1.0.0
     */
    public function __construct() {

        /* Output CSS into <head>. */
        add_action('wp_head', array($this, 'wp_head_callback'));

        /* Add a '.custom-styles' <body> class. */
        add_filter('body_class', array($this, 'body_class'));

        /* Filter the default colors late. */
        add_filter('theme_mod_primary_color',      array($this, 'primary_color_default'), 95);
        add_filter('theme_mod_secondary_color',    array($this, 'secondary_color_default'), 95);
        add_filter('theme_mod_accent_color',       array($this, 'accent_color_default'), 95);

        /* Delete the cached data for this feature. */
        add_action('update_option_theme_mods_'.get_stylesheet(), array($this, 'cache_delete'));
    }

    /**
     * Returns a default colors if there is none set.  We use this instead of setting a default
     * so that child themes can overwrite the default early.
     *
     * @since  1.0.0
     *
     * @param string $hex
     *
     * @return string
     */
    public function primary_color_default($hex) {
        return $hex ? $hex : '004899';
    }

    public function secondary_color_default($hex) {
        return $hex ? $hex : 'ffe192';
    }

    public function accent_color_default($hex) {
        return $hex ? $hex : 'eeeeee';
    }

    /**
     * Adds the 'custom-styles' class to the <body> element.
     *
     * @since  1.0.0
     *
     * @param array $classes
     *
     * @return array
     */
    public function body_class($classes) {
        $classes[] = 'custom-styles';

        return $classes;
    }

    /**
     * Callback for 'wp_head' that outputs the CSS for this feature.
     *
     * @since  1.0.0
     */
    public function wp_head_callback() {
        $stylesheet = get_stylesheet();
        /* Get the cached style. */
        $style = wp_cache_get("{$stylesheet}_custom_colors");
        /* If the style is available, output it and return. */
        if (!empty($style)) {
            echo $style;

            return;
        }
        $style = $this->get_primary_styles();
        $style .= $this->get_secondary_styles();
        $style .= $this->get_accent_styles();
        /* Put the final style output together. */
        $style = "\n".'<style type="text/css" id="custom-colors-css">'.trim($style).'</style>'."\n";
        /* Cache the style, so we don't have to process this on each page load. */
        wp_cache_set("{$stylesheet}_custom_colors", $style);
        /* Output the custom style. */
        echo $style;
    }

    /**
     * Formats the primary styles for output.
     *
     * @since  1.0.0
     *
     * @return string
     */
    public function get_primary_styles() {
        $style = '';
        $hex   = get_theme_mod('primary_color', '');
        $hfont = get_theme_mod('heading_font', '');
        $bfont = get_theme_mod('body_font', '');
        $rgb   = implode(', ', hybrid_hex_to_rgb($hex));

        $primaryColor = new Color($hex);
        $color50      = $primaryColor->lighten(45);
        $color100     = $primaryColor->lighten(40);
        $color200     = $primaryColor->lighten(30);
        $color300     = $primaryColor->lighten(20);
        $color400     = $primaryColor->lighten(10);
        $color500     = $hex;
        $color600     = $primaryColor->darken(10);
        $color700     = $primaryColor->darken(20);
        $color800     = $primaryColor->darken(30);
        $color900     = $primaryColor->darken(40);

        /* === Color === */

        $style .= "
                a, .color-1
                { color: #{$color500}; }
            ";
        $style .= "
            .bg-1
                { background-color: #{$color500}; }
            ";
        $style .= "
            .bg-1--light
                { background-color: #{$color400}; }
            ";
        $style .= "
                .bg-1--dark
                { background-color: #{$color600}; }
            ";
        $style .= "
                .bg-1--glass
                { background-color: #{$color100}; }
            ";
        $style .= "
                .fill-1
                { fill: #{$color500}; }
            ";
        $style .= "
                .fill-1--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .fill-1--dark
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
        return str_replace(array("\r", "\n", "\t"), '', $style);
    }

    /**
     * Formats the secondary styles for output.
     *
     * @since  1.0.0
     *
     * @return string
     */
    public function get_secondary_styles() {
        $style = '';
        $hex   = get_theme_mod('secondary_color', '');
        $rgb   = implode(', ', hybrid_hex_to_rgb($hex));

        $secondaryColor = new Color($hex);
        $color50        = $secondaryColor->lighten(45);
        $color100       = $secondaryColor->lighten(40);
        $color200       = $secondaryColor->lighten(30);
        $color300       = $secondaryColor->lighten(20);
        $color400       = $secondaryColor->lighten(10);
        $color500       = $hex;
        $color600       = $secondaryColor->darken(10);
        $color700       = $secondaryColor->darken(20);
        $color800       = $secondaryColor->darken(30);
        $color900       = $secondaryColor->darken(40);

        /* === Color === */

        $style .= "
                .color-2
                { color: #{$color500}; }
            ";
        $style .= "
                .bg-2
                { background-color: #{$color500}; }
            ";
        $style .= "
                .custom-styles .bg-2--light
                { background-color: #{$color400}; }
            ";
        $style .= "
                .bg-2--dark
                { background-color: #{$color600}; }
            ";
        $style .= "
                .bg-2--glass
                { background-color: #{$color100}; }
            ";
        $style .= "
                .fill-2
                { fill: #{$color500}; }
            ";
        $style .= "
                .fill-2--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .fill-2--dark
                { fill: #{$color600}; }
                ";
        /* Return the styles. */
        return str_replace(array("\r", "\n", "\t"), '', $style);
    }

    /**
     * Formats the accent styles for output.
     *
     * @since  1.0.0
     *
     * @return string
     */
    public function get_accent_styles() {
        $style = '';
        $hex   = get_theme_mod('accent_color', '');
        $rgb   = implode(', ', hybrid_hex_to_rgb($hex));

        $accentColor = new Color($hex);
        $color50     = $accentColor->lighten(45);
        $color100    = $accentColor->lighten(40);
        $color200    = $accentColor->lighten(30);
        $color300    = $accentColor->lighten(20);
        $color400    = $accentColor->lighten(10);
        $color500    = $hex;
        $color600    = $accentColor->darken(10);
        $color700    = $accentColor->darken(20);
        $color800    = $accentColor->darken(30);
        $color900    = $accentColor->darken(40);

        /* === Color === */

        $style .= "
                .color-3
                { color: #{$color500}; }
            ";
        $style .= "
                .bg-3
                { background-color: #{$color500}; }
            ";
        $style .= "
                .bg-3--light
                { background-color: #{$color400}; }
            ";
        $style .= "
                .bg-3--dark
                { background-color: #{$color600}; }
            ";
        $style .= "
                .bg-3--glass
                { background-color: #{$color100}; }
            ";
        $style .= "
                .fill-3
                { fill: #{$color500}; }
            ";
        $style .= "
                .fill-3--light
                { fill: #{$color400}; }
            ";
        $style .= "
                .fill-3--dark
                { fill: #{$color600}; }
                ";
        /* Return the styles. */
        return str_replace(array("\r", "\n", "\t"), '', $style);
    }

    /**
     * Deletes the cached style CSS that's output into the header.
     *
     * @since  1.0.0
     */
    public function cache_delete() {
        wp_cache_delete(get_stylesheet().'_custom_colors');
    }
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     *
     * @return object
     */
    public static function get_instance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

Bempress_Custom_Styles::get_instance();
