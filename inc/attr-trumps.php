<?php

//namespace Bempress\Attr_Trumps;

function attr_trumps($args = array()) {
    $trump = apply_filters('attr_trumps_object', null, $args);
    if (!is_object($trump))
        $trump = new Attr_Trumps($args);
}

/**
 * Add class selectors to hybrid attributes.
 *
 */
class Attr_Trumps {

    /**
     * @since  0.1.0
     * @access public
     * @var    array
     */
    public $args = array();



    /**
     * Filter hybrid attributes.
     *
     */
    public function __construct($args = array()) {

        $defaults = array(
            'body'                    => '',
            'site_container'          => 'mt2 mt3@md',
            'container'               => '',
            'container_header'        => 'flex flex-column@sm flex-justify flex-center',
            'container_wide'          => 'container--wide',
            'row'                     => '',
            'row_layout'              => 'grid',
            'row_layout_sidebar_l'    => 'grid grid--rev mxn3@md',
            'row_layout_sidebar_r'    => 'grid mxn3@md',

            // SITE HEADER
            'header'                  => 'bg1 white',
            'branding'                => 'py2@md inline-block color-inherit',
            'site_title'              => 'm0',
            'site_description'        => 'h3 bold m0 muted',

            // CONTENT
            'content'                 => 'grid__item',
            'content_with_sidebar'    => 'grid__item px3@md u-2/3@md',

            // ENTRY
            'post'                    => '',
			'post_archive'            => 'br bg-white p2 p3@md mb2 mb3@md',

            'page_header'             => 'u-1/1 center',

            'entry_title'             => 'h1 mt0',
            'archive_title'           => 'h1',
            'archive_description'     => '',

            'entry_header'            => 'container',
            'entry_content'           => 'container bg-white br p3 p4@md mb3@md',
            'entry_summary'           => 'py2 container',
            'entry_footer'            => 'container',

            'nav_single'              => '',
            'nav_archive'             => '',

            // ENTRY META
            'entry_author'            => 'inline-block',
            'entry_published'         => 'inline-block',
            'entry_terms'             => '',

            // NAVIGATION
            'menu_primary'            => '',

            // SIDEBAR
            'sidebar_primary'         => 'grid__item',
			'sidebar_footer'          => 'pt2 pt3@md',
            'sidebar_horizontal'      => 'flex flex-wrap flex-justify',
            'sidebar_right'           => 'u-1/3@md',
            'sidebar_left'            => 'u-1/3@md',

			'widgets'                 => 'widget br mb2 mb3@md px2 ml1 mr1 list-reset flex-auto',
			'primary_widgets'         => 'bg-white',
			'footer_widgets'          => 'bg-darken-1 py2 py3@md',

            // COMMENTS
            'comments_area'           => 'bg-white p3 p4@md mb2 mb3@md',

            // FOOTER
            'footer'                  => 'bg2',

            'menu_link'                 => 'btn'
        );

        $this->args = apply_filters('attr_trumps_args', wp_parse_args($args, $defaults));

        // CONTAINERS
        add_filter('hybrid_attr_body',                  array($this, 'body'));
        add_filter('hybrid_attr_container',             array($this, 'container'), 10, 2);
        add_filter('hybrid_attr_row',                   array($this, 'row'), 10, 2);

        // SITE HEADER
        add_filter('hybrid_attr_header',                array($this, 'header'));
        add_filter('hybrid_attr_branding',              array($this, 'branding'));
        add_filter('hybrid_attr_site-title',            array($this, 'site_title'));
        add_filter('hybrid_attr_site-description',      array($this, 'site_description'));

        // CONTENT
        add_filter('hybrid_attr_content',               array($this, 'content'));

        // ENTRY
        add_filter('hybrid_attr_post',                  array($this, 'post'));
        add_filter('hybrid_attr_archive-header',        array($this, 'page_header'));
        add_filter('hybrid_attr_archive-title',         array($this, 'archive_title'));
        add_filter('hybrid_attr_archive-description',   array($this, 'archive_description'));
        add_filter('hybrid_attr_entry-header',          array($this, 'entry_header'));
        add_filter('hybrid_attr_entry-title',           array($this, 'entry_title'));
        add_filter('hybrid_attr_entry-content',         array($this, 'entry_content'));
        add_filter('hybrid_attr_entry-summary',         array($this, 'entry_summary'));
        add_filter('hybrid_attr_entry-footer',          array($this, 'entry_footer'));

        // ENTRY META
        add_filter('hybrid_attr_entry-author',          array($this, 'entry_author'));
        add_filter('hybrid_attr_entry-published',       array($this, 'entry_published'));
        add_filter('hybrid_attr_entry-terms',           array($this, 'entry_terms'));

        // NAVIGATION
        add_filter('hybrid_attr_menu',                  array($this, 'menu'), 10, 2);

        // SIDEBAR
        add_filter('hybrid_attr_sidebar',               array($this, 'sidebar'), 10, 2);

		add_filter('hybrid_attr_widgets',  				array($this, 'widgets'), 10, 2);

        // FOOTER
        add_filter('hybrid_attr_footer',                array($this, 'footer'));

        // COMMENTS
        add_filter('hybrid_attr_comments-area',         array($this, 'comments_area'));

        add_filter('nav_menu_link_attributes',          array($this, 'menu_link'), 10, 3);
    }




    /* === OBJECTS === */

    public function body($attr) {
        $attr['class']      .= " {$this->args['body']}";
        return $attr;
    }

    public function container($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        $attr['class']      = $this->args['container'];
        $attr['class']      .= " container container--{$context}";

        if ('1-column-wide' == get_theme_mod('theme_layout') && 'content' === $context) {
        $attr['class']      .= " {$this->args['container_wide']}";
        }
        if ('header' === $context) {
        $attr['class']      .= " {$this->args['container_header']}";
        }
		if ('content' === $context) {
        $attr['class']      .= " {$this->args['site_container']}";
        }
        return $attr;
    }

    public function row($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        $attr['class']      = $this->args['row'];
        $attr['class']      .= " row row--{$context}";

        if ('layout' === $context) {

        if ('sidebar-right'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['row_layout_sidebar_r']}";

        elseif ('sidebar-left'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['row_layout_sidebar_l']}";

        else : $attr['class']      .= " {$this->args['row_layout']}";

        endif;
        }

        return $attr;
    }

    public function nav($attr, $context) {

        if ('single' === $context) {
        $attr['class']      .= " {$this->args['nav_single']}";
        }
        if ('archive' === $context) {
        $attr['class']      .= " {$this->args['nav_archive']}";
        }
        return $attr;
    }

    public function comments_area($attr) {
        if ($this->args['comments_area']) {
        $attr['class']      = $this->args['comments_area'];
    }
        return $attr;
    }

    public function header($attr) {
        if ($this->args['header']) {
        $attr['class']      = $this->args['header'];
    }
        return $attr;
    }

    public function footer($attr) {
        if ($this->args['footer']) {
        $attr['class']      = $this->args['footer'];
    }
    return $attr;
    }

    public function content($attr) {

        if ('1-column-wide'   == get_theme_mod('theme_layout')) :
        $attr['class']      = $this->args['content'];

        elseif ('1-column'    == get_theme_mod('theme_layout')) :
        $attr['class']      = $this->args['content'];

        elseif ('sidebar-right'     == get_theme_mod('theme_layout')) :
        $attr['class']      = $this->args['content_with_sidebar'];

        elseif ('sidebar-left'     == get_theme_mod('theme_layout')) :
        $attr['class']      = $this->args['content_with_sidebar'];
        endif;

        return $attr;
    }

    public function sidebar($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        if ('primary' === $context) {

        if ('1-column-wide'   == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['sidebar_horizontal']}";
        elseif ('1-column'    == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['sidebar_horizontal']}";

        elseif ('sidebar-right' == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['sidebar_right']}";
        elseif ('sidebar-left' == get_theme_mod('theme_layout')) :
        $attr['class']      .= " {$this->args['sidebar_left']}";
        endif;


        $attr['class']      .= " {$this->args['sidebar_primary']}";
        }

        if ('primary' !== $context) {
        $attr['class']      .= ' sidebar-horizontal';

        $attr['class']      .= " {$this->args['sidebar_horizontal']}";
        }
		if ('footer' === $context) {
		$attr['class']      .= " {$this->args['sidebar_footer']}";
        }
        return $attr;
    }

	public function widgets($attr, $context) {
		if (empty($context)) {
            return $attr;
        }
        if ($this->args['widgets']) {
        $attr['class']      = $this->args['widgets'];

		if ('footer' === $context) {
		$attr['class']      .= " {$this->args['footer_widgets']}";
		}
		if ('primary' === $context) {
		$attr['class']      .= " {$this->args['primary_widgets']}";
		}
        return $attr;
    }
    }

    public function menu($attr, $context) {
        if (empty($context)) {
        return $attr;
        }

        if ('primary' === $context) {
        $attr['class']      .= " {$this->args['menu_primary']}";
        }
        if ('secondary' === $context) {
        $attr['class']      .= " {$this->args['menu_secondary']}";
        }
        return $attr;
    }

    /* === COMPONENTS === */

    public function branding($attr) {
        if (!$this->args['branding']) {
        return $attr;
        }
        $attr['class']      = $this->args['branding'];
    return $attr;
    }


    public function site_title($attr) {
        if ($this->args['site_title']) {
        $attr['class']      = $this->args['site_title'];
        return $attr;
    }
    }

    public function site_description($attr) {
        if ($this->args['site_description']) {
        $attr['class']      = $this->args['site_description'];
        return $attr;
    }
    }

    /* === LOOP === */

    public function page_header($attr) {
        $attr['class']      = 'page-header';
        if ($this->args['page_header']) {
        $attr['class']      = " {$this->args['page_header']}";
    }
        return $attr;
    }

    public function archive_title($attr) {
    if ($this->args['archive_title']) {
        $attr['class']      = $this->args['archive_title'];
    }
        return $attr;
    }

    public function archive_description($attr) {
    if ($this->args['archive_description']) {
        $attr['class']      = $this->args['archive_description'];
    }
        return $attr;
    }

    /* === POSTS === */

    public function post($attr) {
	if (hybrid_is_plural()) {
		$attr['class']      .= " {$this->args['post_archive']}";
	} else {
        $attr['class']      .= " {$this->args['post']}";
	}
        return $attr;
    }

    public function entry_title($attr) {
    if ($this->args['entry_title']) {
        $attr['class']      = $this->args['entry_title'];
    }
        return $attr;
    }

    public function entry_author($attr) {
    if ($this->args['entry_author']) {
        $attr['class']      = $this->args['entry_author'];
    }
        return $attr;
    }


    public function entry_published($attr) {

        $attr['class']      .= " {$this->args['entry_published']}";
        return $attr;
    }

    public function entry_header($attr) {
        $attr['class']      = "entry-header";

        $attr['class']      .= " {$this->args['entry_header']}";
        return $attr;
    }

    public function entry_content($attr) {

        $attr['class']      .= " {$this->args['entry_content']}";
        return $attr;
    }

    public function entry_summary($attr) {

        $attr['class']      .= " {$this->args['entry_summary']}";
        return $attr;
    }

    public function entry_footer($attr) {
        $attr['class']      = "entry-footer";

        $attr['class']      .= " {$this->args['entry_footer']}";
        return $attr;
    }

    public function entry_terms($attr) {

        $attr['class']      .= " {$this->args['entry_terms']}";
        return $attr;
    }



    public function menu_link($attr, $item, $args) {
        $attr['class'] = $this->args['menu_link'];
        return $attr;
    }

}

new Attr_Trumps();
