<div class="page-header">
    
    <?php if ( ! hybrid_is_plural ) : // If not home, archive, search ?>
    
        <h1><?= get_the_title(); ?></h1>
    
    <?php else : ?>
    
	    <?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	    ?>
    
    <?php endif; ?>
    
</div>
