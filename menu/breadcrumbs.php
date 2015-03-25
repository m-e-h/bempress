<?php
/**
 * The breadcrumbs template.
 *
 * @package     BEMpress
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.0.0
 */

	// Use Yoast breadcrumbs if they're available.
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb(
			'<nav class="breadcrumbs" itemprop="breadcrumb">',
			'</nav>'
		);
	}
	// Fall back to Hybrid Core breadcrumbs if Yoast isn't available.
	else {
		breadcrumb_trail(
			array(
				'container'     => 'nav',
				'separator'     => '/',
				'show_browse'   => false,
				'show_on_front' => false,
			)
		);
	}
