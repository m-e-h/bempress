<?php
/**
 * Defines customizer options
 *
 * @package bempress
 */

add_action( 'init', 'customizer_library_bempress_options' );


function customizer_library_bempress_options() {

	// Theme defaults
	$primary_color 		= '#476FBA';
	$secondary_color 	= '#3DC273';
    $accent_color       = '#FF9E03';

	// Stores all the controls that will be added
	$options = [];

	// Stores all the sections to be added
	$sections = [];

	// Stores all the panels to be added
	$panels = [];

	// Adds the sections to the $options array
	$options['sections'] = $sections;




	// Colors
	$section = 'colors';

	$sections[] = [
		'id' => $section,
		'title' => __( 'Colors', 'bempress' ),
		'priority' => '80'
	];

	$options['primary-color'] = [
		'id' => 'primary-color',
		'label'   => __( 'Primary Color', 'bempress' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	];

	$options['secondary-color'] = [
		'id' => 'secondary-color',
		'label'   => __( 'Secondary Color', 'bempress' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	];

    $options['accent-color'] = [
        'id' => 'accent-color',
        'label'   => __( 'Accent Color', 'bempress' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $accent_color,
    ];




	// Action Panel
	$section = 'action-panels';
	$sections[] = [
		'id' => $section,
		'title' => __( 'Action Panels', 'bempress' ),
		'priority' => '90',
		'description' => __( 'Menu-bar for the dropdown widgets.', 'bempress' )
	];
	$options['panel-one-title'] = [
		'id' => 'panel-one-title',
		'label'   => __( 'Panel One Title', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	$options['panel-one-toggle-icon'] = [
		'id' => 'panel-one-toggle-icon',
		'label'   => __( 'Panel One Toggle Icon', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	$options['panel-two-title'] = [
		'id' => 'panel-two-title',
		'label'   => __( 'Panel Two Title', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	$options['panel-two-toggle-icon'] = [
		'id' => 'panel-two-toggle-icon',
		'label'   => __( 'Panel Two Toggle Icon', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	$options['panel-three-title'] = [
		'id' => 'panel-three-title',
		'label'   => __( 'Panel Three Title', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	$options['panel-three-toggle-icon'] = [
		'id' => 'panel-three-toggle-icon',
		'label'   => __( 'Panel Three Toggle Icon', 'bempress' ),
		'section' => $section,
		'type'    => 'text',
	];
	
	
	// Typography
	$section = 'typography';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = [
		'id' => $section,
		'title' => __( 'Typography', 'bempress' ),
		'priority' => '80'
	];

	$options['primary-font'] = [
		'id' => 'primary-font',
		'label'   => __( 'Body Font', 'bempress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'sans-serif'
	];

	$options['secondary-font'] = [
		'id' => 'secondary-font',
		'label'   => __( 'Heading Font', 'bempress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'serif'
	];



	// Footer Settings
	$section = 'footer';

	$sections[] = [
		'id' => $section,
		'title' => __( 'Footer', 'bempress' ),
		'priority' => '100'
	];
	$options['footer-text'] = [
		'id' => 'footer-text',
		'label'   => __( 'Footer Text', 'bempress' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => bempress_get_default_footer_text(),
	];

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
