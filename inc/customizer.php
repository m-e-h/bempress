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




function bempress_customize_register( $wp_customize ) {

    // Customize title and tagline sections and labels
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';




    // Customize the Front Page Settings
    $wp_customize->get_section('static_front_page')->title = esc_html__('Homepage Preferences', 'bempress');
    $wp_customize->get_section('static_front_page')->priority = 20;
    $wp_customize->get_control('show_on_front')->label = esc_html__('Choose Homepage Preference', 'bempress');
    $wp_customize->get_control('page_on_front')->label = esc_html__('Select Homepage', 'bempress');
    $wp_customize->get_control('page_for_posts')->label = esc_html__('Select Blog Homepage', 'bempress');




    // Customize Background Settings
    $wp_customize->get_setting( 'background_color' )->transport  = 'postMessage';
    $wp_customize->get_section('background_image')->title = esc_html__('Background Styles', 'bempress');
    $wp_customize->get_control('background_color')->section = 'background_image';




    // Customize Header Image Settings
    $wp_customize->add_section(
        'header_text_styles',
        array(
            'title'      => esc_html__('Header Styles','bempress'),
            'priority'   => 20
        )
    );
    //$wp_customize->get_section('header_image')->panel = 'design_settings';
    $wp_customize->get_control('display_header_text')->section = 'header_text_styles';
    $wp_customize->get_control('header_textcolor')->section = 'header_text_styles';
    $wp_customize->get_control('header_textcolor')->label = esc_html__('Site Title Color', 'bempress');
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Theme layouts
    $wp_customize->get_setting( 'theme_layout' )->transport = 'refresh';

    // Add Custom Logo Settings
    $wp_customize->add_section(
        'branding',
        array(
            'title'      => esc_html__('Branding','bempress'),
            'priority'   => 20
        )
    );
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
               'section'    => 'branding',
               'settings'   => 'bempress_logo',
               'context'    => 'bempress-custom-logo'
           )
       )
    );




  // Add Custom Footer Text
  $wp_customize->add_section( 'custom_footer_text' , array(
    'title'      => esc_html__('Your Footer Text','bempress'),
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




    // Add Primary Color
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#020042',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'       => esc_html__( 'Primary Color', 'bempress' ),
                'section'     => 'branding',
            )
        )
    );




    // Add Secondary Color
    $wp_customize->add_setting(
        'secondary_color',
        array(
            'default'           => '#FFE192',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
                'label'       => esc_html__( 'Secondary Color', 'bempress' ),
                'section'     => 'branding',
                //'priority'    => 40,
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
