<?php
/**
 * Consent Toggle Sidebar
 *
 * @package termly
 */

global $current_screen;
$termly_api_key = get_option( 'termly_api_key', false );
$display_banner = ( 'yes' === get_option( 'termly_display_banner', 'no' ) );

?>
<div class="termly-consent-sidebar">

	<div id="termly-consent-toggle-setting-error">
		<p><strong><?php esc_html_e( 'Settings saved.', 'uk-cookie-consent' ); ?></strong></p>
	</div>

	<div class="consent-header">

		<label class="toggle" for="termly-display-banner-toggle">
			<input
				type="checkbox"
				class="toggle__input"
				id="termly-display-banner-toggle"
				name="termly_banner_settings[display_banner]"
				<?php echo ( false === $termly_api_key || empty( $termly_api_key ) ? ' disabled="disabled"' : '' ); ?>
				<?php checked( $display_banner ); ?>
				/>
			<span class="toggle-track">
				<span class="toggle-indicator"></span>
			</span>
			<?php esc_html_e( 'Consent Banner', 'uk-cookie-consent' ); ?>
		</label>
	</div>

	<p><?php esc_html_e( 'Enable the consent banner to start notifying  visitors to your site of your tracking practices. Request consent before serving cookies and other tracking mechanisms.', 'uk-cookie-consent' ); ?></p>

	<a href="<?php echo esc_attr( termly\Urls::get_banner_settings_link() ); ?>" class="settings-link">
		<?php esc_html_e( 'Banner Settings', 'uk-cookie-consent' ); ?>
	</a>

</div>
