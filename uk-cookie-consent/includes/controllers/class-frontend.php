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

			$map_items = [];

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

			foreach ( $custom_blocking_map as $key => $value ) {

				$custom_urls = explode( ',', $value );
				if ( is_array( $custom_urls ) && count( $custom_urls ) > 0 && ! empty( $custom_urls[0] ) ) {

					foreach ( $custom_urls as $custom_url ) {

						$map_items[] = sprintf(
							'"%s": "%s"',
							esc_js( trim( $custom_url ) ),
							esc_js( $key )
						);

					}

				}

			}

			printf(
				'<script data-termly-config>
					window.TERMLY_CUSTOM_BLOCKING_MAP = {
						%s
					}
				</script>',
				implode( ', ', $map_items ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
