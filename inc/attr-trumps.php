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

    // SITE HEADER
    public $header                  = '';
    public $branding                = '';
    public $site_title              = '';
    public $site_description        = '';

    // CONTENT
    public $content                 = '';
    public $content_with_sidebar    = '';
    public $main                    = '';

    // ENTRY
    public $post                    = '';

    public $page_header             = '';

    public $entry_title             = '';
    public $archive_title           = '';
    public $archive_description     = '';

    public $entry_content           = '';
    public $entry_sidebar           = '';
    public $entry_sidebar_rev       = '';
    public $entry_summary           = '';

    public $nav_single              = '';
    public $nav_archive             = '';

    // ENTRY META
    public $entry_author            = '';
    public $entry_published         = '';
    public $entry_terms             = '';

    // NAVIGATION
    public $menu_primary            = ' t-bg__grey';
    public $menu_li                 = 'menu__item';

    // SIDEBAR
    public $sidebar                 = '';
    public $sidebar_vertical        = '';
    public $sidebar_horizontal      = '';
    public $sidebar_right           = '';
    public $sidebar_left            = '';

    // COMMENTS
    public $comments_area           = '';

    // FOOTER
    public $footer                  = '';




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
        add_filter('hybrid_attr_main',                  [$this,'main']);

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
        add_filter('nav_menu_css_class',                [$this,'menu_li'],10,2);

        // SIDEBAR
        add_filter('hybrid_attr_sidebar',               [$this,'sidebar'],10,2);

        // FOOTER
        add_filter('hybrid_attr_footer',                [$this,'footer']);

        // COMMENTS
        add_filter('hybrid_attr_comments-area',         [$this,'comments_area']);

    }




    /* === OBJECTS === */

    public function body( $attr ) {
        $attr['class']      .= $this->body;
        return $attr;
    }

    public function site_container( $attr ) {
        $attr['class']      .= $this->site_container;
        return $attr;
    }

    public function site_inner( $attr ) {
        $attr['class']      .= $this->site_inner;

        if ( '1c'   == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->site_inner_full_width;

        elseif ( 'cards'    == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->card_layout_inner;

        elseif ( '2c-l'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->site_inner_sidebar_right;

        elseif ( '2c-r'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->site_inner_sidebar_left;
        endif;
        return $attr;
    }

    public function author_box( $attr, $context ) {
        $attr['class']      .= $this->author_box;
        return $attr;
    }

    public function container( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        $attr['class']      = "container container--{$context}";
        $attr['class']      .= $this->container;
        return $attr;
    }

    public function row( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        $attr['class']      = "row row--{$context}";
        $attr['class']      .= $this->row;
        return $attr;
    }

    public function nav( $attr, $context ) {
        if ( 'single' === $context ) {
        $attr['class']      .= $this->nav_single;
        }
        if ( 'archive' === $context ) {
        $attr['class']      .= $this->nav_archive;
        }
        return $attr;
    }

    public function comments_area( $attr ) {
        $attr['class']      .= $this->comments_area;
        return $attr;
    }

    public function header( $attr ) {
        $attr['class']      .= $this->header;
        return $attr;
    }

    public function footer( $attr ) {
        $attr['class']      .= $this->footer;
        return $attr;
    }

    public function content( $attr ) {
        $attr['class']      .= $this->content;
    if ( '1c'   == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_full_width;

    elseif ( 'cards'    == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_card_layout;

    elseif ( '2c-l'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_with_sidebar;

    elseif ( '2c-r'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->content_sidebar_left;

    endif;
        return $attr;
    }

    public function main( $attr ) {
        $attr['class']      .= $this->main;
        return $attr;
    }

    public function sidebar( $attr, $context ) {
        if ( empty( $context ) ) {
            return $attr;
        }
        if ( 'primary' === $context ) {
        $attr['id'] = 'secondary';
        $attr['class']      .= $this->sidebar;
        if ( '1c'   == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_full_width;
        elseif ( 'cards'    == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_card_layout;
        elseif ( '2c-l' == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_right;
        elseif ( '2c-r' == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->sidebar_left;

        endif;
        }

        if ( 'primary' !== $context ) {
        $attr['class']      .= $this->sidebar_horizontal;
        }
        return $attr;
    }

    public function menu( $attr, $context ) {
        if ( empty( $context ) ) {
        return $attr;
        }
        if ( 'primary' === $context ) {
        $attr['class']      .= $this->menu_primary;
        }
        if ( 'secondary' === $context ) {
        $attr['class']      .= $this->menu_secondary;
        }
        return $attr;
    }

    /* === COMPONENTS === */

    public function menu_li( $classes, $item ) {
        $classes[]          = $this->menu_li;
        return $classes;
    }


    public function branding( $attr ) {
        $attr['class']      .= $this->branding;
        return $attr;
    }


    public function site_title( $attr ) {
        $attr['class']      .= $this->site_title;
        return $attr;
    }

    public function site_description( $attr ) {
        $attr['class']      .= $this->site_description;
        return $attr;
    }

    /* === LOOP === */

    public function page_header( $attr ) {
        $attr['class']      = 'page-header';
        $attr['class']      .= $this->page_header;
        return $attr;
    }

    public function archive_title( $attr ) {
        $attr['class']      .= $this->archive_title;
        return $attr;
    }

    public function archive_description( $attr ) {
        $attr['class']      .= $this->archive_description;
        return $attr;
    }

    /* === POSTS === */

    public function post( $attr ) {
        $attr['class']      .= $this->post;
        if ( 'cards'        == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->post_card_layout;
        endif;
        return $attr;
    }

    public function entry_title( $attr ) {
        $attr['class']      .= $this->entry_title;
        return $attr;
    }

    public function entry_author( $attr ) {
        $attr['class']      .= $this->entry_author;
        return $attr;
    }


    public function entry_published( $attr ) {
        $attr['class']      .= $this->entry_published;
        return $attr;
    }

    public function entry_content( $attr ) {
        if ( '2c-l'         == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->entry_sidebar;

        elseif ( '2c-r'     == get_theme_mod( 'theme_layout' ) ) :
        $attr['class']      .= $this->entry_sidebar_rev;

        else :
        $attr['class']      .= $this->entry_content;

        endif;
        return $attr;
    }

    public function entry_summary( $attr ) {
        $attr['class']      .= $this->entry_summary;
        return $attr;
    }

    public function entry_terms( $attr ) {
        $attr['class']      .= $this->entry_terms;
        return $attr;
    }

}

new AttrTrumps();
