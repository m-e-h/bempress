<?php
/**
 * Add classes to hybrid attributs.
 *
 * @package Abraham
 */


class AttrTrumps {

	/* Attributes for major structural elements. */
	public $body                  		= '';	// get_body_class()
	public $site_container    			= '';	// site-container
	public $site_inner   				= ' grid grid--flex u-mt- u-mt@md u-mt+@lg';	// site-inner
	public $site_inner_full_width		= ' ';
	public $site_inner_single_column 	= ' wrap';
	public $site_inner_sidebar_right 	= ' wrap';
	public $site_inner_sidebar_left 	= ' wrap grid--rev';
	public $wrap                		= '';
    public $action_bar_wrap             = ' wrapper--wide shadow--z2 t-bg__1--glass flex flex--row grid--right';
	public $hero_wrap                	= ' wrapper--wide u-p-';
	public $header                		= ' t-bg__tint'; 	// site-header
	public $footer                		= ' t-bg__1'; 	// site-footer
	public $content 					= ' grid__item'; 	// content
	public $content_full_width			= ' u-1of1'; 	// content
	public $content_single_column 		= ' u-1of1'; 	// content
	public $content_sidebar_right 		= ' u-2of3@md u-pr@md u-pr+@lg'; 	// content
	public $content_sidebar_left 		= ' u-2of3@md u-pl@md u-pl+@lg'; 	// content
	public $main                		= ' ';
	public $sidebar 					= ' grid__item';	// sidebar sidebar__{$context}
	public $sidebar_full_width  		= ' u-1of1';	// sidebar sidebar__{$context}
	public $sidebar_single_column  		= ' u-1of1';	// sidebar sidebar__{$context}
	public $sidebar_sidebar_right 		= ' u-1of3@md';	// sidebar sidebar__{$context}
	public $sidebar_sidebar_left		= ' u-1of3@md';	// sidebar sidebar__{$context}
	public $sidebar_horizontal          = ' u-pl- u-pl@md u-pl+@lg grid grid--flex';	// sidebar sidebar__{$context}
	public $menu_primary 				= ' menu--horizontal u-ph@md shadow--z1 flex flex--row flex-j--center t-bg__white';	// menu menu-{$context}
	public $menu_secondary 				= ' menu--horizontal u-p- u-1of1@sm flex flex-j--center';	// menu menu-{$context}
	public $menu_li         			= 'menu__item';	// menu-item

    public $nav_single                  = ' wrap flex flex--justify u-mb- u-mb@md u-mb+@lg'; // menu-item
    public $nav_archive                 = ''; // menu-item

    public $author_box                  = ' br u-p@all u-mb- u-mb@md u-mb+@lg';

	/* Header attributes. */
	public $branding              		= ' ';	// site-branding
	public $site_title            		= ' page-title__main';	// site-title
	public $site_description      		= ' page-title__sub';	// site-description

	/* Loop attributes. */
	public $loop_meta             		= ' u-p- u-p@md u-ph+@lg u-mb- u-mb@md u-mb+@lg br t-bg__2--light';	// loop-meta
	public $loop_title            		= ' u-mb0';	// loop-title
	public $loop_description      		= ' u-mt-';	// loop-description

	/* Post-specific attributes. */
	public $post                  		= ' br u-p@all u-mb- u-mb@md u-mb+@lg';	// get_post_class()
	public $entry_title           		= ' wrap entry__title';	// entry-title
	public $entry_author          		= ' u-mr- entry__author';	// entry-author
	public $entry_published       		= ' u-mr- entry__date';	// entry-published updated
	public $entry_content         		= ' wrap';	// entry-content
	public $entry_summary         		= ' wrap';	// entry-summary
	public $entry_terms           		= ' badge';	// entry-terms

    public $comments_area               = ' br u-p@all u-mb- u-mb@md u-mb+@lg'; // entry-terms




	public function __construct() {

		/* Objects. */
		add_filter( 'hybrid_attr_body',				[ $this, 'body' ] );
		add_filter( 'hybrid_attr_site-container', 	[ $this, 'site_container' ] );
		add_filter( 'hybrid_attr_site-inner', 		[ $this, 'site_inner' ] );
		add_filter( 'hybrid_attr_wrap',				[ $this, 'wrap' ], 10, 2 );
		add_filter( 'hybrid_attr_header',			[ $this, 'header' ] );
		add_filter( 'hybrid_attr_footer',			[ $this, 'footer' ] );
		add_filter( 'hybrid_attr_content',			[ $this, 'content' ] );
		add_filter( 'hybrid_attr_main',				[ $this, 'main' ] );
		add_filter( 'hybrid_attr_sidebar',			[ $this, 'sidebar' ], 10, 2 );
		add_filter( 'hybrid_attr_menu',				[ $this, 'menu' ], 10, 2 );
		add_filter( 'hybrid_attr_loop-meta',		[ $this, 'loop_meta' ] );

        add_filter( 'hybrid_attr_author-box',       [ $this, 'author_box' ], 10, 2 );

		/* Components. */
		add_filter( 'nav_menu_css_class',			[ $this, 'menu_li' ], 10, 2 );
		add_filter( 'hybrid_attr_branding',			[ $this, 'branding' ] );
		add_filter( 'hybrid_attr_site-title',		[ $this, 'site_title' ] );
		add_filter( 'hybrid_attr_site-description',	[ $this, 'site_description' ] );
		add_filter( 'hybrid_attr_loop-title',		[ $this, 'loop_title' ] );
		add_filter( 'hybrid_attr_loop-description',	[ $this, 'loop_description' ] );

        add_filter( 'hybrid_attr_nav',              [ $this, 'nav' ], 10, 2 );

		/* Post-specific. */
		add_filter( 'hybrid_attr_post',				[ $this, 'post' ] );
		add_filter( 'hybrid_attr_entry-title',		[ $this, 'entry_title' ] );
		add_filter( 'hybrid_attr_entry-author',		[ $this, 'entry_author' ] );
		add_filter( 'hybrid_attr_entry-published',	[ $this, 'entry_published' ] );
		add_filter( 'hybrid_attr_entry-content',	[ $this, 'entry_content' ] );
		add_filter( 'hybrid_attr_entry-summary',	[ $this, 'entry_summary' ] );
		add_filter( 'hybrid_attr_entry-terms',		[ $this, 'entry_terms' ] );
        add_filter( 'hybrid_attr_comments-area',    [ $this, 'comments_area' ] );
	}




	/* === OBJECTS === */

	public function body( $attr ) {
		$attr['class']    .= $this->body;
		return $attr;
	}


	public function site_container( $attr ) {
		$attr['class']    .= $this->site_container;
		return $attr;
	}


	public function site_inner( $attr ) {
		$attr['class']    .= $this->site_inner;
	if ( '1c' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_full_width;

	elseif ( '1c-narrow' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_single_column;

	elseif ( '2c-l' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_sidebar_right;

	elseif ( '2c-r'	 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->site_inner_sidebar_left;

	endif;
		return $attr;
	}

    public function author_box( $attr, $context ) {
        $attr['class']    .= $this->author_box;
        return $attr;
    }


	public function wrap( $attr, $context ) {
		if ( empty( $context ) ) {
			return $attr;
		}
        $attr['class']    .= $this->wrap;
		if ( 'hero' === $context ) {
		$attr['class']    .= $this->hero_wrap;
		}
        if ( 'action-bar' === $context ) {
        $attr['class']    .= $this->action_bar_wrap;
        }
		return $attr;
	}


    public function nav( $attr, $context ) {


        if ( 'single' === $context ) {
        $attr['class']    .= $this->nav_single;
        }
        if ( 'archive' === $context ) {
        $attr['class']    .= $this->nav_archive;
        }
        return $attr;
    }


    public function comments_area( $attr ) {
        $attr['class']    .= $this->comments_area;
        return $attr;
    }




	public function header( $attr ) {
		$attr['class']    .= $this->header;
		return $attr;
	}


	public function footer( $attr ) {
		$attr['class']    .= $this->footer;
		return $attr;
	}


	public function content( $attr ) {
		$attr['class']    .= $this->content;
	if ( '1c' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_full_width;

	elseif ( '1c-narrow' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_single_column;

	elseif ( '2c-l' 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_sidebar_right;

	elseif ( '2c-r'	 	== get_theme_mod( 'theme_layout' ) ) :
		$attr['class']    	.= $this->content_sidebar_left;

	endif;
		return $attr;
	}

	public function main( $attr ) {
		$attr['class']    .= $this->main;
		return $attr;
	}

	public function sidebar( $attr, $context ) {
		if ( empty( $context ) ) {
			return $attr;
		}

		if ( 'primary' === $context ) {
			$attr['id'] = 'secondary';
			$attr['class']    .= $this->sidebar;
			if ( '1c'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_full_width;

			elseif ( '1c-narrow'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_single_column;

			elseif ( '2c-l'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_sidebar_right;

			elseif ( '2c-r'	== get_theme_mod( 'theme_layout' ) ) :
				$attr['class']	.= $this->sidebar_sidebar_left;

			endif;
		}

		if ( 'primary' !== $context ) {
			$attr['class']    .= $this->sidebar_horizontal;
		}
		return $attr;
	}


	public function menu( $attr, $context ) {
		if ( empty( $context ) ) {
			return $attr;
		}

		if ( 'primary' === $context ) {
		$attr['class']    .= $this->menu_primary;
		}
		if ( 'secondary' === $context ) {
		$attr['class']    .= $this->menu_secondary;
		}
		return $attr;
	}




	/* === COMPONENTS === */

	public function menu_li( $classes, $item ) {
		$classes[] = $this->menu_li;
	    return $classes;
	}


	public function branding( $attr ) {
		$attr['class']    .= $this->branding;
		return $attr;
	}


	public function site_title( $attr ) {
		$attr['class']    .= $this->site_title;
		return $attr;
	}


	public function site_description( $attr ) {
		$attr['class']    .= $this->site_description;
		return $attr;
	}




	/* === LOOP === */

	public function loop_meta( $attr ) {
		$attr['class']    .= $this->loop_meta;
		return $attr;
	}


	public function loop_title( $attr ) {
		$attr['class']    .= $this->loop_title;
		return $attr;
	}


	public function loop_description( $attr ) {
		$attr['class']    .= $this->loop_description;
		return $attr;
	}




	/* === POSTS === */

	public function post( $attr ) {
		$attr['class']    .= $this->post;
		return $attr;
	}


	public function entry_title( $attr ) {
		$attr['class']    .= $this->entry_title;
		return $attr;
	}


	public function entry_author( $attr ) {
		$attr['class']    .= $this->entry_author;
		return $attr;
	}


	public function entry_published( $attr ) {
		$attr['class']    .= $this->entry_published;
		return $attr;
	}


	public function entry_content( $attr ) {
		$attr['class']    .= $this->entry_content;
		return $attr;
	}


	public function entry_summary( $attr ) {
		$attr['class']    .= $this->entry_summary;
		return $attr;
	}


	public function entry_terms( $attr ) {
		$attr['class']    .= $this->entry_terms;
		return $attr;
	}

}




/* Add layout option in Customize. */
add_action( 'customize_register', 'meh_layouts_customize_register' );

function meh_layouts_customize_register( $wp_customize ) {

	/* If viewing the customize preview screen, add a script to show a live preview. */
	if ( $wp_customize->is_preview() )
		add_action( 'wp_footer', 'theme_classes_customizer_script', 21 );
}

function theme_classes_customizer_script() {

$layoutclasses = new AttrTrumps();
$right = $layoutclasses->site_inner_sidebar_right;
$left = $layoutclasses->site_inner_sidebar_left;
$single = $layoutclasses->site_inner_single_column;
$wide = $layoutclasses->site_inner_full_width;
$widecontent = $layoutclasses->content_full_width;
$widesidebar = $layoutclasses->sidebar_full_width;
$content_single_column = $layoutclasses->content_single_column;
$sidebar_single_column = $layoutclasses->sidebar_single_column;
$content_sidebar_right = $layoutclasses->content_sidebar_right;
$content_sidebar_left = $layoutclasses->content_sidebar_left;
$sidebar_sidebar_right = $layoutclasses->sidebar_sidebar_right;
$sidebar_sidebar_left = $layoutclasses->sidebar_sidebar_left;
?>

<script type="text/javascript">

wp.customize(
	'theme_layout',
	function( value ) {
		value.bind(
			function( to ) {
			if(to == '2c-r') {
				jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
				jQuery( '#site-inner' ).addClass(<?= json_encode($left); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_left); ?>);
				jQuery( '#content' ).addClass(<?= json_encode($content_sidebar_right); ?>);
				jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_sidebar_right); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
			}
			else if(to == '2c-l') {
				jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
				jQuery( '#site-inner' ).addClass(<?= json_encode($right); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_right); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_right); ?>);
				jQuery( '#content' ).addClass(<?= json_encode($content_sidebar_left); ?>);
				jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_sidebar_left); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
			}
			if(to == '1c') {
				jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($single); ?>);
				jQuery( '#site-inner' ).addClass(<?= json_encode($wide); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_right); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_right); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_sidebar_left); ?>);
				jQuery( '#content' ).addClass(<?= json_encode($widecontent); ?>);
				jQuery( '#sidebar-primary' ).addClass(<?= json_encode($widesidebar); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($sidebar_single_column); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_single_column); ?>);
			}
			else if(to == '1c-narrow') {
				jQuery('#site-inner').removeClass(<?= json_encode($right); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($left); ?>);
				jQuery('#site-inner').removeClass(<?= json_encode($wide); ?>);
				jQuery( '#site-inner' ).addClass(<?= json_encode($single); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($widecontent); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
				jQuery( '#sidebar-primary' ).removeClass(<?= json_encode($widesidebar); ?>);
				jQuery( '#content' ).removeClass(<?= json_encode($content_sidebar_left); ?>);
				jQuery( '#sidebar-primary' ).addClass(<?= json_encode($sidebar_single_column); ?>);
				jQuery( '#content' ).addClass(<?= json_encode($content_single_column); ?>);
			}
			}
		);
	}
);

</script>
<?php
}

