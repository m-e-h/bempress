<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package bempress
 */


add_action( 'customizer_library_styles', 'customizer_library_bempress_styles' );

add_action( 'wp_head', 'bempress_display_customizations', 11 );



if ( ! function_exists( 'customizer_library_bempress_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_bempress_styles() {

	// Primary Color
	$setting = 'primary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

	$color = sanitize_hex_color( $mod );
	$rgb = join( ', ', hybrid_hex_to_rgb( $color ) );

		$simple_color_adjuster = new Simple_Color_Adjuster;
		$color50 	= $simple_color_adjuster->lighten( $color, 45 );
		$color100 	= $simple_color_adjuster->lighten( $color, 40 );
		$color200 	= $simple_color_adjuster->lighten( $color, 30 );
		$color300 	= $simple_color_adjuster->lighten( $color, 20 );
		$color400 	= $simple_color_adjuster->lighten( $color, 10 );
		$color500 	= $color;
		$color600 	= $simple_color_adjuster->darken( $color, 10 );
		$color700 	= $simple_color_adjuster->darken( $color, 20 );
		$color800 	= $simple_color_adjuster->darken( $color, 30 );
		$color900 	= $simple_color_adjuster->darken( $color, 40 );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'.entry-content a'
			],
			'declarations' => [
				'color' => $color600
			]
		] );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'.t-bg__1'
			],
			'declarations' => [
				'background-color' => $color500
			]
		] );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'.t-bg__1--light'
			],
			'declarations' => [
				'background-color' => $color400
			]
		] );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'.t-bg__1--dark'
			],
			'declarations' => [
				'background-color' => $color600
			]
		] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__1'
            ],
            'declarations' => [
                'fill' => $color500
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__1--light'
            ],
            'declarations' => [
                'fill' => $color400
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__1--dark'
            ],
            'declarations' => [
                'fill' => $color600
            ]
        ] );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'.comment-reply-link,
				button,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.button'
			],
			'declarations' => [
				'background-color' => $color500
			]
		] );


		Customizer_Library_Styles()->add( [
			'selectors' => [
				'button:hover,
				.comment-reply-link:hover,
				input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
				.button:hover'
			],
			'declarations' => [
				'background-color' => $color600
			]
		] );

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'input[type="email"]:focus,
				input[type="number"]:focus,
				input[type="search"]:focus,
				input[type="text"]:focus,
				input[type="tel"]:focus,
				input[type="url"]:focus,
				input[type="password"]:focus,
				textarea:focus,
				select:focus'
			],
			'declarations' => [
				'border-color' => $color500
			]
		] );

	}




	// Secondary Color
	$setting = 'secondary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );
		$rgb = join( ', ', hybrid_hex_to_rgb( $color ) );

		$simple_color_adjuster = new Simple_Color_Adjuster;
		$color50 	= $simple_color_adjuster->lighten( $color, 45 );
		$color100 	= $simple_color_adjuster->lighten( $color, 40 );
		$color200 	= $simple_color_adjuster->lighten( $color, 30 );
		$color300 	= $simple_color_adjuster->lighten( $color, 20 );
		$color400 	= $simple_color_adjuster->lighten( $color, 10 );
		$color500 	= $color;
		$color600 	= $simple_color_adjuster->darken( $color, 10 );
		$color700 	= $simple_color_adjuster->darken( $color, 20 );
		$color800 	= $simple_color_adjuster->darken( $color, 30 );
		$color900 	= $simple_color_adjuster->darken( $color, 40 );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__2'
            ],
            'declarations' => [
                'background-color' => $color500
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__2--light'
            ],
            'declarations' => [
                'background-color' => $color400
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__2--dark'
            ],
            'declarations' => [
                'background-color' => $color600
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__2'
            ],
            'declarations' => [
                'fill' => $color500
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__2--light'
            ],
            'declarations' => [
                'fill' => $color400
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__2--dark'
            ],
            'declarations' => [
                'fill' => $color600
            ]
        ] );

	}




    // Secondary Color
    $setting = 'accent-color';
    $mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

    if ( $mod !== customizer_library_get_default( $setting ) ) {

        $color = sanitize_hex_color( $mod );
        $rgb = join( ', ', hybrid_hex_to_rgb( $color ) );

        $simple_color_adjuster = new Simple_Color_Adjuster;
        $color50    = $simple_color_adjuster->lighten( $color, 45 );
        $color100   = $simple_color_adjuster->lighten( $color, 40 );
        $color200   = $simple_color_adjuster->lighten( $color, 30 );
        $color300   = $simple_color_adjuster->lighten( $color, 20 );
        $color400   = $simple_color_adjuster->lighten( $color, 10 );
        $color500   = $color;
        $color600   = $simple_color_adjuster->darken( $color, 10 );
        $color700   = $simple_color_adjuster->darken( $color, 20 );
        $color800   = $simple_color_adjuster->darken( $color, 30 );
        $color900   = $simple_color_adjuster->darken( $color, 40 );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__3'
            ],
            'declarations' => [
                'background-color' => $color500
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__3--light'
            ],
            'declarations' => [
                'background-color' => $color400
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-bg__3--dark'
            ],
            'declarations' => [
                'background-color' => $color600
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__3'
            ],
            'declarations' => [
                'fill' => $color500
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__3--light'
            ],
            'declarations' => [
                'fill' => $color400
            ]
        ] );

        Customizer_Library_Styles()->add( [
            'selectors' => [
                '.t-fill__3--dark'
            ],
            'declarations' => [
                'fill' => $color600
            ]
        ] );

    }




	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'body, .site-container'
			],
			'declarations' => [
				'font-family' => $stack
			]
		] );
	}




	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( [
			'selectors' => [
				'h1, h2, h3, h4, h5, h6, .site-title, .entry-title, .widget-title, .dropcap:first-letter'
			],
			'declarations' => [
				'font-family' => $stack
			]
		] );

	}

}
endif;




if ( ! function_exists( 'bempress_display_customizations' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can
 * print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function bempress_display_customizations() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"bempress-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;
