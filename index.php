<?php
get_header(); ?>

<?php get_template_part('components/page', 'header'); ?>

<div <?php hybrid_attr( 'container', 'content' ); ?>>

    <div <?php hybrid_attr( 'row', 'layout' ); ?>>

        <main <?php hybrid_attr( 'content' ); ?>>
            <?php hybrid_get_content_template(); ?>
        </main><!-- /.main -->

        <?php hybrid_get_sidebar( 'primary' ); ?>

    </div><!-- /.content -->

</div><!-- /.wrap -->

<?php
get_footer();

