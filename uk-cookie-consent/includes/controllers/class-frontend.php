<?php
/**
 * This class handles the frontend functionality.
 *
 * @package termly
 */

namespace termly;

/**
 * This class handles the frontend functionality.
 */
class Frontend {

	/**
	 * Hooks into WordPress for this class.
	 *
	 * @return void
	 */
	public static function hooks() {

		// Embed the snippet.
		add_action( 'wp_head', [ __CLASS__, 'embed_banner' ], PHP_INT_MIN );

	}

	/**
	 * Embed the snippet.
	 *
	 * @return void
	 */
	public static function embed_banner() {

		$display_banner = get_option( 'termly_display_banner', 'no' );
		if ( 'yes' !== $display_banner ) {
			return;
		}

		$website    = get_option( 'termly_website', (object) [ 'uuid' => 0 ] );
		$auto_block = get_option( 'termly_display_auto_blocker', 'off' );
		$custom_map = get_option( 'termly_display_custom_map', 'off' );

		if ( 'on' === $custom_map ) {

			$custom_blocking_map = get_option( 'termly_custom_blocking_map' );
			$custom_blocking_map = wp_parse_args(
				$custom_blocking_map,
				[
					'essential'   => '',
					'advertising' => '',
					'analytics'   => '',
					'performance' => '',
					'social'      => '',
				]
			);

			printf(
				'<script data-termly-config>
					window.TERMLY_CUSTOM_BLOCKING_MAP = {
						"%s": "essential",
						"%s": "advertising",
						"%s": "analytics",
						"%s": "performance",
						"%s": "social_networking"
					}
				</script>',
				esc_js( $custom_blocking_map['essential'] ),
				esc_js( $custom_blocking_map['advertising'] ),
				esc_js( $custom_blocking_map['analytics'] ),
				esc_js( $custom_blocking_map['performance'] ),
				esc_js( $custom_blocking_map['social'] )
			);

		}

		printf(
			'<script
				type="text/javascript"
				src="https://app.termly.io/resource-blocker/%s%s">
			</script>',
			esc_js( $website->uuid ),
			( 'off' !== $auto_block ? esc_attr( '?autoBlock=' . $auto_block ) : '' )
		);

	}

}

Frontend::hooks();
