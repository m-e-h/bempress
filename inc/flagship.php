<?php
/**
 * Load all required library files.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

if ( ! class_exists( 'Flagship_Library' ) ) {

    /**
     * Class for common Flagship theme functionality.
     *
     * @version 0.1.0
     */
    class Flagship_Library {

        /**
         * Our library version number.
         *
         * @since 0.1.0
         * @type  string
         */
        protected $version = '0.1.0';

        /**
         * Prefix to prevent conflicts.
         *
         * Used to prefix filters to make them unique.
         *
         * @since 0.1.0
         * @type  string
         */
        protected $prefix;

        /**
         * Slashed directory path to load files.
         *
         * @since 0.1.0
         * @type  string
         */
        public $dir;


        /**
         * Static placeholder for our main class instance.
         *
         * @since 0.1.0
         * @var   Flagship_Library
         */
        private static $instance;

        /**
         * Throw error on object clone
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         *
         * @since  0.1.0
         * @access protected
         * @return void
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong(
                __FUNCTION__,
                __( 'Cheatin&#8217; huh?', 'flagship-library' ),
                '0.1.0'
            );
        }

        /**
         * Disable unserializing of the class
         *
         * @since  0.1.0
         * @access protected
         * @return void
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden
            _doing_it_wrong(
                __FUNCTION__,
                __( 'Cheatin&#8217; huh?', 'flagship-library' ),
                '0.1.0'
            );
        }

        /**
         * Main Flagship_Library Instance
         *
         * Insures that only one instance of Flagship_Library exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @since 0.1.0
         * @static
         * @uses   Flagship_Library::includes() Include the required files
         * @return Flagship_Library
         */
        // public static function instance( $args = array() ) {
        //     if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Flagship_Library ) ) {
        //         self::$instance = new Flagship_Library;
        //         self::$instance->dir = trailingslashit( self::$instance->get_library_directory() );
        //         self::$instance->prefix = empty( $args['prefix'] ) ? get_template() : sanitize_key( $args['prefix'] );
        //         self::$instance->includes();
        //         //self::$instance->extensions_includes();
        //         self::$instance->instantiate();
        //         if ( is_admin() ) {
        //             self::$instance->admin_includes();
        //             self::$instance->admin_instantiate();
        //         }
        //     }
        //     return self::$instance;
        // }

        /**
         * Return the correct path to the flagship library directory.
         *
         * @since   0.1.0
         * @access  public
         * @return  string
         */
        public function get_library_directory() {
            return dirname( __FILE__ );
        }



        /**
         * Include required library files.
         *
         * If for some reason you would prefer that a particular file isn't
         * loaded you can use the flagship_library_includes filter to unset it
         * before the includes runs.
         *
         * @since   0.1.0
         * @access  private
         * @return  void
         */
        private function includes() {
            //require_once $this->dir . 'flagship-library/classes/search-form.php';
            //require_once $this->dir . 'flagship-library/functions/seo.php';
            //require_once $this->dir . 'flagship-library/functions/template-entry.php';
            //require_once $this->dir . 'flagship-library/functions/template-general.php';
        }

        /**
         * Include admin library files.
         *
         * If for some reason you would prefer not to enable the admin features
         * in the library, they can be disabled using a filter like so:
         *
         * add_filter( 'flagship_library_disable_admin', '__return_true' );
         *
         * @since   0.1.0
         * @access  private
         * @return  void
         */
        private function admin_includes() {
            if ( apply_filters( 'flagship_library_disable_admin', false ) ) {
                return;
            }
            require_once $this->dir . 'admin/functions/tiny-mce.php';
        }

    }
}

//if ( ! function_exists( 'flagship_library' ) ) {
    /**
     * Grab an instance of the main library class. If you need to reference a
     * method in the class for some reason, do it using this function.
     *
     * Example:
     *
     * <?php flagship_library()->is_customizer_preview(); ?>
     *
     * @since   0.1.0
     * @return  object Flagship_Library
     */
    //function flagship_library() {
   //     return Flagship_Library::instance();
    //}
//}

// Get the library up and running.
//flagship_library();
