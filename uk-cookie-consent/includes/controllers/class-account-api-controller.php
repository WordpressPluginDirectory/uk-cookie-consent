<?php
/**
 * Account API Controller
 *
 * @package UKCookieConsent
 */

namespace termly;

/**
 * Account API Controller class.
 */
class Account_API_Controller {

	/**
	 * Hooks into WordPress for this class.
	 *
	 * @return void
	 */
	public static function hooks() {

		// Listen for remote updates.
		add_action( 'rest_api_init', [ __CLASS__, 'add_rewrite_rule' ] );

		// Schedule daily updates.
		add_action( 'init', [ __CLASS__, 'maybe_schedule_cron' ] );
		add_action( 'termly_account_update', [ __CLASS__, 'update_account_status' ] );

	}

	/**
	 * Adds the rewrite rule for the account status endpoint.
	 *
	 * @return void
	 */
	public static function add_rewrite_rule() {

		register_rest_route(
			'termly/v1',
			'account-status',
			[
				'methods'             => 'POST',
				'callback'            => [ __CLASS__, 'update_account_status' ],
				'permission_callback' => '__return_true',
			]
		);

	}

	/**
	 * Maybe schedule the cron job.
	 *
	 * @return void
	 */
	public static function maybe_schedule_cron() {

		if ( ! wp_next_scheduled( 'termly_account_update' ) || ( is_admin() && isset( $_REQUEST['update-account'] ) ) ) {

			wp_schedule_event( time(), 'daily', 'termly_account_update' );

		}

	}

	/**
	 * Update the account status.
	 *
	 * @return WP_REST_Response
	 */
	public static function update_account_status() {

		$banner_key            = 'termly_banner';
		$cookie_preference_key = 'termly_cookie_preference_button';
		$website_key           = 'termly_website';

		// Fetch the banner and cookie preference code if we don't have a cached copy.
		$response = Termly_API_Controller::call( 'GET', 'website' );
		if ( 200 === wp_remote_retrieve_response_code( $response ) && ! is_wp_error( $response ) ) {

			// Cache the website object.
			$website = json_decode( wp_remote_retrieve_body( $response ) );
			update_option( $website_key, $website, false );

			if ( property_exists( $website, 'code_snippet' ) ) {

				// Get the code snippet.
				if ( property_exists( $website->code_snippet, 'banner' ) ) {

					$banner = $website->code_snippet->banner;
					update_option( $banner_key, $banner, false );

				}

				// Get the cookie preference button.
				if ( property_exists( $website->code_snippet, 'cookie_preference_button' ) ) {

					$cookie_preference_button = $website->code_snippet->cookie_preference_button;
					update_option( $cookie_preference_key, $cookie_preference_button, false );

				}

			}

		} else {

			return rest_ensure_response( [ 'message' => __( 'Failed to update account status.', 'uk-cookie-consent' ) ] );

		}

		return rest_ensure_response( [ 'message' => __( 'Account status updated.', 'uk-cookie-consent' ) ] );

	}

	/**
	 * Check if the plugin is using a free account to communicate with the API.
	 *
	 * @return bool
	 */
	public static function is_free() {

		$website = get_option( 'termly_website', (object) [ 'active_subscription' => false ] );
		if ( ! $website || ! property_exists( $website, 'active_subscription' ) || false === $website->active_subscription ) {
			return true;
		}

		return false;

	}

}
Account_API_Controller::hooks();
