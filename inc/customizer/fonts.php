<?php

/**
 * Theme Customizer Fonts.
 *
 * @author      The Theme Foundry
 */
if (!function_exists('customizer_library_get_font_choices')) :
/**
 * Packages the font choices into value/label pairs for use with the customizer.
 *
 * @since  1.0.0.
 *
 * @return array    The fonts in value/label pairs.
 */
function customizer_library_get_all_fonts() {
    $heading1       = [1 => ['label' => sprintf('--- %s ---', __('Standard Fonts', 'customizer-library'))]];
    $standard_fonts = customizer_library_get_standard_fonts();
    $heading2       = [2 => ['label' => sprintf('--- %s ---', __('Google Fonts', 'customizer-library'))]];
    $google_fonts   = customizer_library_get_google_fonts();

    /*
     * Allow for developers to modify the full list of fonts.
     *
     * @since 1.3.0.
     *
     * @param array    $fonts    The list of all fonts.
     */
    return apply_filters('customizer_library_all_fonts', array_merge($heading1, $standard_fonts, $heading2, $google_fonts));
}
endif;

if (!function_exists('customizer_library_get_font_choices')) :
/**
 * Packages the font choices into value/label pairs for use with the customizer.
 *
 * @since  1.0.0.
 *
 * @return array    The fonts in value/label pairs.
 */
function customizer_library_get_font_choices() {
    $fonts   = customizer_library_get_all_fonts();
    $choices = [];

    // Repackage the fonts into value/label pairs
    foreach ($fonts as $key => $font) {
        $choices[ $key ] = $font['label'];
    }

    return $choices;
}
endif;

if (!function_exists('customizer_library_get_google_font_uri')) :
/**
 * Build the HTTP request URL for Google Fonts.
 *
 * @since  1.0.0.
 *
 * @return string    The URL for including Google Fonts.
 */
function customizer_library_get_google_font_uri($fonts) {

    // De-dupe the fonts
    $fonts         = array_unique($fonts);
    $allowed_fonts = customizer_library_get_google_fonts();
    $family        = [];

    // Validate each font and convert to URL format
    foreach ($fonts as $font) {
        $font = trim($font);

        // Verify that the font exists
        if (array_key_exists($font, $allowed_fonts)) {
            // Build the family name and variant string (e.g., "Open+Sans:regular,italic,700")
            $family[] = urlencode($font.':'.implode(',', customizer_library_choose_google_font_variants($font, $allowed_fonts[ $font ]['variants'])));
        }
    }

    // Convert from array to string
    if (empty($family)) {
        return '';
    } else {
        $request = '//fonts.googleapis.com/css?family='.implode('|', $family);
    }

    // Load the font subset
    $subset = get_theme_mod('font-subset', 'default');

    if ('all' === $subset) {
        $subsets_available = customizer_library_get_google_font_subsets();

        // Remove the all set
        unset($subsets_available['all']);

        // Build the array
        $subsets = array_keys($subsets_available);
    } else {
        $subsets = [
            'latin',
            $subset,
        ];
    }

    // Append the subset string
    if (!empty($subsets)) {
        $request .= urlencode('&subset='.implode(',', $subsets));
    }

    return esc_url($request);
}
endif;

if (!function_exists('customizer_library_get_google_font_subsets')) :
/**
 * Retrieve the list of available Google font subsets.
 *
 * @since  1.0.0.
 *
 * @return array    The available subsets.
 */
function customizer_library_get_google_font_subsets() {
    return [
        'all'          => __('All', 'textdomain'),
        'cyrillic'     => __('Cyrillic', 'textdomain'),
        'cyrillic-ext' => __('Cyrillic Extended', 'textdomain'),
        'devanagari'   => __('Devanagari', 'textdomain'),
        'greek'        => __('Greek', 'textdomain'),
        'greek-ext'    => __('Greek Extended', 'textdomain'),
        'khmer'        => __('Khmer', 'textdomain'),
        'latin'        => __('Latin', 'textdomain'),
        'latin-ext'    => __('Latin Extended', 'textdomain'),
        'vietnamese'   => __('Vietnamese', 'textdomain'),
    ];
}
endif;

if (!function_exists('customizer_library_choose_google_font_variants')) :
/**
 * Given a font, chose the variants to load for the theme.
 *
 * Attempts to load regular, italic, and 700. If regular is not found, the first variant in the family is chosen. italic
 * and 700 are only loaded if found. No fallbacks are loaded for those fonts.
 *
 * @since  1.0.0.
 *
 * @param  string    $font        The font to load variants for.
 * @param  array     $variants    The variants for the font.
 *
 * @return array                  The chosen variants.
 */
function customizer_library_choose_google_font_variants($font, $variants = []) {
    $chosen_variants = [];
    if (empty($variants)) {
        $fonts = customizer_library_get_google_fonts();

        if (array_key_exists($font, $fonts)) {
            $variants = $fonts[ $font ]['variants'];
        }
    }

    // If a "regular" variant is not found, get the first variant
    if (!in_array('regular', $variants)) {
        $chosen_variants[] = $variants[0];
    } else {
        $chosen_variants[] = 'regular';
    }

    // Only add "italic" if it exists
    if (in_array('italic', $variants)) {
        $chosen_variants[] = 'italic';
    }

    // Only add "300" if it exists
    if (in_array('300', $variants)) {
        $chosen_variants[] = '300';
    }

    // Only add "400" if it exists
    if (in_array('400', $variants)) {
        $chosen_variants[] = '400';
    }

    // Only add "500" if it exists
    if (in_array('500', $variants)) {
        $chosen_variants[] = '500';
    }

    // Only add "700" if it exists
    if (in_array('700', $variants)) {
        $chosen_variants[] = '700';
    }

    return apply_filters('customizer_library_font_variants', array_unique($chosen_variants), $font, $variants);
}
endif;

if (!function_exists('customizer_library_get_standard_fonts')) :
/**
 * Return an array of standard websafe fonts.
 *
 * @since  1.0.0.
 *
 * @return array    Standard websafe fonts.
 */
function customizer_library_get_standard_fonts() {
    return [
        'serif' => [
            'label' => _x('Serif', 'font style', 'textdomain'),
            'stack' => 'Georgia,Times,"Times New Roman",serif',
        ],
        'sans-serif' => [
            'label' => _x('Sans Serif', 'font style', 'textdomain'),
            'stack' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
        ],
        'monospace' => [
            'label' => _x('Monospaced', 'font style', 'textdomain'),
            'stack' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
        ],
    ];
}
endif;

if (!function_exists('customizer_library_get_font_stack')) :
/**
 * Validate the font choice and get a font stack for it.
 *
 * @since  1.0.0.
 *
 * @param  string    $font    The 1st font in the stack.
 *
 * @return string             The full font stack.
 */
function customizer_library_get_font_stack($font) {
    $all_fonts = customizer_library_get_all_fonts();

    // Sanitize font choice
    $font = customizer_library_sanitize_font_choice($font);

    $sans  = '"Helvetica Neue",sans-serif';
    $serif = 'Georgia, serif';

    // Use stack if one is identified
    if (isset($all_fonts[ $font ]['stack']) && !empty($all_fonts[ $font ]['stack'])) {
        $stack = $all_fonts[ $font ]['stack'];
    } else {
        $stack = '"'.$font.'",'.$sans;
    }

    return $stack;
}
endif;

if (!function_exists('customizer_library_sanitize_font_choice')) :
/**
 * Sanitize a font choice.
 *
 * @since  1.0.0.
 *
 * @param  string    $value    The font choice.
 *
 * @return string              The sanitized font choice.
 */
function customizer_library_sanitize_font_choice($value) {
    if (is_int($value)) {
        // The array key is an integer, so the chosen option is a heading, not a real choice
        return '';
    } elseif (array_key_exists($value, customizer_library_get_font_choices())) {
        return $value;
    } else {
        return '';
    }
}
endif;

if (!function_exists('customizer_library_get_google_fonts')) :
/**
 * Return an array of all available Google Fonts.
 *
 * @since  1.0.0.
 *
 * @return array    All Google Fonts.
 */
function customizer_library_get_google_fonts() {
    return apply_filters('customizer_library_get_google_fonts', [
        'Arimo' => [
            'label'    => 'Arimo',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Arvo' => [
            'label'    => 'Arvo',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Cabin' => [
            'label'    => 'Cabin',
            'variants' => [
                'regular',
                'italic',
                '500',
                '500italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Cabin Condensed' => [
            'label'    => 'Cabin Condensed',
            'variants' => [
                'regular',
                '500',
                '600',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Cabin Sketch' => [
            'label'    => 'Cabin Sketch',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Cinzel' => [
            'label'    => 'Cinzel',
            'variants' => [
                'regular',
                '700',
                '900',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Cinzel Decorative' => [
            'label'    => 'Cinzel Decorative',
            'variants' => [
                'regular',
                '700',
                '900',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Crimson Text' => [
            'label'    => 'Crimson Text',
            'variants' => [
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Droid Sans' => [
            'label'    => 'Droid Sans',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Droid Sans Mono' => [
            'label'    => 'Droid Sans Mono',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Droid Serif' => [
            'label'    => 'Droid Serif',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'EB Garamond' => [
            'label'    => 'EB Garamond',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Finger Paint' => [
            'label'    => 'Finger Paint',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Fira Sans' => [
            'label'    => 'Fira Sans',
            'variants' => [
                '300',
                '300italic',
                '400',
                '400italic',
                '500',
                '500italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Fira Mono' => [
            'label'    => 'Fira Mono',
            'variants' => [
                '400',
                '700',
            ],
            'subsets' => [
                'latin',
                'greek',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Forum' => [
            'label'    => 'Forum',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Gentium Basic' => [
            'label'    => 'Gentium Basic',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Gentium Book Basic' => [
            'label'    => 'Gentium Book Basic',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Give You Glory' => [
            'label'    => 'Give You Glory',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Glass Antiqua' => [
            'label'    => 'Glass Antiqua',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Glegoo' => [
            'label'    => 'Glegoo',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Gloria Hallelujah' => [
            'label'    => 'Gloria Hallelujah',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Goblin One' => [
            'label'    => 'Goblin One',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Gochi Hand' => [
            'label'    => 'Gochi Hand',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Gorditas' => [
            'label'    => 'Gorditas',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Goudy Bookletter 1911' => [
            'label'    => 'Goudy Bookletter 1911',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Graduate' => [
            'label'    => 'Graduate',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Italiana' => [
            'label'    => 'Italiana',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Italianno' => [
            'label'    => 'Italianno',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Josefin Sans' => [
            'label'    => 'Josefin Sans',
            'variants' => [
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Josefin Slab' => [
            'label'    => 'Josefin Slab',
            'variants' => [
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Kotta One' => [
            'label'    => 'Kotta One',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Lato' => [
            'label'    => 'Lato',
            'variants' => [
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'League Script' => [
            'label'    => 'League Script',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Ledger' => [
            'label'    => 'Ledger',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
            ],
        ],
        'Libre Baskerville' => [
            'label'    => 'Libre Baskerville',
            'variants' => [
                'regular',
                'italic',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Lobster' => [
            'label'    => 'Lobster',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Lobster Two' => [
            'label'    => 'Lobster Two',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Lora' => [
            'label'    => 'Lora',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
            ],
        ],
        'Love Ya Like A Sister' => [
            'label'    => 'Love Ya Like A Sister',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Loved by the King' => [
            'label'    => 'Loved by the King',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Lustria' => [
            'label'    => 'Lustria',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Marcellus' => [
            'label'    => 'Marcellus',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Marcellus SC' => [
            'label'    => 'Marcellus SC',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Marvel' => [
            'label'    => 'Marvel',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Merriweather' => [
            'label'    => 'Merriweather',
            'variants' => [
                '300',
                '300italic',
                'regular',
                'italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Merriweather Sans' => [
            'label'    => 'Merriweather Sans',
            'variants' => [
                '300',
                '300italic',
                'regular',
                'italic',
                '700',
                '700italic',
                '800',
                '800italic',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Modern Antiqua' => [
            'label'    => 'Modern Antiqua',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Noto Sans' => [
            'label'    => 'Noto Sans',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'devanagari',
                'cyrillic-ext',
            ],
        ],
        'Noto Serif' => [
            'label'    => 'Noto Serif',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Old Standard TT' => [
            'label'    => 'Old Standard TT',
            'variants' => [
                'regular',
                'italic',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Oldenburg' => [
            'label'    => 'Oldenburg',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Oleo Script' => [
            'label'    => 'Oleo Script',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Oleo Script Swash Caps' => [
            'label'    => 'Oleo Script Swash Caps',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Open Sans' => [
            'label'    => 'Open Sans',
            'variants' => [
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '800',
                '800italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'devanagari',
                'cyrillic-ext',
            ],
        ],
        'Open Sans Condensed' => [
            'label'    => 'Open Sans Condensed',
            'variants' => [
                '300',
                '300italic',
                '700',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Oswald' => [
            'label'    => 'Oswald',
            'variants' => [
                '300',
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Ovo' => [
            'label'    => 'Ovo',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Oxygen' => [
            'label'    => 'Oxygen',
            'variants' => [
                '300',
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Oxygen Mono' => [
            'label'    => 'Oxygen Mono',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'PT Mono' => [
            'label'    => 'PT Mono',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'PT Sans' => [
            'label'    => 'PT Sans',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'PT Sans Caption' => [
            'label'    => 'PT Sans Caption',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'PT Sans Narrow' => [
            'label'    => 'PT Sans Narrow',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'PT Serif' => [
            'label'    => 'PT Serif',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'PT Serif Caption' => [
            'label'    => 'PT Serif Caption',
            'variants' => [
                'regular',
                'italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Pacifico' => [
            'label'    => 'Pacifico',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Playfair Display' => [
            'label'    => 'Playfair Display',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
            ],
        ],
        'Playfair Display SC' => [
            'label'    => 'Playfair Display SC',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
            ],
        ],
        'Poiret One' => [
            'label'    => 'Poiret One',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'cyrillic',
                'latin-ext',
            ],
        ],
        'Puritan' => [
            'label'    => 'Puritan',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Purple Purse' => [
            'label'    => 'Purple Purse',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Raleway' => [
            'label'    => 'Raleway',
            'variants' => [
                '100',
                '200',
                '300',
                'regular',
                '500',
                '600',
                '700',
                '800',
                '900',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Roboto' => [
            'label'    => 'Roboto',
            'variants' => [
                '100',
                '100italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Roboto Condensed' => [
            'label'    => 'Roboto Condensed',
            'variants' => [
                '300',
                '300italic',
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Roboto Slab' => [
            'label'    => 'Roboto Slab',
            'variants' => [
                '100',
                '300',
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Rokkitt' => [
            'label'    => 'Rokkitt',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
            ],
        ],
        'Rubik One' => [
            'label'    => 'Rubik One',
            'variants' => [
                '400',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Rubik Mono One' => [
            'label'    => 'Rubik Mono One',
            'variants' => [
                '400',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Rufina' => [
            'label'    => 'Rufina',
            'variants' => [
                'regular',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Source Code Pro' => [
            'label'    => 'Source Code Pro',
            'variants' => [
                '200',
                '300',
                'regular',
                '500',
                '600',
                '700',
                '900',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Source Sans Pro' => [
            'label'    => 'Source Sans Pro',
            'variants' => [
                '200',
                '200italic',
                '300',
                '300italic',
                'regular',
                'italic',
                '600',
                '600italic',
                '700',
                '700italic',
                '900',
                '900italic',
            ],
            'subsets' => [
                'latin',
                'vietnamese',
                'latin-ext',
            ],
        ],
        'Source Serif Pro' => [
            'label'    => 'Source Serif Pro',
            'variants' => [
                '400',
                '600',
                '700',
            ],
            'subsets' => [
                'latin',
                'latin-ext',
            ],
        ],
        'Tinos' => [
            'label'    => 'Tinos',
            'variants' => [
                'regular',
                'italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'vietnamese',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Ubuntu' => [
            'label'    => 'Ubuntu',
            'variants' => [
                '300',
                '300italic',
                'regular',
                'italic',
                '500',
                '500italic',
                '700',
                '700italic',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
        'Ubuntu Condensed' => [
            'label'    => 'Ubuntu Condensed',
            'variants' => [
                'regular',
            ],
            'subsets' => [
                'latin',
                'greek-ext',
                'cyrillic',
                'greek',
                'latin-ext',
                'cyrillic-ext',
            ],
        ],
    ]);
}
endif;
