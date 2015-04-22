<?php
/**
 * @package Abraham
 */
?>

<div <?php hybrid_attr( 'entry-summary' ); ?>>

<?php
	if ( ! post_password_required() ) {
		the_excerpt( sprintf(
            __( 'Continue reading %s', 'yourtheme' ),
            the_title( '<span class="screen-reader-text">', '</span>', false )
        ) );
	}
?>

</div>
