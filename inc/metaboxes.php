<?php
/**
 * Page extra wysiwyg.
 */
add_action('edit_page_form', 'bempress_add_extra_wysiwyg_field');
add_action('save_post', 'bempress_save_extra_wysiwyg', 1, 2);

function bempress_add_extra_wysiwyg_field()
{
    global $post;

    $extra_wysiwyg = stripslashes(get_post_meta($post->ID, 'bempress_extra_wysiwyg', true));
    $settings = array(
        'textarea_name' => 'bempress_extra_wysiwyg',
        'media_buttons' => true,
        'tinymce' => array(
            'toolbar1' => ' '),
    );
    
    // Insert editor
    wp_editor($extra_wysiwyg, 'bempress_extra_wysiwyg', $settings);
    ?>
    <label class="description" for="extra_wysiwyg"><?php _e('Content Blocks may be added by selecting <kbd>Add Media</kbd> then <kbd>Insert Post Element</kbd>', 'bempress');
    ?></label>
    <?php
    // Security field
    wp_nonce_field('bempress-add-page-wysiwyg-nonce', 'bempress-add-page-wysiwyg-process');
}

function bempress_save_extra_wysiwyg($post_id, $post)
{
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

function bempress_wysiwyg_output($meta_key, $post_id = 0)
{
    global $wp_embed;
    $post_id = $post_id ? $post_id : get_the_id();
    $content = get_post_meta($post_id, $meta_key, 1);
    $content = $wp_embed->autoembed($content);
    $content = $wp_embed->run_shortcode($content);
    $content = do_shortcode($content);

    return $content;
}
