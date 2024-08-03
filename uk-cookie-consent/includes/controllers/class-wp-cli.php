<?php
/**
 * Termly WP-CLI commands.
 *
 * @package termly
 */

namespace termly;

/**
 * WP-CLI commands.
 */
class WP_Cli {

	/**
	 * Saves the API key to the database.
	 *
	 * @param array $args       The arguments passed to the command.
	 * @param array $assoc_args The associative arguments passed to the command.
	 *
	 * ## OPTIONS
	 *
	 * <api_key>
	 * : The API key from Termly - https://app.termly.io/dashboard/website/api-key.
	 *
	 * [--enable-banner=<enable_banner>]
	 * : Whether or not to immediately enable the banner once activated.
	 * ---
	 * default: false
	 * options:
	 *   - true
	 *   - false
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp termly setup "your_api_key" --enable-banner=true
	 *
	 * @when after_wp_load
	 */
	public static function setup( $args, $assoc_args ) {

		// Grab the API Key from the arguments.
		list( $api_key ) = $args;

		if ( '' === $api_key ) {
			\WP_CLI::error( __( 'The API Key can not be empty.', 'uk-cookie-constent' ) );
		}

		// 1. Save the API key to the database.
		update_option( 'termly_api_key', sanitize_text_field( $api_key ) );

		// 2. Get the Website data from the Termly API and save it to the database.
		$response = Termly_API_Controller::call( 'GET', 'website' );
		if ( 200 === wp_remote_retrieve_response_code( $response ) && ! is_wp_error( $response ) ) {

			update_option( 'termly_website', json_decode( wp_remote_retrieve_body( $response ) ), false );
			Termly_API_Model::store_business_settings_from_api();

		} else {

			// Error handling for the Termly API Response.
			$type    = 'error';
			$message = __( 'The API Key entered is not valid.', 'uk-cookie-constent' );
			$value   = '';

			if ( is_wp_error( $response ) ) {

				$message = $response->get_error_message();

			} elseif ( 400 === wp_remote_retrieve_response_code( $response ) ) {

				$body = json_decode( wp_remote_retrieve_body( $response ) );

				if ( property_exists( $body, 'error' ) ) {

					$message = $body->error;

				} else {

					$message = wp_remote_retrieve_response_message( $response );

				}

			}

		}

		// Automatically activate when the API key is set?
		$enable_banner = $assoc_args['enable-banner'];
		if ( 'true' === $enable_banner ) {
			update_option( 'termly_display_banner', 'yes' );
		} else {
			update_option( 'termly_display_banner', 'no' );
		}

	}

	/**
	 * Grabs latest data from Termly API and saves it to the database.
	 *
	 * ## EXAMPLES
	 *
	 *     wp termly fetch-data
	 *
	 * @when after_wp_load
	 */
	public static function fetch_data() {

		// Grab the API Key from the arguments.
		$api_key = get_option( 'termly_api_key' );

		if ( '' === $api_key ) {
			\WP_CLI::error( __( 'The API Key can not be empty.', 'uk-cookie-constent' ) );
		}

		// Get the Website data from the Termly API and save it to the database.
		$response = Termly_API_Controller::call( 'GET', 'website' );
		if ( 200 === wp_remote_retrieve_response_code( $response ) && ! is_wp_error( $response ) ) {

			update_option( 'termly_website', json_decode( wp_remote_retrieve_body( $response ) ), false );
			Termly_API_Model::store_business_settings_from_api();

		} else {

			// Error handling for the Termly API Response.
			$type    = 'error';
			$message = __( 'The API Key entered is not valid.', 'uk-cookie-constent' );
			$value   = '';

			if ( is_wp_error( $response ) ) {

				$message = $response->get_error_message();

			} elseif ( 400 === wp_remote_retrieve_response_code( $response ) ) {

				$body = json_decode( wp_remote_retrieve_body( $response ) );

				if ( property_exists( $body, 'error' ) ) {

					$message = $body->error;

				} else {

					$message = wp_remote_retrieve_response_message( $response );

				}

			}

		}

	}

	/**
	 * Turns the banner on.
	 *
	 * ## EXAMPLES
	 *
	 *     wp termly banner on
	 *
	 * @when after_wp_load
	 */
	public static function enable_banner() {

		update_option( 'termly_display_banner', 'yes' );

	}

	/**
	 * Turns the banner off.
	 *
	 * ## EXAMPLES
	 *
	 *     wp termly banner off
	 *
	 * @when after_wp_load
	 */
	public static function disable_banner() {

		update_option( 'termly_display_banner', 'no' );

	}

	/**
	 * Resets the plugin.
	 *
	 * ## EXAMPLES
	 *
	 *     wp termly reset
	 *
	 * @when after_wp_load
	 */
	public static function reset() {

		// Transients.
		delete_transient( 'termly-feature-set' );
		delete_transient( 'termly-site-scan-results' );

		// Core data.
		delete_option( 'termly_api_key' );
		delete_option( 'termly_website' );
		delete_option( 'termly_business_info' );
		delete_option( 'termly_business_settings' );

		// Banner Settings.
		delete_option( 'termly_banner' );
		delete_option( 'termly_banner_settings' );
		delete_option( 'termly_cookie_preference_button' );

		// Site Scan.
		delete_option( 'termly_site_scan' );

		// Banner display booleans.
		delete_option( 'termly_display_banner' );
		delete_option( 'termly_display_auto_blocker' );
		delete_option( 'termly_display_custom_map' );
		delete_option( 'termly_custom_blocking_map' );

		// Unschedule Cron Events.
		wp_unschedule_hook( 'termly_account_update' );

	}

}

\WP_CLI::add_command( 'termly setup', array( '\termly\WP_Cli', 'setup' ) );
\WP_CLI::add_command( 'termly banner on', array( '\termly\WP_Cli', 'enable_banner' ) );
\WP_CLI::add_command( 'termly banner off', array( '\termly\WP_Cli', 'disable_banner' ) );
\WP_CLI::add_command( 'termly fetch-data', array( '\termly\WP_Cli', 'fetch_data' ) );
\WP_CLI::add_command( 'termly reset', array( '\termly\WP_Cli', 'reset' ) );
