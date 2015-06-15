<!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://whatbrowser.org">Upgrade your browser</a> for a safer and more enjoyable web experience.</p>
<![endif]-->
<header <?php hybrid_attr( 'header' ); ?>>
    <div class="container">
        <div <?php hybrid_attr( 'branding' ); ?>>
            <?php hybrid_site_title(); ?>
            <?php hybrid_site_description(); ?>
        </div>
        <?php hybrid_get_menu( 'primary' ); ?>
    </div>
</header>
