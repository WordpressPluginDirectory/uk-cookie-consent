<?php
/**
 * This file contains the Site Scan controller class.
 *
 * @package termly
 */

namespace termly;

/**
 * This class handles the routing for the dashboard experience.
 */
class Sign_Up_Controller extends Menu_Controller {

	/**
	 * Hooks into WordPress for this class.
	 *
	 * @return void
	 */
	public static function hooks() {

		// Register and enqueue global admin styles.
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'admin_global_styles' ] );

		// Run the standard menu hooks.
		parent::hooks();

	}

	/**
	 * Register and enqueue global admin styles.
	 *
	 * @return void
	 */
	public static function admin_global_styles() {

		wp_register_style(
			'admin-global',
			TERMLY_URL . 'dist/css/termly.css',
			[],
			TERMLY_VERSION
		);
		wp_enqueue_style( 'admin-global' );

	}

	/**
	 * Register the menu.
	 *
	 * @return void
	 */
	public static function menu() {

		add_menu_page(
			'Termly',
			'Termly',
			'manage_options',
			'termly',
			[ __CLASS__, 'menu_page' ]
		);

	}

	/**
	 * Render the menu page output.
	 *
	 * @return void
	 */
	public static function menu_page() {

		require_once TERMLY_VIEWS . 'sign-up.php';

	}

}
Sign_Up_Controller::hooks();
