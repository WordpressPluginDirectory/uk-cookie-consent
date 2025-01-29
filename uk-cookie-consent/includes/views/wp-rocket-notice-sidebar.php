<?php
/**
 * This file contains the WP Rocket notice sidebar.
 *
 * @package termly
 */

$termly_api_key = get_option( 'termly_api_key', false );
if ( false !== $termly_api_key && ! empty( $termly_api_key ) ) {
	global $current_screen;
	?>
<div class="termly-wp-rocket-sidebar">

	<h2><?php esc_html_e( 'Termly recommends', 'uk-cookie-consent' ); ?></h2>

	<h3><?php esc_html_e( 'Speed up your website, instantly', 'uk-cookie-consent' ); ?></h3>
	<p>
		<?php
		printf( // translators: %1$s is the opening strong tag, %2$s is the closing strong tag.
			esc_html__( 'WP Rocket is the %1$seasiest and most powerful%2$s WordPress plugin to speed up your website instantly and save time and effort.', 'uk-cookie-consent' ),
			'<strong>',
			'</strong>'
		);
		?>
	</p>

	<div class="termly-wp-rocket-button-container">
		<a class="termly-wp-rocket-button" href="https://wp-rocket.me/termly/?utm_campaign=termly-benefits&utm_source=termly&utm_medium=partners" target="_blank"><?php esc_html_e( 'Get 20% OFF', 'uk-cookie-consent' ); ?></a>
		<img class="termly-wp-rocket-image" src="<?php echo esc_url( TERMLY_URL . 'src/images/logo-black-wp-rocket.png' ); ?>" width="117" height="31" alt="<?php esc_attr_e( 'WP Rocket Logo', 'uk-cookie-consent' ); ?>" />
	</div>

</div>
<?php } // endif ?>
