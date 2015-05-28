<?php
/**
 * bempress Theme Customizer
 *
 * @package bempress
 */

// function wpt_register_theme_customizer( $wp_customize ) {

//     var_dump( $wp_customize );

// }
// add_action( 'customize_register', 'wpt_register_theme_customizer' );


add_action( 'customize_register', 'bempress_customize_register' );
add_action( 'customize_preview_init', 'bempress_customizer_js' );
add_action( 'wp_enqueue_scripts', 'bempress_google_fonts' );




function bempress_customize_register( $wp_customize ) {

    // Customize title and tagline sections and labels
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_control('page_for_posts')->label = esc_html__('Blog page', 'bempress');




    // Customize Background Settings
    $wp_customize->get_setting( 'background_color' )->transport  = 'postMessage';
    //$wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'bempress');
    $wp_customize->get_control('background_color')->section = 'background_image';
    $wp_customize->get_section('background_image')->title = esc_html__('Background', 'bempress');
    $wp_customize->get_control('header_textcolor')->section = 'title_tagline';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Theme layouts
    $wp_customize->get_setting( 'theme_layout' )->transport = 'refresh';


    $wp_customize->add_setting(
      'bempress_logo',
      array(
        'default'     => '',
        //'transport'   => 'postMessage'
      )
    );
    $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => esc_html__( 'Your Logo', 'bempress' ),
               'section'    => 'title_tagline',
               'settings'   => 'bempress_logo',
               'context'    => 'bempress-custom-logo'
           )
       )
    );




  // Add Custom Footer Text
  $wp_customize->add_section( 'custom_footer_text' , array(
    'title'      => esc_html__('Footer Text','bempress'),
    'priority'   => 1000
  ) );
  $wp_customize->add_setting(
      'bempress_footer_text',
      array(
          'default'           => esc_html__( 'Custom footer text', 'bempress' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_footer_text',
            array(
                'label'          => esc_html__( 'Footer Text', 'bempress' ),
                'section'        => 'custom_footer_text',
                'settings'       => 'bempress_footer_text',
                'type'           => 'text'
            )
        )
   );


  //Typography

    $wp_customize->add_section( 'custom_typography' , array(
        'title'      => esc_html__('Typography','bempress'),
        'priority'   => 80
    ) );

    /* Adds the heading font setting. */
    $wp_customize->add_setting(
        'heading_font',
        array(
            'default'              => get_theme_mod( 'heading_font', 'default' ),
            'type'                 => 'theme_mod',
            'sanitize_callback'    => 'esc_attr',
            'sanitize_js_callback' => 'esc_attr',
            //'transport'            => 'postMessage',
        )
    );
    /* Adds the heading font control. */
    $wp_customize->add_control(
        'bempress-heading-font',
        array(
            'label'    => esc_html__( 'Heading Font', 'bempress' ),
            'section'  => 'custom_typography',
            'settings' => 'heading_font',
            'type'     => 'select',
            'choices'  => customizer_library_get_font_choices()
        )
    );

    /* Adds the body font setting. */
    $wp_customize->add_setting(
        'body_font',
        array(
            'default'              => get_theme_mod( 'body_font', 'default' ),
            'type'                 => 'theme_mod',
            'sanitize_callback'    => 'esc_attr',
            'sanitize_js_callback' => 'esc_attr',
            //'transport'            => 'postMessage',
        )
    );
    /* Adds the body font control. */
    $wp_customize->add_control(
        'bempress-body-font',
        array(
            'label'    => esc_html__( 'Body Font', 'bempress' ),
            'section'  => 'custom_typography',
            'settings' => 'body_font',
            'type'     => 'select',
            'choices'  => customizer_library_get_font_choices()
        )
    );





$wp_customize->add_setting(
    'category_layout',
    array(
        'default'           => get_theme_mod( 'category_layout', '' ),
        'sanitize_callback' => 'sanitize_html_class',
        'transport'         => 'refresh'
    )
);

$wp_customize->add_control(
    new Hybrid_Customize_Control_Theme_Layout(
        $wp_customize,
        'category_layout',
        array(
            'label'    => esc_html__( 'Multi-Post Layout', 'hybrid-core' ),
            'section'  => 'layout',
            'layouts'  => array( 'cards', 'blog' )
        )
    )
);


}





// Custom js for theme customizer
function bempress_customizer_js() {
  wp_enqueue_script(
    'bempress_theme_customizer',
    get_template_directory_uri() . '/inc/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}




/**
 * Enqueue Google Fonts
 */

// Register Style
function bempress_google_fonts() {

    $fonts = array(
        get_theme_mod( 'heading_font', 'default' ),
        get_theme_mod( 'body_font', 'default' )
    );
    $font_uri = customizer_library_get_google_font_uri( $fonts );

    wp_register_style( 'google_font_headings', $font_uri, false, false );
    wp_enqueue_style( 'google_font_headings' );

}


