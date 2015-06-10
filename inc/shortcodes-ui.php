<?php
/**
 * SHORTCAKE
 * https://github.com/fusioneng/Shortcake
 */

add_action( 'init', 'meh_add_shortcake' );

function meh_add_shortcake() {

    /* Make sure the Shortcake plugin is active. */
if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) )
    return;

    /**
     * PANEL
     */
    shortcode_ui_register_for_shortcode(
        'meh_block',
        array(
            'label' => 'Block',
            'listItemImage' => 'dashicons-slides',
            // Attribute model expects 'attr', 'type' and 'label'
            // Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
            'attrs' => array(
                array(
                    'label' => 'Icon',
                    'attr'  => 'icon',
                    'type' => 'select',
                    'options' => array(
                        '' => 'None',
                        'quote' => 'Quote',
                        'calendar' => 'Calendar',
                        'church' => 'Church',
                        'sports' => 'Sports',
                        'image' => 'Image',
                        'chat' => 'Chat',
                        'pencils' => 'Pencils',
                    ),
                        'description' => 'Don\'t use this if you are using an image.',
                ),

                array(
                    'label' => 'Width',
                    'attr'  => 'width',
                    'type' => 'select',
                    'options' => array(
                        'u-1of1@md' => 'Full Width',
                        'u-1of2@md' => 'One Half',
                        'u-1of3@md' => 'One Third',
                    ),
                ),

                array(
                    'label' => 'Content to Show',
                    'attr'  => 'show_content',
                    'type' => 'select',
                    'options' => array(
                        'excerpt' => 'Excerpt',
                        'content' => 'Content',
                        'none' => 'None',
                    ),
                ),

                array(
                    'label' => 'Show Featured Image',
                    'attr'  => 'show_image',
                    'type' => 'select',
                    'options' => array(
                        'show_img' => 'Show Image',
                        'hide_img' => 'Hide Image',
                    ),
                ),

                array(
                    'label' => 'Block Type',
                    'attr'  => 'block_type',
                    'type' => 'select',
                    'options' => array(
                        'block' => 'Block',
                        'flag' => 'Panel',
                    ),
                ),

                array(
                    'label'    => 'Select Page',
                    'attr'     => 'page',
                    'type'     => 'post_select',
                    'query'    => array( 'post_type' => 'page' ),
                    'multiple' => true,
                ),
            ),
        )
    );

}
