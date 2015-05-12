<?php
/**
 * Customize control class to handle theme layouts.  By default, it simply outputs a custom set of 
 * radio inputs.  Theme authors can extend this class and do something even cooler.
 *
 * @package    Hybrid
 * @subpackage Classes
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Theme Layout customize control class.
 *
 * @since  3.0.0
 * @access public
 */
class Hybrid_Customize_Control_Theme_Layout extends WP_Customize_Control {

	/**
	 * Set up our control.
	 *
	 * @since  3.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$choices = array();

		/* Loop through each of the layouts and add it to the choices array with proper key/value pairs. */
		foreach ( hybrid_get_layouts() as $layout ) {

			if ( 'theme_layout' !== $id || true === $layout->is_global_layout )
				$choices[ $layout->name ] = $layout->label;
		}

		/* Override specific arguments. */
		$args['type']    = 'radio';
		$args['choices'] = $choices;

		/* Let WP handle this. */
		parent::__construct( $manager, $id, $args );
	}
}
