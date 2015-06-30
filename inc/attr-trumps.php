<?php

//namespace Bempress\AttrTrumps;


/**
 * Add class selectors to hybrid attributes.
 *
 */
class AttrTrumps {

    /**
     * Filter hybrid attributes.
     *
     */
     public function __construct( $args = array() ) {

 		$this->args = wp_parse_args(
 			$args,
 			array(
                'body'                    => '',
                'site_container'          => '',
                'container'               => '',
                'container_header'        => 'flex flex--row@md flex--w flex--j-sb flex--ai-c',
                'container_wide'          => 'container--wide',
                'row'                     => '',
                'row_layout'              => 'grid',
                'row_layout_sidebar_l'    => 'grid grid--rev',
                'row_layout_sidebar_r'    => 'grid',

                // SITE HEADER
                'header'                  => '',
                'branding'                => '',
                'site_title'              => 'u-h2 u-m0',
                'site_description'        => 'u-h4 u-m0',

                // CONTENT
                'content'                 => 'grid__item u-mb',
                'content_with_sidebar'    => 'grid__item u-mb u-2/3@md u-pr@md',

                // ENTRY
                'post'                    => '',

                'page_header'             => 'u-1/1 u-text-center',

                'entry_title'             => 'u-h1',
                'archive_title'           => 'u-h1',
                'archive_description'     => '',

                'entry_header'            => 'container',
                'entry_content'           => 'u-p container',
                'entry_summary'           => 'u-p container',
                'entry_footer'            => 'container',

                'nav_single'              => '',
                'nav_archive'             => '',

                // ENTRY META
                'entry_author'            => '',
                'entry_published'         => '',
                'entry_terms'             => '',

                // NAVIGATION
                'menu_primary'            => 't-bg__grey',

                // SIDEBAR
                'sidebar_primary'        => 'grid__item t-bg--white u-p u-mb',
                'sidebar_horizontal'      => 'flex flex--w flex--j-sb flex--row@md',
                'sidebar_right'           => 'u-1/3@md',
                'sidebar_left'            => 'u-1/3@md',

                // COMMENTS
                'comments_area'           => '',

                // FOOTER
                'footer'                  => 't-bg--white'
        )
    );

        // CONTAINERS
        add_filter('hybrid_attr_body',                  [$this,'body']);
        add_filter('hybrid_attr_site-container',        [$this,'site_container']);
        add_filter('hybrid_attr_container',             [$this,'container'],10,2);
        add_filter('hybrid_attr_row',                   [$this,'row'],10,2);

        // SITE HEADER
        add_filter('hybrid_attr_header',                [$this,'header']);
        add_filter('hybrid_attr_branding',              [$this,'branding']);
        add_filter('hybrid_attr_site-title',            [$this,'site_title']);
        add_filter('hybrid_attr_site-description',      [$this,'site_description']);

        // CONTENT
        add_filter('hybrid_attr_content',               [$this,'content']);

        // ENTRY
        add_filter('hybrid_attr_post',                  [$this,'post']);
        add_filter('hybrid_attr_archive-header',        [$this,'page_header']);
        add_filter('hybrid_attr_archive-title',         [$this,'archive_title']);
        add_filter('hybrid_attr_archive-description',   [$this,'archive_description']);
        add_filter('hybrid_attr_entry-header',          [$this,'entry_header']);
        add_filter('hybrid_attr_entry-title',           [$this,'entry_title']);
        add_filter('hybrid_attr_entry-content',         [$this,'entry_content']);
        add_filter('hybrid_attr_entry-summary',         [$this,'entry_summary']);
        add_filter('hybrid_attr_entry-footer',          [$this,'entry_footer']);

        // ENTRY META
        add_filter('hybrid_attr_entry-author',          [$this,'entry_author']);
        add_filter('hybrid_attr_entry-published',       [$this,'entry_published']);
        add_filter('hybrid_attr_entry-terms',           [$this,'entry_terms']);

        // NAVIGATION
        add_filter('hybrid_attr_menu',                  [$this,'menu'],10,2);

        // SIDEBAR
        add_filter('hybrid_attr_sidebar',               [$this,'sidebar'],10,2);

        // FOOTER
        add_filter('hybrid_attr_footer',                [$this,'footer']);

        // COMMENTS
        add_filter('hybrid_attr_comments-area',         [$this,'comments_area']);

    }




    /* === OBJECTS === */

    public function body($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['body'];
        return $attr;
    }

    public function site_container($attr) {
        if ($this->args['site_container']) {
        $attr['class']      = $this->args['site_container'];
    }
        return $attr;
    }

    public function container($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        $attr['class']      = "container container--{$context}";
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['container'];
        if ('single-column--wide' == get_theme_mod('theme_layout') && 'content' === $context) :
        $attr['class']      .= $this->args['container_wide'];
        endif;
        if ('header' === $context) :
        $attr['class']      .= $this->args['container_header'];
        endif;
        return $attr;
    }

    public function row($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        $attr['class']      = "row row--{$context}";
        $attr['class']      .= $this->args['row'];
        if ('layout' === $context) {
        $attr['class']      .= ' ';

        if ('sidebar-right'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['row_layout_sidebar_r'];

        elseif ('sidebar-left'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['row_layout_sidebar_l'];

        else : $attr['class']      .= $this->args['row_layout'];

        endif;
        }
        return $attr;
    }

    public function nav($attr, $context) {
        $attr['class']      .= ' ';
        if ('single' === $context) {
        $attr['class']      .= $this->args['nav_single'];
        }
        if ('archive' === $context) {
        $attr['class']      .= $this->args['nav_archive'];
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
        $attr['class']      .= ' ';
        if ('single-column--wide'   == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['content'];

        elseif ('single-column'    == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['content'];

        elseif ('sidebar-right'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['content_with_sidebar'];

        elseif ('sidebar-left'     == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['content_with_sidebar'];
        endif;

        return $attr;
    }

    public function sidebar($attr, $context) {
        if (empty($context)) {
            return $attr;
        }
        if ('primary' === $context) {
        $attr['class']      .= ' ';
        if ('single-column--wide'   == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['sidebar_horizontal'];
        $attr['class']      .= ' sidebar-horizontal';
        elseif ('single-column'    == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['sidebar_horizontal'];
        $attr['class']      .= ' sidebar-horizontal';

        elseif ('sidebar-right' == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['sidebar_right'];
        elseif ('sidebar-left' == get_theme_mod('theme_layout')) :
        $attr['class']      .= $this->args['sidebar_left'];
        endif;

        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['sidebar_primary'];
        }

        if ('primary' !== $context) {
        $attr['class']      .= ' sidebar-horizontal';
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['sidebar_horizontal'];
        }
        return $attr;
    }

    public function menu($attr, $context) {
        if (empty($context)) {
        return $attr;
        }
        $attr['class']      .= ' ';
        if ('primary' === $context) {
        $attr['class']      .= $this->args['menu_primary'];
        }
        if ('secondary' === $context) {
        $attr['class']      .= $this->args['menu_secondary'];
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
        $attr['class']      = $this->args['page_header'];
        $attr['class']      .= ' page-header';
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
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['post'];
        return $attr;
    }

    public function entry_title($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_title'];
        return $attr;
    }

    public function entry_author($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_author'];
        return $attr;
    }


    public function entry_published($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_published'];
        return $attr;
    }

    public function entry_header($attr) {
        $attr['class']      = "entry-header";
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_header'];
        return $attr;
    }

    public function entry_content($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_content'];
        return $attr;
    }

    public function entry_summary($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_summary'];
        return $attr;
    }

    public function entry_footer($attr) {
        $attr['class']      = "entry-footer";
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_footer'];
        return $attr;
    }

    public function entry_terms($attr) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->args['entry_terms'];
        return $attr;
    }

}

new AttrTrumps();
