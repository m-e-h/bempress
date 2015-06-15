<?php

use Roots\Sage\Config;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <?php get_template_part('templates/head'); ?>
    <body <?php hybrid_attr( 'body' ); ?>>
        <?php get_header(); ?>
        <div class="wrap container" role="document">
            <div class="content row">
                <main <?php hybrid_attr( 'content' ); ?>>
                  <?php hybrid_get_content_template(); ?>
                </main><!-- /.main -->
                <?php hybrid_get_sidebar( 'primary' ); ?>
            </div><!-- /.content -->
        </div><!-- /.wrap -->
        <?php get_footer(); ?>
    </body>
</html>
