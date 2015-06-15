<header <?php hybrid_attr( 'header' ); ?>>
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <?php hybrid_get_menu( 'primary' ); ?>
  </div>
</header>
