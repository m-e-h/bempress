<article <?php hybrid_attr( 'post' ); ?>>

<?php if ( is_singular( get_post_type() ) ) : ?>

<?php while (have_posts()) : the_post(); ?>
    <header>
      <h1 <?php hybrid_attr( 'entry-title' ); ?>><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div <?php hybrid_attr( 'entry-content' ); ?>>
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
<?php endwhile; ?>

<?php else : // If not viewing a single post. ?>

  <header>
    <h2 <?php hybrid_attr( 'entry-title' ); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div <?php hybrid_attr( 'entry-summary' ); ?>>
    <?php the_excerpt(); ?>
  </div>

<?php endif; // End single post check. ?>

</article>
