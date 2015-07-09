<form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">

    <label class="screen-reader-text">
        <?php _e('Search for:', 'bempress'); ?>
    </label>

    <div class="input-group">

        <input type="search" value="<?= get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'bempress'); ?> <?php bloginfo('name'); ?>" required>

        <span class="input-group-btn">
            <button type="submit" class="search-submit btn button--raised button--colored rounded-right">
            <i class="material-icons"><?php _e('&#xE8B6;', 'bempress'); ?></i>
            </button>
        </span>

    </div>

</form>
