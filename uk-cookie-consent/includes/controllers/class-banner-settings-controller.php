<?php
/**
 * This file contains the Banner Settings controller class.
 *
 * @package termly
 */

namespace termly;

/**
 * This class handles the routing for the dashboard experience.
 */
class Banner_Settings_Controller extends Menu_Controller {

	/**
	 * Hooks into WordPress for this class.
	 *
	 * @return void
	 */
	public static function hooks() {

		add_action( 'admin_menu', [ __CLASS__, 'menu' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'scripts' ], 10, 1 );

		// Register our settings.
		add_action( 'admin_init', [ __CLASS__, 'register_settings' ] );

		// Register JSON Endpoint.
		add_action( 'rest_api_init', [ __CLASS__, 'register_consent_toggle_endpoint' ] );

	}

	/**
	 * Register the menu.
	 *
	 * @return void
	 */
	public static function menu() {

		add_submenu_page(
			'termly',
			__( 'Banner Settings', 'uk-cookie-consent' ),
			__( 'Banner Settings', 'uk-cookie-consent' ),
			'manage_options',
			'banner-settings',
			[ __CLASS__, 'menu_page' ]
		);

	}

	/**
	 * Render the menu page output.
	 *
	 * @return void
	 */
	public static function menu_page() {

		require_once TERMLY_VIEWS . 'banner-settings.php';

	}

	/**
	 * Enqueue scripts.
	 *
	 * @param string $hook The current page hook.
	 * @return void
	 */
	public static function scripts( $hook ) {

		$screen = get_current_screen();

		if ( strpos( $screen->base, 'termly' ) !== false ) {

			wp_enqueue_script(
				'termly-consent-toggle',
				TERMLY_DIST . 'js/consent-toggle.js',
				[],
				TERMLY_VERSION,
				true
			);

			wp_localize_script(
				'termly-consent-toggle',
				'termly_consent_toggle',
				[
					'nonce'      => wp_create_nonce( 'wp_rest' ),
					'update_url' => rest_url( 'termly/v1/consent-toggle' ),
				]
			);

		}

		if ( 'termly_page_banner-settings' !== $hook ) {
			return;
		}

		wp_enqueue_script(
			'termly-banner-settings',
			TERMLY_DIST . 'js/banner-settings.js',
			[ 'jquery' ],
			TERMLY_VERSION,
			true
		);

		wp_localize_script(
			'termly-banner-settings',
			'termly_banner_settings',
			[
				'copy_success' => __( 'The code snippet has been copied to your clipboard.', 'uk-cookie-consent' ),
				'copy_failure' => __( 'The code snippet could not be copied to your clipboard. Please copy the script manually.', 'uk-cookie-consent' ),
			]
		);

	}

	/**
	 * Add associated settings.
	 *
	 * @return void
	 */
	public static function register_settings() {

		// Register the API Key Setting.
		register_setting(
			'termly_banner_settings',
			'termly_banner_settings',
			[
				'sanitize_callback' => [ __CLASS__, 'sanitize_settings' ],
			]
		);

		// Add a section to the Settings API.
		add_settings_section(
			'termly_banner_settings_section',
			'',
			'__return_null',
			'termly_banner_settings'
		);

		add_settings_field(
			'termly_banner_settings',
			'',
			'__return_null', // Print this field with the custom view.
			'termly_banner_settings',
			'termly_banner_settings_section'
		);

	}

	/**
	 * Save settings.
	 *
	 * @param  array $dirty The raw data.
	 * @return array
	 */
	public static function sanitize_settings( $dirty = [] ) {

		if ( ! is_array( $dirty ) || empty( $dirty ) ) {
			update_option( 'termly_display_auto_blocker', 'off' );
			update_option( 'termly_display_custom_map', 'off' );
			update_option(
				'termly_custom_blocking_map',
				[
					'essential'   => '',
					'advertising' => '',
					'analytics'   => '',
					'performance' => '',
					'social'      => '',
				]
			);
			return $dirty;
		}

		$auto_block = isset( $dirty['auto_block'] ) && 'on' === $dirty['auto_block'] ? 'on' : 'off';
		update_option( 'termly_display_auto_blocker', $auto_block );

		$custom_map = isset( $dirty['custom_map'] ) && 'on' === $dirty['custom_map'] ? 'on' : 'off';
		update_option( 'termly_display_custom_map', $custom_map );

		$custom_blocking_map = [
			'essential'   => isset( $dirty['blocking_map_essential'] ) ? sanitize_textarea_field( wp_unslash( $dirty['blocking_map_essential'] ) ) : '',
			'advertising' => isset( $dirty['blocking_map_advertising'] ) ? sanitize_textarea_field( wp_unslash( $dirty['blocking_map_advertising'] ) ) : '',
			'analytics'   => isset( $dirty['blocking_map_analytics'] ) ? sanitize_textarea_field( wp_unslash( $dirty['blocking_map_analytics'] ) ) : '',
			'performance' => isset( $dirty['blocking_map_performance'] ) ? sanitize_textarea_field( wp_unslash( $dirty['blocking_map_performance'] ) ) : '',
			'social'      => isset( $dirty['blocking_map_social'] ) ? sanitize_textarea_field( wp_unslash( $dirty['blocking_map_social'] ) ) : '',
		];
		update_option( 'termly_custom_blocking_map', $custom_blocking_map );

		return $dirty;

	}

	/**
	 * Register a RESET API endpoint.
	 *
	 * @return void
	 */
	public static function register_consent_toggle_endpoint() {

		register_rest_route(
			'termly/v1',
			'/consent-toggle',
			[
				'methods'             => 'POST',
				'callback'            => [ __CLASS__, 'handle_consent_toggle' ],
				'permission_callback' => [ __CLASS__, 'consent_toggle_permissions' ],
			]
		);

	}

	/**
	 * Check if the user has the correct permissions.
	 *
	 * @return boolean
	 */
	public static function consent_toggle_permissions() {

		return current_user_can( 'manage_options' );

	}

	/**
	 * Undocumented function
	 *
	 * @param  \WP_REST_Request $request The request object.
	 * @return mixed
	 */
	public static function handle_consent_toggle( \WP_REST_Request $request ) {

		if ( check_ajax_referer( 'wp_rest', '_wpnonce', false ) ) {

			$data = [
				'success' => false,
				'message' => __( 'Invalid nonce.', 'uk-cookie-consent' ),
			];

		} else {

			$display_banner = true === $request->get_param( 'active' ) ? 'yes' : 'no';
			update_option( 'termly_display_banner', $display_banner );

			$data = [
				'success' => true,
				'message' => __( 'Banner settings updated.', 'uk-cookie-consent' ),
			];

		}

		// Create the response object.
		return new \WP_REST_Response( $data );

	}

}
Banner_Settings_Controller::hooks();
