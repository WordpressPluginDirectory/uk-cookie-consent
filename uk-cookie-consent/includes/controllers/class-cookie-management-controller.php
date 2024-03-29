<?php
/**
 * This file contains the Cookie Management controller class.
 *
 * @package termly
 */

namespace termly;

/**
 * This class handles the routing for the dashboard experience.
 */
class Cookie_Management_Controller extends Menu_Controller {

	/**
	 * Hooks into WordPress for this class.
	 *
	 * @return void
	 */
	public static function hooks() {

		add_action( 'admin_menu', [ __CLASS__, 'menu' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'scripts' ], 10, 1 );

	}

	/**
	 * Register the menu.
	 *
	 * @return void
	 */
	public static function menu() {

		add_submenu_page(
			'termly',
			__( 'Cookie Management', 'uk-cookie-consent' ),
			__( 'Cookie Management', 'uk-cookie-consent' ),
			'manage_options',
			'cookie-management',
			[ __CLASS__, 'menu_page' ]
		);

	}

	/**
	 * Render the menu page output.
	 *
	 * @return void
	 */
	public static function menu_page() {

		require_once TERMLY_VIEWS . 'cookie-management.php';

	}

	/**
	 * Enqueue scripts.
	 *
	 * @param string $hook The current page hook.
	 * @return void
	 */
	public static function scripts( $hook ) {

		if ( 'termly_page_cookie-management' !== $hook ) {
			return;
		}

		wp_enqueue_script(
			'termly-cookie-management',
			TERMLY_DIST . 'js/cookie-management.js',
			[ 'jquery' ],
			TERMLY_VERSION,
			true
		);

	}

}
Cookie_Management_Controller::hooks();
