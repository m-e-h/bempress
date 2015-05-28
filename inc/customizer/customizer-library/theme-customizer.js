(function( $ ) {

	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'position': 'static'
                } );

                $( '.site-title a' ).css( {
                    'color': to
                } );
            }
        } );
    });

    wp.customize( 'wpt_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'wpt_footer_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #footertext ').hide();
            } else {
                $(' #footertext ').show();
                $(' #footertext ').text( to );
            }
        } );
    });    

    wp.customize( 'wpt_h1_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1 a' ).css( 'color', to );
        } );
    });

    wp.customize( 'wpt_h1_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-size', to + 'px' );            
        } );
    });     

})( jQuery );