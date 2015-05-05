    <?php if ( is_active_sidebar( 'panel-parishes' ) ) : ?>
        <div id="parishes-toggle-nav" class="panel panel-parishes t-bg__frost shadow--z3">
            <div <?php hybrid_attr( 'wrap', 'u-pt' ); ?>>
                <?php hybrid_get_sidebar( 'panel-parishes' ); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'panel-schools' ) ) : ?>
        <div id="schools-toggle-nav" class="panel panel-schools t-bg__frost shadow--z3">
            <div <?php hybrid_attr( 'wrap', 'u-pt' ); ?>>
                <?php hybrid_get_sidebar( 'panel-schools' ); ?>
            </div>
        </div>
    <?php endif; ?>
    <div id="dpc-toggle-nav" class="panel panel-dpc t-bg__frost shadow--z3">
        <div <?php hybrid_attr( 'wrap', 'panel' ); ?>>
            <?php hybrid_get_menu( 'panel-dpc' ); ?>
        </div>
    </div>
