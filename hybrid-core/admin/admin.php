<?php
/**
 * Theme administration functions used with other components of the framework admin.  This file is for 
 * setting up any basic features and holding additional admin helper functions.
 *
 * @package    HybridCore
 * @subpackage Admin
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the admin setup function to the 'admin_menu' hook. */
add_action( 'admin_menu', 'hybrid_admin_setup' );

/**
 * Sets up the adminstration functionality for the framework and themes.
 *
 * @since  1.3.0
 * @access public
 * @return void
 */
function hybrid_admin_setup() {

	/* Load the post meta boxes on the new post and edit post screens. */
	add_action( 'load-post.php',     'hybrid_admin_load_post_meta_boxes' );
	add_action( 'load-post-new.php', 'hybrid_admin_load_post_meta_boxes' );
}

/**
 * Loads the core post meta box files on the 'load-post.php' action hook.  Each meta box file is only loaded if 
 * the theme declares support for the feature.
 *
 * @since  1.2.0
 * @access public
 * @return void
 */
function hybrid_admin_load_post_meta_boxes() {

	/* Load the post template meta box. */
	require_if_theme_supports( 'hybrid-core-template-hierarchy', HYBRID_ADMIN . 'meta-box-post-template.php' );

	/* Load the layout meta box. */
	require_if_theme_supports( 'theme-layouts', HYBRID_ADMIN . 'meta-box-post-layout.php' );

	/* Load the post style meta box. */
	require_once( HYBRID_ADMIN . 'meta-box-post-style.php' );
}

/**
 * Function for getting an array of available custom templates with a specific header. Ideally, this function 
 * would be used to grab custom singular post (any post type) templates.  It is a recreation of the WordPress
 * page templates function because it doesn't allow for other types of templates.
 *
 * @since  0.7.0
 * @access public
 * @global object $hybrid
 * @param  string $post_type      The name of the post type to get templates for.
 * @return array  $post_templates The array of templates.
 */
function hybrid_get_post_templates( $post_type = 'post' ) {
	global $hybrid;

	/* If templates have already been called, just return them. */
	if ( !empty( $hybrid->post_templates ) && isset( $hybrid->post_templates[ $post_type ] ) )
		return $hybrid->post_templates[ $post_type ];

	/* Else, set up an empty array to house the templates. */
	else
		$hybrid->post_templates = array();

	/* Set up an empty post templates array. */
	$post_templates = array();

	/* Get the post type object. */
	$post_type_object = get_post_type_object( $post_type );

	/* Get the theme (parent theme if using a child theme) object. */
	$theme = wp_get_theme( get_template() );

	/* Get the theme PHP files one level deep. */
	$files = (array) $theme->get_files( 'php', 1 );

	/* If a child theme is active, get its files and merge with the parent theme files. */
	if ( is_child_theme() ) {
		$child       = wp_get_theme();
		$child_files = (array) $child->get_files( 'php', 1 );
		$files       = array_merge( $files, $child_files );
	}

	/* Loop through each of the PHP files and check if they are post templates. */
	foreach ( $files as $file => $path ) {

		/* Get file data based on the post type singular name (e.g., "Post Template", "Book Template", etc.). */
		$headers = get_file_data(
			$path,
			array( 
				"{$post_type_object->name} Template" => "{$post_type_object->name} Template",
			)
		);

		/* Continue loop if the header is empty. */
		if ( empty( $headers["{$post_type_object->name} Template"] ) )
			continue;

		/* Add the PHP filename and template name to the array. */
		$post_templates[ $file ] = $headers["{$post_type_object->name} Template"];
	}

	/* Add the templates to the global $hybrid object. */
	$hybrid->post_templates[ $post_type ] = array_flip( $post_templates );

	/* Return array of post templates. */
	return $hybrid->post_templates[ $post_type ];
}

/**
 * Gets the stylesheet files within the parent or child theme and checks if they have the 'Style Name' 
 * header. If any files are found, they are returned in an array.
 *
 * @since  3.0.0
 * @access public
 * @global object  $hybrid
 * @return array
 */
function hybrid_get_post_styles( $post_type = 'post' ) {
	global $hybrid;

	/* If stylesheets have already been loaded, return them. */
	if ( !empty( $hyrid->post_stylesheets ) && isset( $hybrid->post_stylesheets[ $post_type ] ) )
		return $hybrid->post_stylesheets[ $post_type ];

	/* Set up an empty styles array. */
	$hybrid->post_stylesheets[ $post_type ] = array();

	/* Get the theme object. */
	$theme = wp_get_theme();

	/* Get the theme CSS files two levels deep. */
	$files = (array) $theme->get_files( 'css', 2, true );

	/* Loop through each of the CSS files and check if they are styles. */
	foreach ( $files as $file => $path ) {

		/* Get file data based on the 'Style Name' header. */
		$headers = get_file_data(
			$path, 
			array( 
				'Style Name'         => 'Style Name',
				"{$post_type} Style" => "{$post_type} Style"
			) 
		);

		/* Add the CSS filename and template name to the array. */
		if ( !empty( $headers['Style Name'] ) )
			$hybrid->post_stylesheets[ $post_type ][ $file ] = $headers['Style Name'];

		elseif ( !empty( $headers["{$post_type} Style"] ) )
			$hybrid->post_stylesheets[ $post_type ][ $file ] = $headers["{$post_type} Style"];
	}

	/* Flip the array of styles. */
	$hybrid->post_stylesheets[ $post_type ] = array_flip( $hybrid->post_stylesheets[ $post_type ] );

	/* Return array of styles. */
	return $hybrid->post_stylesheets[ $post_type ];
}
