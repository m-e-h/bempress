(function( $ ) {

    // Site title and description.
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
    // Header text color.
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
                    'color': to,
                    'position': 'relative'
                } );
            }
        } );
    } );

    wp.customize( 'bempress_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });

    wp.customize( 'primary_color', function( value ) {
        value.bind( function( to ) {
                $( '.t-bg__1' ).css( {
                    'background-color': to
                } );

                $( '.t-bg__1--light' ).css( {
                    'background-color': to
                } );

                $( '.t-fill__1' ).css( {
                    'fill': to
                } );
        } );
    });

    wp.customize( 'secondary_color', function( value ) {
        value.bind( function( to ) {
                $( '.t-bg__2' ).css( {
                    'background-color': to
                } );

                $( '.t-fill__2' ).css( {
                    'fill': to
                } );
                $( '.t-bg__2--light' ).css( {
                    'background-color': to
                } );

                $( '.t-fill__2--light' ).css( {
                    'fill': to
                } );
        } );
    });

})( jQuery );
