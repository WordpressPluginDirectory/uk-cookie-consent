<?php
/**
 * Handles the display of the Banner Settings admin page.
 *
 * @package termly
 */

$customize_banner_link = add_query_arg(
	[
		'utm_source'  => 'termy_wp_plugin',
		'utm_content' => 'banner_settings',
	],
	termly\Urls::get_customize_banner_link()
);

$auto_block = 'on' === get_option( 'termly_display_auto_blocker', 'off' );
$custom_map = 'on' === get_option( 'termly_display_custom_map', 'off' );

$blocking_map = get_option(
	'termly_custom_blocking_map',
	[
		'essential'   => '',
		'advertising' => '',
		'analytics'   => '',
		'performance' => '',
		'social'      => '',
	]
);

?>
<div class="wrap termly termly-banner-settings">

	<div class="termly-content-wrapper">

		<div class="termly-content-cell termly-left-column">
			<div class="termly-content-header">
				<?php require plugin_dir_path( __FILE__ ) . 'header-logo.php'; ?>
				<h1 class="grower"><?php esc_html_e( 'Banner Settings', 'uk-cookie-consent' ); ?></h1>
				<div class="termly-dashboard-link-container">
					<a href="<?php echo esc_attr( $customize_banner_link ); ?>" target="_blank" class="customize-banner-link">
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
							<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
						</svg>
						<span><?php esc_html_e( 'Customize Banner', 'uk-cookie-consent' ); ?></span>
					</a>
				</div>
			</div>

			<?php settings_errors( 'termly_banner_settings' ); ?>
			<hr class="wp-header-end">

			<div class="content banner-settings">
				<form action='options.php' method='post'>
					<?php
						settings_fields( 'termly_banner_settings' );
						do_settings_sections( 'termly_banner_settings' );
					?>
					<!-- Auto Blocker -->
					<h2 class="title"><?php esc_html_e( 'Auto Blocker', 'uk-cookie-consent' ); ?></h2>
					<p>
						<?php
						printf(
							wp_kses(
								// Translators: %1$s is the Auto Blocker link, %2$s is the Custom Blocking Map link, %3$s is the Manual Blocking link.
								__(
									'<a href="%1$s" target="_blank">Auto Blocker</a> will automatically prevent scripts from running on your site until a visitor consents to their delivery. When Auto Blocker is enabled, you can customize how scripts are categorized using the <a href="%2$s" target="_blank">Custom Blocking Map</a>. If you do not use Auto Blocker, make sure to set up <a href="%3$s" target="_blank">manual blocking</a> to remain compliant.',
									'uk-cookie-consent'
								),
								[
									'a' => [
										'href'   => [],
										'target' => [],
									],
								]
							),
							'https://help.termly.io/support/solutions/articles/69000108867-how-does-auto-blocker-work-', // Auto Blocker link.
							'https://support.termly.io/en/articles/7904650-implementing-a-custom-blocking-map-to-change-auto-blocker-s-blocking-behavior', // Custom Blocking Map link.
							'https://help.termly.io/support/solutions/articles/69000108889-blocking-javascript-third-party-cookies-manually' // Manual Blocking link.
						);
						?>
					</p>

					<p id="termly-auto-block" class="<?php echo ( $auto_block ? 'active' : '' ); ?>"><label class="checkbox-container">
						<input
							id="termly-auto-block-input"
							value="on"
							type="checkbox"
							name="termly_banner_settings[auto_block]"
							<?php checked( $auto_block ); ?>
						>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="border" d="M3.5 6C3.5 4.61929 4.61929 3.5 6 3.5H18C19.3807 3.5 20.5 4.61929 20.5 6V18C20.5 19.3807 19.3807 20.5 18 20.5H6C4.61929 20.5 3.5 19.3807 3.5 18V6Z" fill="white" stroke="#CED4DA"/>
							<path class="checkmark" fill-rule="evenodd" clip-rule="evenodd" d="M15.4937 9.25628C15.8383 8.91457 16.397 8.91457 16.7416 9.25628C17.0861 9.59799 17.0861 10.152 16.7416 10.4937L11.4474 15.7437C11.1029 16.0854 10.5442 16.0854 10.1996 15.7437L7.25844 12.8271C6.91385 12.4853 6.91385 11.9313 7.25844 11.5896C7.60302 11.2479 8.16169 11.2479 8.50627 11.5896L10.8235 13.8876L15.4937 9.25628Z" fill="#4672FF"/>
						</svg>
						<span><?php esc_html_e( 'Enable Auto Blocker', 'uk-cookie-consent' ); ?></span>
					</label></p>

					<!-- Custom Blocking Map -->
					<p id="termly-custom-blocking-map" class="<?php echo ( $auto_block ? 'active' : '' ); ?>"><label class="checkbox-container">
						<input
							id="termly-custom-blocking-map-input"
							value="on"
							type="checkbox"
							name="termly_banner_settings[custom_map]"
							<?php checked( $custom_map ); ?>
						>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="border" d="M3.5 6C3.5 4.61929 4.61929 3.5 6 3.5H18C19.3807 3.5 20.5 4.61929 20.5 6V18C20.5 19.3807 19.3807 20.5 18 20.5H6C4.61929 20.5 3.5 19.3807 3.5 18V6Z" fill="white" stroke="#CED4DA"/>
							<path class="checkmark" fill-rule="evenodd" clip-rule="evenodd" d="M15.4937 9.25628C15.8383 8.91457 16.397 8.91457 16.7416 9.25628C17.0861 9.59799 17.0861 10.152 16.7416 10.4937L11.4474 15.7437C11.1029 16.0854 10.5442 16.0854 10.1996 15.7437L7.25844 12.8271C6.91385 12.4853 6.91385 11.9313 7.25844 11.5896C7.60302 11.2479 8.16169 11.2479 8.50627 11.5896L10.8235 13.8876L15.4937 9.25628Z" fill="#4672FF"/>
						</svg>
						<span><?php esc_html_e( 'Enable Custom Blocking Map', 'uk-cookie-consent' ); ?></span>
					</label></p>

					<!-- Custom Blocking Map Fields -->
					<div id="termly-custom-blocking-map-fields" class="<?php echo ( $custom_map ? 'active' : '' ); ?>">
						<h2 class="title"><?php esc_html_e( 'Custom Blocking Map', 'uk-cookie-consent' ); ?></h2>
						<p>
						<?php
						printf(
							wp_kses(
								// Translators: %1$s is the link to learn about the custom blocking map.
								__(
									'Define custom blocking map rules to apply to Auto Blocker. <a href="%1$s" target="_blank">Learn more</a>',
									'uk-cookie-consent'
								),
								[
									'a' => [
										'href'   => [],
										'target' => [],
									],
								]
							),
							'https://support.termly.io/en/articles/7904650-implementing-a-custom-blocking-map-to-change-auto-blocker-s-blocking-behavior' // Learn More Link.
						);
						?>
						</p>

						<table class="form-table">
						<tbody>
							<tr>
								<th><?php esc_html_e( 'Essential', 'uk-cookie-consent' ); ?></th>
								<td>
									<textarea placeholder="<?php esc_attr_e( 'Enter comma-separated domains', 'uk-cookie-consent' ); ?>" name="termly_banner_settings[blocking_map_essential]" id="termly-blocking-map-essential" class="large-text" rows="3"><?php echo esc_textarea( $blocking_map['essential'] ); ?></textarea>
								</td>
							</tr>
							<tr>
								<th><?php esc_html_e( 'Advertising', 'uk-cookie-consent' ); ?></th>
								<td>
									<textarea placeholder="<?php esc_attr_e( 'Enter comma-separated domains', 'uk-cookie-consent' ); ?>" name="termly_banner_settings[blocking_map_advertising]" id="termly-blocking-map-advertising" class="large-text" rows="3"><?php echo esc_textarea( $blocking_map['advertising'] ); ?></textarea>
								</td>
							</tr>
							<tr>
								<th><?php esc_html_e( 'Analytics and Customization', 'uk-cookie-consent' ); ?></th>
								<td>
									<textarea placeholder="<?php esc_attr_e( 'Enter comma-separated domains', 'uk-cookie-consent' ); ?>" name="termly_banner_settings[blocking_map_analytics]" id="termly-blocking-map-analytics" class="large-text" rows="3"><?php echo esc_textarea( $blocking_map['analytics'] ); ?></textarea>
								</td>
							</tr>
							<tr>
								<th><?php esc_html_e( 'Performance and Functionality', 'uk-cookie-consent' ); ?></th>
								<td>
									<textarea placeholder="<?php esc_attr_e( 'Enter comma-separated domains', 'uk-cookie-consent' ); ?>" name="termly_banner_settings[blocking_map_performance]" id="termly-blocking-map-performance" class="large-text" rows="3"><?php echo esc_textarea( $blocking_map['performance'] ); ?></textarea>
								</td>
							</tr>
							<tr>
								<th><?php esc_html_e( 'Social Media', 'uk-cookie-consent' ); ?></th>
								<td>
									<textarea placeholder="<?php esc_attr_e( 'Enter comma-separated domains', 'uk-cookie-consent' ); ?>" name="termly_banner_settings[blocking_map_social]" id="termly-blocking-map-social" class="large-text" rows="3"><?php echo esc_textarea( $blocking_map['social'] ); ?></textarea>
								</td>
							</tr>
						</tbody>
						</table>

					</div>

					<!-- Preference Center Button -->
					<h2 class="title"><?php esc_html_e( 'Preference Center Button', 'uk-cookie-consent' ); ?></h2>
					<p><?php esc_html_e( 'Your site visitors must be able to change their cookie preferences at any time. Add the code below to your website to add a button that will open your Cookie Preference Center, where your visitors will be able to easily change their consent settings.', 'uk-cookie-consent' ); ?></p>
					<div class="preference-center-snippet">
						<div class="preference-center-header">
							<h2><?php esc_html_e( 'Code Snippet', 'uk-cookie-consent' ); ?></h2>
							<button type="button" id="termly-copy-preference-center-snippet" class="button">
								<?php esc_html_e( 'Copy to clipboard', 'uk-cookie-consent' ); ?>
							</button>
						</div>
						<div class="preference-center-button-code">
							<?php esc_html_e( '<a href="#"', 'uk-cookie-consent' ); ?><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'onclick="window.displayPreferenceModal();return false;"', 'uk-cookie-consent' ); ?><br />
							&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'id="termly-consent-preferences">Consent Preferences</a>', 'uk-cookie-consent' ); ?>
						</div>
					</div>
					<?php submit_button(); ?>
				</form>
			</div>

		</div>

		<div class="termly-content-cell termly-right-column">

			<?php require TERMLY_VIEWS . 'consent-toggle-sidebar.php'; ?>
			<?php require TERMLY_VIEWS . 'upgrade-notice-sidebar.php'; ?>

		</div>

	</div>

</div>
