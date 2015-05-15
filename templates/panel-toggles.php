<div class="toggles grid u-1of1@sm">

    <?php if ( is_active_sidebar( 'panel-parishes' ) ) : ?>

        <div id="parish-toggle" class="toggle grid__item button--tab" title="<?php esc_attr_e( 'Parishes', 'doc' ); ?>">

            <?php get_template_part( 'images/vector/svg', 'church' ); ?>

            <span class="toggle__title"><?php _e( 'Parishes', 'doc' ); ?></span>

        </div><!-- #parish-toggle -->

    <?php endif; ?>

    <?php if ( is_active_sidebar( 'panel-schools' ) ) : ?>

        <div id="schools-toggle" class="toggle grid__item button--tab" title="<?php esc_attr_e( 'Schools', 'doc' ); ?>">

            <?php get_template_part( 'images/vector/svg', 'school' ); ?>

            <span class="toggle__title"><?php _e( 'Schools', 'doc' ); ?></span>

        </div><!-- #schools-toggle -->

    <?php endif; ?>

    <?php if ( has_nav_menu( 'panel-dpc' ) ) : ?>

    <div id="dpc-toggle" class="toggle grid__item button--tab" title="<?php esc_attr_e( 'Pastoral Center', 'doc' ); ?>">

        <?php get_template_part( 'images/vector/svg', 'sports' ); ?>

        <span class="toggle__title"><?php _e( 'Athletics', 'doc' ); ?></span>

    </div><!-- #dpc-toggle -->

    <?php endif; ?>

</div><!-- .toggles -->
