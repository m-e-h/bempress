<?php

namespace Bempress\AttrTrumps;


/**
 * Add class selectors to hybrid attributes.
 *
 */
class AttrTrumps {

    // CONTAINERS
    public $body                    = '';
    public $site_container          = '';
    public $container               = '';
    public $row                     = '';
    public $row_layout              = 'grid';
    public $row_layout_sidebar_l    = 'grid grid--rev';
    public $row_layout_sidebar_r    = 'grid';

    // SITE HEADER
    public $header                  = '';
    public $branding                = '';
    public $site_title              = '';
    public $site_description        = '';

    // CONTENT
    public $content                 = 'grid__item u-mb';
    public $content_with_sidebar    = 'u-2/3@md u-pr@md';

    // ENTRY
    public $post                    = 't-bg--white';

    public $page_header             = '';

    public $entry_title             = '';
    public $archive_title           = '';
    public $archive_description     = '';

    public $entry_content           = 'u-p';
    public $entry_summary           = '';

    public $nav_single              = '';
    public $nav_archive             = '';

    // ENTRY META
    public $entry_author            = '';
    public $entry_published         = '';
    public $entry_terms             = '';

    // NAVIGATION
    public $menu_primary            = 't-bg__grey';

    // SIDEBAR
    public $sidebar_primary        = 'grid__item t-bg--white u-p u-mb';
    public $sidebar_horizontal      = 'u-flex u-flex--w u-flex--j-sb u-flex--row@md';
    public $sidebar_right           = 'u-1/3@md';
    public $sidebar_left            = 'u-1/3@md';

    // COMMENTS
    public $comments_area           = '';

    // FOOTER
    public $footer                  = 't-bg--white';




    /**
     * Filter hybrid attributes.
     *
     */
    public function __construct() {

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
        add_filter('hybrid_attr_entry-title',           [$this,'entry_title']);
        add_filter('hybrid_attr_archive-title',         [$this,'archive_title']);
        add_filter('hybrid_attr_archive-description',   [$this,'archive_description']);
        add_filter('hybrid_attr_entry-content',         [$this,'entry_content']);
        add_filter('hybrid_attr_entry-summary',         [$this,'entry_summary']);

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

    public function body( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->body;
        return $attr;
    }

    public function site_container( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->site_container;
        return $attr;
    }

    public function container( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        $attr['class']      = "container container--{$context}";
        $attr['class']      .= ' ';
        $attr['class']      .= $this->container;
        return $attr;
    }

    public function row( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        $attr['class']      = "row row--{$context}";
        $attr['class']      .= $this->row;
        if ( 'layout' === $context ) {
        $attr['class']      .= ' ';


        if ( 'sidebar-right'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->row_layout_sidebar_r;

        elseif ( 'sidebar-left'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->row_layout_sidebar_l;

        else : $attr['class']      .= $this->row_layout;

        endif;
        }
        return $attr;
    }

    public function nav( $attr, $context ) {
        $attr['class']      .= ' ';
        if ( 'single' === $context ) {
        $attr['class']      .= $this->nav_single;
        }
        if ( 'archive' === $context ) {
        $attr['class']      .= $this->nav_archive;
        }
        return $attr;
    }

    public function comments_area( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->comments_area;
        return $attr;
    }

    public function header( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->header;
        return $attr;
    }

    public function footer( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->footer;
        return $attr;
    }

    public function content( $attr ) {
        $attr['class']      .= ' ';
        if ( 'single-column--wide'   == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content;

        elseif ( 'single-column'    == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content;

        elseif ( 'sidebar-right'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_with_sidebar;

        elseif ( 'sidebar-left'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_with_sidebar;
        endif;

        $attr['class']      .= ' ';
        $attr['class']      .= $this->content;
        return $attr;
    }

    public function sidebar( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        if ( 'primary' === $context ) {
        $attr['class']      .= ' ';
        if ( 'single-column--wide'   == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_horizontal;
        $attr['class']      .= ' sidebar-horizontal';
        elseif ( 'single-column'    == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_horizontal;
        $attr['class']      .= ' sidebar-horizontal';

        elseif ( 'sidebar-right' == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_right;
        elseif ( 'sidebar-left' == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_left;
        endif;

        $attr['class']      .= ' ';
        $attr['class']      .= $this->sidebar_primary;
        }

        if ( 'primary' !== $context ) {
        $attr['class']      .= ' sidebar-horizontal';
        $attr['class']      .= ' ';
        $attr['class']      .= $this->sidebar_horizontal;
        }
        return $attr;
    }

    public function menu( $attr, $context ) {
        if ( empty( $context ) ) {
        return $attr;
        }
        $attr['class']      .= ' ';
        if ( 'primary' === $context ) {
        $attr['class']      .= $this->menu_primary;
        }
        if ( 'secondary' === $context ) {
        $attr['class']      .= $this->menu_secondary;
        }
        return $attr;
    }

    /* === COMPONENTS === */

    public function branding( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->branding;
        return $attr;
    }


    public function site_title( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->site_title;
        return $attr;
    }

    public function site_description( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->site_description;
        return $attr;
    }

    /* === LOOP === */

    public function page_header( $attr ) {
        $attr['class']      = 'page-header';
        $attr['class']      .= ' ';
        $attr['class']      .= $this->page_header;
        return $attr;
    }

    public function archive_title( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->archive_title;
        return $attr;
    }

    public function archive_description( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->archive_description;
        return $attr;
    }

    /* === POSTS === */

    public function post( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->post;
        return $attr;
    }

    public function entry_title( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_title;
        return $attr;
    }

    public function entry_author( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_author;
        return $attr;
    }


    public function entry_published( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_published;
        return $attr;
    }

    public function entry_content( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_content;
        return $attr;
    }

    public function entry_summary( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_summary;
        return $attr;
    }

    public function entry_terms( $attr ) {
        $attr['class']      .= ' ';
        $attr['class']      .= $this->entry_terms;
        return $attr;
    }

}

new AttrTrumps();
