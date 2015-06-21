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
                        'book' => 'Book',
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
                    'label' => 'Blocks Per Row',
                    'attr'  => 'width',
                    'type' => 'select',
                    'value' => 'u-1of1@md',
                    'options' => array(
                        'u-1/1@md' => 'One',
                        'u-1/2@md' => 'Two',
                        'u-1/3@md' => 'Three',
                        'u-1/4@md' => 'Four',
                    ),
                    'description' => 'ex. For 2 blocks, side by side you would choose "Two"',
                ),

                array(
                    'label' => 'Content to Show',
                    'attr'  => 'show_content',
                    'type' => 'select',
                    'value' => 'excerpt',
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
                    'value' => 'show_img',
                    'options' => array(
                        'show_img' => 'Show Image',
                        'hide_img' => 'Hide Image',
                    ),
                ),

                array(
                    'label' => 'Block Type',
                    'attr'  => 'block_type',
                    'type' => 'select',
                    'value' => 'block',
                    'options' => array(
                        'block' => 'Block',
                        'flag' => 'Panel',
                    ),
                    'multiple' => false,
                    'description' => '*Block = Large image on top. *Panel = Small image to the left.',
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
