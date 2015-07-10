<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head <?php hybrid_attr('head'); ?>>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php wp_head(); ?>
</head>
<body <?php hybrid_attr('body'); ?>>

    <!--[if lt IE 10]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://whatbrowser.org">Upgrade your browser</a> for a safer and more enjoyable web experience.</p>
    <![endif]-->

    <header <?php hybrid_attr('header'); ?>>

            <div <?php hybrid_attr('branding'); ?>>
                <?php hybrid_site_title(); ?>
                <?php hybrid_site_description(); ?>
            </div>

            <?php hybrid_get_menu('primary'); ?>

    </header>
