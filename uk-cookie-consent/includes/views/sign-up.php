<?php
/**
 * Handles the display of the Main Termly admin page.
 *
 * @package termly
 */

$dashboard_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'main-menu',
	],
	termly\Urls::get_dashboard_link()
);

?>
<div class="wrap termly termly-logged-out">

	<div class="termly-content-wrapper">

		<div class="termly-content-cell termly-left-column">
			<div class="termly-content-header">
				<?php require plugin_dir_path( __FILE__ ) . 'header-logo.php'; ?>
				<h1 class="grower"><?php esc_html_e( 'Termly', 'uk-cookie-consent' ); ?></h1>
				<div class="termly-dashboard-link-container">
					<a href="<?php echo esc_attr( $dashboard_link ); ?>" target="_blank">
						<span><?php esc_html_e( 'Go to Termly Dashboard', 'uk-cookie-consent' ); ?></span>
						<svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M2.08997 10.91L7.08997 5.91L2.08997 0.910004L0.909973 2.09L4.74997 5.91L0.909973 9.73L2.08997 10.91Z" fill="#4672FF"/>
						</svg>
					</a>
				</div>
			</div>
			<?php settings_errors( 'termly_business_info' ); ?>
			<?php settings_errors( 'termly_api_key' ); ?>

			<?php if ( ! isset( $_REQUEST['action'] ) ) : ?>

			<div class="content">
				<h2 class="title"><?php esc_html_e( 'Sign up for Termly', 'uk-cookie-consent' ); ?></h2>
				<p class="note"><?php esc_html_e( 'The all-in-one site scanner, cookie management, consent banner and more. Designed to work with WordPress and keep you legally compliant. Create an account to to gain access to: ', 'uk-cookie-consent' ); ?></p>
				<ol>
					<li><?php esc_html_e( 'Free GDPR-, CCPA-, and ePrivacy-compliant cookie consent banner', 'uk-cookie-consent' ); ?></li>
					<li><?php esc_html_e( 'Automatic cookie consent & preference tracking', 'uk-cookie-consent' ); ?></li>
					<li><?php esc_html_e( 'Free legal policy generator', 'uk-cookie-consent' ); ?></li>
				</ol>
				<a href="<?php echo esc_attr( termly\Urls::get_sign_up_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Sign up & Get API Key', 'uk-cookie-consent' ); ?></a>
			</div>

			<div class="content termly-existing-user">
				<p class="note"><?php esc_html_e( 'Already have a Termly account? Enter your API key below.', 'uk-cookie-consent' ); ?></p>
				<form action='options.php' method='post'>
					<?php
						settings_fields( 'termly_api_key' );
						do_settings_sections( 'termly_api_key' );
						submit_button( __( 'Save API Key', 'uk-cookie-consent' ), 'secondary' );
					?>
				</form>
				<p class="additional-information"><?php esc_html_e( 'Log in to the Termly app to retrieve your API key.', 'uk-cookie-consent' ); ?> <a href="https://help.termly.io/support/solutions/articles/69000108290-how-do-i-install-the-consent-banner-on-wordpress-" target="_blank"><?php esc_html_e( 'Learn more', 'uk-cookie-consent' ); ?></a></p>
			</div>

			<?php else : ?>

			<div class="content termly-new-user">
				<h2 class="title"><?php esc_html_e( 'Sign up for Termly', 'uk-cookie-consent' ); ?></h2>

				<form action='options.php' method='post'>
					<?php
						settings_fields( 'termly_business_info' );
						do_settings_sections( 'termly_business_info' );

						require_once TERMLY_VIEWS . 'sign-up-notice.php';

						submit_button( __( 'Create Account', 'uk-cookie-consent' ) );
					?>
				</form>
			</div>
			<?php endif; ?>

			<div class="clear clearfix"></div>

		</div>

		<div class="termly-content-cell termly-right-column">

			<?php require TERMLY_VIEWS . 'consent-toggle-sidebar.php'; ?>
			<?php require TERMLY_VIEWS . 'upgrade-notice-sidebar.php'; ?>

		</div>

	</div>

</div>
