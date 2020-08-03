/**
 * File customizer-controls.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Init Controls Conditions
	wp.customize.bind( 'ready', function() {

		var ocularisControlsConditions = window.ocularisControlsConditions,
			ocularisControlsTools  = {
				isArray: function( value ) {
					return $.isArray( value );
				},

				inArray: function( value, array ) {
					return ($.inArray( value, array ) !== -1);
				}
			};

		if ( undefined !== ocularisControlsConditions ) {

			$.each( ocularisControlsConditions, function( control_id, conditions ) {

				wp.customize.control( control_id, function( control ) {

					var visibility = function() {
						var is_visible = true;

						$.each( conditions, function( setting_id, condition ) {
							var check = false,
								isNegativeCondition = setting_id.lastIndexOf( '!' ) !== -1;

							setting_id = setting_id.replace( '!', '' );

							if ( ocularisControlsTools.isArray( condition ) ) {
								check = ocularisControlsTools.inArray( wp.customize( setting_id ).get(), condition );
							} else {
								check = condition === wp.customize( setting_id ).get();
							}

							if ( isNegativeCondition ) {
								check = ! check;
							}

							if ( ! check ) {
								is_visible = false;
								return false;
							}
						} );

						if ( is_visible ) {
							control.container.show();
						} else {
							control.container.hide();
						}
					};

					visibility();
					$.each( conditions, function( setting_id, condition ) {
						setting_id = setting_id.replace( '!', '' );
						wp.customize( setting_id ).bind( visibility );
					} );

				} );
			} );
		}
	});

} )( jQuery );
