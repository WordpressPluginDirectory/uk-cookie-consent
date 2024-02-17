<?php
/**
 * This file contains robots.txt file modifications.
 *
 * @package termly
 */

namespace termly;

/**
 * This class handles robots.txt file modifications.
 */
class Robots_Txt {

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public static function hooks() {

		\add_filter( 'robots_txt', [ __CLASS__, 'virtual' ], 10, 1 );

	}

	/**
	 * Hook into the "virtual" robots.txt that WordPress provides.
	 *
	 * @param  string $file The file content.
	 * @return string $file
	 */
	public static function virtual( $file = '' ) {

		return '# Termly scanner
User-agent: TermlyBot
Allow: /

' . $file;

	}

	/**
	 * Check for an actual robots.txt file and add the allow line.
	 *
	 * @return void
	 */
	public static function add_allow_line() {

		// Include filesystem functionality.
		require_once ABSPATH . 'wp-admin/includes/file.php';

		// Check that the robots file exists.
		$robots_path = ABSPATH . '/robots.txt';
		if ( ! file_exists( $robots_path ) || ! is_file( $robots_path ) ) {
			return;
		}

		// Initialize the filesystem API.
		global $wp_filesystem;

		$url = \wp_nonce_url(
			\add_query_arg(
				[
					'page' => 'termly',
				],
				\admin_url( 'admin.php' )
			),
			'termly-robots-nonce'
		);

		// Create and test creds.
		$creds = \request_filesystem_credentials( $url, '', false, false, null );
		if ( false === $creds ) {
			return;
		}

		if ( ! \WP_Filesystem( $creds ) ) {
			// Prompt user to enter credentials.
			\request_filesystem_credentials( $url, '', true, false, null );
			return;
		}

		// Check to see if the robots file already has the rule.
		$robots_content = $wp_filesystem->get_contents( $robots_path );
		$scrapy_rule    = '/User-agent: Scrapy\nAllow: \//';
		$robots_rule    = '# Termly scanner
User-agent: TermlyBot
Allow: /';

		// Remove the Scrapy rule if it exists.
		if ( 1 === preg_match( $scrapy_rule, $robots_content ) ) {
			$robots_content = preg_replace( $scrapy_rule, '', $robots_content );
		}

		// Check if the termly bot rule already exists.
		if ( false !== strpos( $robots_content, $robots_rule ) ) {
			return;
		}

		$robots_content = $robots_rule . '

' . $robots_content;

		// Prepend the rule. Robots file is read top to bottom.
		$wp_filesystem->put_contents( $robots_path, $robots_content, FS_CHMOD_FILE );

	}

	/**
	 * Check for an actual robots.txt file with the allo wline and remove it.
	 *
	 * @return void
	 */
	public static function remove_allow_line() {

		// Include filesystem functionality.
		require_once ABSPATH . 'wp-admin/includes/file.php';

		// Check that the robots file exists.
		$robots_path = ABSPATH . '/robots.txt';
		if ( ! file_exists( $robots_path ) || ! is_file( $robots_path ) ) {
			return;
		}

		// Initialize the filesystem API.
		global $wp_filesystem;

		$url = \wp_nonce_url(
			\add_query_arg(
				[
					'page' => 'termly',
				],
				\admin_url( 'admin.php' )
			),
			'termly-robots-nonce'
		);

		// Create and test creds.
		$creds = \request_filesystem_credentials( $url, '', false, false, null );
		if ( false === $creds ) {
			return;
		}

		if ( ! \WP_Filesystem( $creds ) ) {
			// Prompt user to enter credentials.
			\request_filesystem_credentials( $url, '', true, false, null );
			return;
		}

		// Check to see if the robots file already has the rule.
		$robots_content = $wp_filesystem->get_contents( $robots_path );
		$rules          = '/(User-agent: Scrapy\nAllow: \/|# Termly scanner\nUser-agent: TermlyBot\nAllow: \/)/';

		// Remove the Scrapy rule if it exists.
		if ( 1 === preg_match( $rules, $robots_content ) ) {
			$robots_content = preg_replace( $rules, '', $robots_content );
		}

		// Prepend the rule. Robots file is read top to bottom.
		$wp_filesystem->put_contents( $robots_path, $robots_content, FS_CHMOD_FILE );

	}

}

Robots_Txt::hooks();
