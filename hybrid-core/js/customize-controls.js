jQuery( document ).ready( function() {

	/* === Color Palette Control === */

	jQuery( '.customize-control-palette input:radio:checked' ).parent( 'label' ).addClass( 'selected' );

	jQuery( '.customize-control-palette input:radio' ).change(
		function() {

			// Switch the `.selected` class on the label wrapping the selected radio input.
			jQuery( this ).parents( '.customize-control-palette' ).find( 'label.selected' ).removeClass( 'selected' );
			jQuery( this ).parent( 'label' ).addClass( 'selected' );

			// Get the name of the setting.
			var setting = jQuery( this ).attr( 'data-customize-setting-link' );

			// Get the value of the currently-checked radio input.
			var palette = jQuery( this ).val();

			// Set the new value.
			wp.customize( setting, function( obj ) {

				obj.set( palette );
			} );
		}
	);

	/* === Radio Image Control === */

	// Check if the `buttonset()` function exists. If it does, use it for radio images.
	if ( jQuery.isFunction( jQuery.fn.buttonset ) ) {
		jQuery( '.customize-control-radio-image .buttonset' ).buttonset();
	}

	// Handles setting the new value in the customizer.
	jQuery( '.customize-control-radio-image input:radio' ).change(
		function() {
			// Get the name of the setting.
			var setting = jQuery( this ).attr( 'data-customize-setting-link' );

			// Get the value of the currently-checked radio input.
			var image = jQuery( this ).val();

			// Set the new value.
			wp.customize( setting, function( obj ) {

				obj.set( image );
			} );
		}
	);

	/* === Checkbox Multiple Control === */

	jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).change(
		function() {

			// Get all of the checkbox values and join them in a comma-separated string.
			checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
				function() {
					return this.value;
				}
			).get().join( ',' );

			// Get the hidden input element (where we're storing comma-separated values).
			var hidden = jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' );

			// Update the hidden input value with the comma-separated checkbox values.
			jQuery( hidden ).val( checkbox_values );

			// Set the new value.
			wp.customize(
				jQuery( hidden ).attr( 'data-customize-setting-link' ),
				function( obj ) {

					var value = jQuery( hidden ).val();

					if ( null === value ) {
						obj.set( '' );
					} else {
						obj.set( value );
					}
				}
			);
		}
	);

	/* === Select Group Control === */

	// Handles setting the new value in the customizer.
	jQuery( '.customize-control-select-group select' ).change(
		function() {
			var choice = jQuery( this );

			// Set the new value.
			wp.customize(
				jQuery( choice ).attr( 'data-customize-setting-link' ),
				function( obj ) {
					obj.set( jQuery( choice ).val() );
				}
			);
		}
	);

	/* === Select Multiple Control === */

	// Handles setting the new value in the customizer.
	jQuery( '.customize-control-select-multiple select' ).change(
		function() {
			var choice = jQuery( this );

			// Set the new value.
			wp.customize(
				jQuery( choice ).attr( 'data-customize-setting-link' ),
				function( obj ) {

					var value = jQuery( choice ).val();

					if ( null === value ) {
						obj.set( '' );
					} else {
						obj.set( value );
					}
				}
			);
		}
	);

} ); // jQuery( document ).ready