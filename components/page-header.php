<?php use Bempress\Titles; ?>

<div <?php hybrid_attr( 'archive-header' ); ?>>

    <?php hybrid_get_menu( 'breadcrumbs' ); ?>

    <h1 <?php hybrid_attr( 'entry-title' ); ?>><?= Titles\title(); ?></h1>
</div>
