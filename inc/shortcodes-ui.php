<?php
/**
 * SHORTCAKE
 * https://github.com/fusioneng/Shortcake.
 */
add_action('init', 'meh_add_shortcake');

function meh_add_shortcake() {

    /* Make sure the Shortcake plugin is active. */
if (!function_exists('shortcode_ui_register_for_shortcode')) {
    return;
}
    $bempress_dir = trailingslashit(get_template_directory_uri());

    shortcode_ui_register_for_shortcode(
        'meh_cards',
        [
            'label'         => 'Cards',
            'listItemImage' => '<img width="60px" height="60px" src="'.esc_url($bempress_dir.'images/sidebar-left.svg').'" />',
            // Attribute model expects 'attr', 'type' and 'label'
            // Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
            'attrs' => [
                [
                    'label'   => 'Cards Per Row',
                    'attr'    => 'width',
                    'type'    => 'select',
                    'value'   => 'u-1of1@md',
                    'options' => [
                        'u-1/1@md' => 'One',
                        'u-1/2@md' => 'Two',
                        'u-1/3@md' => 'Three',
                        'u-1/4@md' => 'Four',
                   ],
                    'description' => 'ex. For 2 blocks, side by side you would choose "Two"',
               ],

                [
                    'label'   => 'Card Color',
                    'attr'    => 'card_color',
                    'type'    => 'select',
                    'value'   => 't-bg--white',
                    'options' => [
                        't-bg--white'      => 'White',
                        't-bg--1'          => 'Primary Color',
                        't-bg--2'          => 'Secondary Color',
                        't-bg--grey-light' => 'Neutral',
                   ],
                    'description' => 'Background color of your content card',
               ],

                [
                    'label'   => 'Content to Show',
                    'attr'    => 'show_content',
                    'type'    => 'select',
                    'value'   => 'excerpt',
                    'options' => [
                        'excerpt' => 'Excerpt',
                        'content' => 'Content',
                        'none'    => 'None',
                   ],
               ],

                [
                    'label'    => 'Select Page',
                    'attr'     => 'page',
                    'type'     => 'post_select',
                    'query'    => ['post_type' => 'page'],
                    'multiple' => true,
               ],
           ],
       ]
   );

    /*
     * PANEL
     */
    shortcode_ui_register_for_shortcode(
        'meh_block',
        [
            'label'         => 'Block',
            'listItemImage' => '<img width="60px" height="60px" src="'.esc_url($bempress_dir.'images/sidebar-left.svg').'" />',
            // Attribute model expects 'attr', 'type' and 'label'
            // Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
            'attrs' => [
                [
                    'label'   => 'Icon',
                    'attr'    => 'icon',
                    'type'    => 'select',
                    'options' => [
                        ''         => 'None',
                        'quote'    => 'Quote',
                        'book'     => 'Book',
                        'calendar' => 'Calendar',
                        'church'   => 'Church',
                        'sports'   => 'Sports',
                        'image'    => 'Image',
                        'chat'     => 'Chat',
                        'pencils'  => 'Pencils',
                   ],
                        'description' => 'Don\'t use this if you are using an image.',
               ],

                [
                    'label'   => 'Blocks Per Row',
                    'attr'    => 'width',
                    'type'    => 'select',
                    'value'   => 'u-1of1@md',
                    'options' => [
                        'u-1/1@md' => 'One',
                        'u-1/2@md' => 'Two',
                        'u-1/3@md' => 'Three',
                        'u-1/4@md' => 'Four',
                   ],
                    'description' => 'ex. For 2 blocks, side by side you would choose "Two"',
               ],

                [
                    'label'   => 'Content to Show',
                    'attr'    => 'show_content',
                    'type'    => 'select',
                    'value'   => 'excerpt',
                    'options' => [
                        'excerpt' => 'Excerpt',
                        'content' => 'Content',
                        'none'    => 'None',
                   ],
               ],

                [
                    'label'   => 'Show Featured Image',
                    'attr'    => 'show_image',
                    'type'    => 'select',
                    'value'   => 'show_img',
                    'options' => [
                        'show_img' => 'Show Image',
                        'hide_img' => 'Hide Image',
                   ],
               ],

                [
                    'label'   => 'Block Type',
                    'attr'    => 'block_type',
                    'type'    => 'select',
                    'value'   => 'block',
                    'options' => [
                        'block' => 'Block',
                        'flag'  => 'Panel',
                   ],
                    'multiple'    => false,
                    'description' => '*Block = Large image on top. *Panel = Small image to the left.',
               ],

                [
                    'label'    => 'Select Page',
                    'attr'     => 'page',
                    'type'     => 'post_select',
                    'query'    => ['post_type' => 'page'],
                    'multiple' => true,
               ],
           ],
       ]
   );

    /*
     * Tabs
     */
    shortcode_ui_register_for_shortcode(
        'meh_tabs',
        [
            'label'         => 'Tabs',
            'listItemImage' => 'dashicons-images-alt2',
            'attrs'         => [

                [
                    'label'   => 'Content to Show',
                    'attr'    => 'show_content',
                    'type'    => 'select',
                    'value'   => 'excerpt',
                    'options' => [
                        'excerpt' => 'Excerpt',
                        'content' => 'Content',
                   ],
               ],

                [
                    'label'    => 'Select Page',
                    'attr'     => 'page',
                    'type'     => 'post_select',
                    'query'    => ['post_type' => 'page'],
                    'multiple' => true,
               ],
           ],
       ]
   );

    /*
     * Toggles
     */
    shortcode_ui_register_for_shortcode(
        'meh_toggles',
        [
            'label'         => 'Toggles',
            'listItemImage' => 'dashicons-menu',
            'attrs'         => [

                [
                    'label'   => 'Content to Show',
                    'attr'    => 'show_content',
                    'type'    => 'select',
                    'value'   => 'excerpt',
                    'options' => [
                        'excerpt' => 'Excerpt',
                        'content' => 'Content',
                   ],
               ],

                [
                    'label'    => 'Select Page',
                    'attr'     => 'page',
                    'type'     => 'post_select',
                    'query'    => ['post_type' => 'page'],
                    'multiple' => true,
               ],
           ],
       ]
   );
}
