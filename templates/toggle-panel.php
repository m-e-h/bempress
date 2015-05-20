    <?php if ( is_active_sidebar( 'panel-one' ) ) : ?>
        <div id="one-toggle-nav" class="panel panel-one t-bg__frost shadow--z3">
            <div <?php hybrid_attr( 'wrap', 'u-pt' ); ?>>
        <i class="panel-close close-btn alignright fa fa-times-circle"></i>
                <?php hybrid_get_sidebar( 'panel-one' ); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'panel-two' ) ) : ?>
        <div id="two-toggle-nav" class="panel panel-two t-bg__frost shadow--z3">
            <div <?php hybrid_attr( 'wrap', 'u-pt' ); ?>>
        <i class="panel-close2 close-btn alignright fa fa-times-circle"></i>
                <?php hybrid_get_sidebar( 'panel-two' ); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'panel-three' ) ) : ?>
        <div id="three-toggle-nav" class="panel panel-three t-bg__frost shadow--z3">
            <div <?php hybrid_attr( 'wrap', 'u-pt' ); ?>>
        <i class="panel-close2 close-btn alignright fa fa-times-circle"></i>
                <?php hybrid_get_sidebar( 'panel-three' ); ?>
            </div>
        </div>
    <?php endif; ?>
