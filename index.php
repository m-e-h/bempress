<?php
get_header(); ?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="wrap container" role="document">

    <div class="content row">

        <main <?php hybrid_attr( 'content' ); ?>>
          <?php hybrid_get_content_template(); ?>
        </main><!-- /.main -->

        <?php hybrid_get_sidebar( 'primary' ); ?>

    </div><!-- /.content -->

</div><!-- /.wrap -->

<?php
get_footer();

