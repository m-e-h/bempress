<?php
/**
 * The breadcrumbs template.
 *
 * @package     BEMpress
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
		breadcrumb_trail( [
    		'container'     => 'nav',
    		'separator'     => '&#xf105;',
    		'show_browse'   => false,
    		'show_on_front' => false,
		] );
	}
