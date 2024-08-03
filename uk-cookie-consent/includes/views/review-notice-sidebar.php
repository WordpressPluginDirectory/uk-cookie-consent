<?php
/**
 * This file contains the review notice sidebar.
 *
 * @package termly
 */

$termly_api_key = get_option( 'termly_api_key', false );
if ( false !== $termly_api_key && !empty( $termly_api_key ) && ! termly\Account_API_Controller::is_free() ) {
	global $current_screen;
	?>
<div class="termly-review-sidebar">

	<h2><?php esc_html_e( 'Enjoy Using Termly?', 'uk-cookie-consent' ); ?></h2>

	<p>
		<?php
		printf(
			'%s <a href="%s" target="_blank">%s</a>.',
			esc_html_e( 'Please take a few seconds to', 'uk-cookie-consent' ),
			esc_attr( termly\Urls::get_review_url() ),
			esc_html__( 'rate us on WordPress.org', 'uk-cookie-consent' )
		);
		?>
	</p>

	<p class="termly-stars">
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
		<span class="dashicons dashicons-star-filled"></span>
	</p>

</div>
<?php } // endif ?>
