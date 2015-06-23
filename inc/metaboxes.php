<?php
    /**
     * Page extra wysiwyg
     */

add_action('add_meta_boxes', 'bempress_add_extra_wysiwyg');
add_action('save_post', 'bempress_save_extra_wysiwyg', 1, 2);




// Create a metabox
function bempress_add_extra_wysiwyg() {
    add_meta_box('bempress_add_extra_wysiwyg_field', 'Additional Content Blocks', 'bempress_add_extra_wysiwyg_field', 'page', 'normal', 'high');
}




// Add checkbox to the metabox
function bempress_add_extra_wysiwyg_field() {
    global $post;
    // Get checkedbox value
    $extra_wysiwyg = stripslashes(get_post_meta($post->ID, 'bempress_extra_wysiwyg', true));
    $settings = array(
        'textarea_name' => 'bempress_extra_wysiwyg',
        'textarea_rows' => 8,
        'media_buttons' => true,
        'wpautop' => false,
        'teeny' => true,
        'quicktags' => false,
    );
    // Insert editor
    wp_editor($extra_wysiwyg, 'bempress_extra_wysiwyg', $settings);
    ?>
    <label class="description" for="landing_cta"><?php _e('Content Blocks can be added by selecting <kbd>Add Media</kbd> > <kbd>Insert Post Element</kbd>', 'bempress'); ?></label>
    <?php
    // Security field
    wp_nonce_field('bempress-add-page-wysiwyg-nonce', 'bempress-add-page-wysiwyg-process');
}




// Save checkbox data
function bempress_save_extra_wysiwyg($post_id, $post) {
    // Verify data came from edit screen
    if (!wp_verify_nonce($_POST['bempress-add-page-wysiwyg-process'], 'bempress-add-page-wysiwyg-nonce')) {
        return $post->ID;
    }
    // Verify user has permission to edit post
    if (!current_user_can('edit_post', $post->ID)) {
        return $post->ID;
    }
    // Update data in database
    $wysiwyg = $_POST['bempress_extra_wysiwyg'];
    if (isset($wysiwyg)) {
        update_post_meta($post->ID, 'bempress_extra_wysiwyg', wp_filter_post_kses($wysiwyg));
    } else {
        delete_post_meta($post->ID, 'bempress_extra_wysiwyg');
    }
}




function bempress_wysiwyg_output($meta_key, $post_id = 0) {
    global $wp_embed;

    $post_id = $post_id ? $post_id : get_the_id();
    $content = get_post_meta($post_id, $meta_key, 1);
    $content = $wp_embed->autoembed($content);
    $content = $wp_embed->run_shortcode($content);
    $content = do_shortcode($content);

    return $content;
}
