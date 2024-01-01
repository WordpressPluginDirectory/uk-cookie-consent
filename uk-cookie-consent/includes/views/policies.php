<?php
/**
 * Handles the display of the Banner Settings admin page.
 *
 * @package termly
 */

$dashboard_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_dashboard_link()
);

$privacy_policies_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_privacy_policy_link()
);

$cookie_policy_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_cookie_policy_link()
);

$terms_and_conditions_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_terms_and_conditions_link()
);

$eula_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_eula_link()
);

$return_policy_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_return_policy_link()
);

$disclaimer_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_disclaimer_link()
);

$shipping_policy_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_shipping_policy_link()
);

$acceptable_use_policy_link = add_query_arg(
	[
		'utm_source'  => 'termly_wp_plugin',
		'utm_content' => 'termly-policies',
	],
	termly\Urls::get_policies_acceptable_use_policy_link()
);

?>
<div class="wrap termly termly-banner-settings">

	<div class="termly-content-wrapper">

		<div class="termly-content-cell termly-left-column">
			<div class="termly-content-header">
				<?php require plugin_dir_path( __FILE__ ) . 'header-logo.php'; ?>
				<h1 class="grower"><?php esc_html_e( 'Policies', 'uk-cookie-consent' ); ?></h1>
				<div class="termly-dashboard-link-container">
					<a href="<?php echo esc_attr( $dashboard_link ); ?>" target="_blank">
						<span><?php esc_html_e( 'Go to Termly Dashboard', 'uk-cookie-consent' ); ?></span>
						<svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M2.08997 10.91L7.08997 5.91L2.08997 0.910004L0.909973 2.09L4.74997 5.91L0.909973 9.73L2.08997 10.91Z" fill="#4672FF"/>
						</svg>
					</a>
				</div>
			</div>

			<hr class="wp-header-end">

			<div class="content policies">
				<p><?php esc_html_e( 'Generate free attorney-crafted documents and policies that can easily be revised over time as regulation and your business changes. You can customize the look and feel to match your brand, then immediately embed them on your site.', 'uk-cookie-consent' ); ?></p>

				<!-- PRIVACY POLICY -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M17.5 0L0 7.27273V18.1818C0 28.2727 7.46667 37.7091 17.5 40C27.5333 37.7091 35 28.2727 35 18.1818V7.27273L17.5 0Z" fill="#4672FF"/>
								<path d="M17.5 18C19.4338 18 21 16.4338 21 14.5C21 12.5662 19.4338 11 17.5 11C15.5662 11 14 12.5662 14 14.5C14 16.4338 15.5662 18 17.5 18Z" fill="white"/>
								<path d="M17.5 21C14.9969 21 10 22.34 10 25V26C10 26.55 10.4219 27 10.9375 27H24.0625C24.5781 27 25 26.55 25 26V25C25 22.34 20.0031 21 17.5 21Z" fill="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Privacy Policy', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'A privacy policy states how your website or app collects, uses, and shares visitor’s personal information. Most websites and apps are legally required to have a privacy policy.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $privacy_policies_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- COOKIE POLICY -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z" fill="#4672FF"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M19.9702 7.36816C21.0648 7.36816 22.1267 7.50657 23.1392 7.7667C22.7298 8.36607 22.4906 9.08921 22.4906 9.86777C22.4906 11.0842 23.0745 12.1653 23.9794 12.8504C23.8313 13.288 23.7511 13.7565 23.7511 14.2435C23.7511 16.6598 25.7258 18.6185 28.1618 18.6185C28.6077 18.6185 29.0381 18.5529 29.4438 18.4308C29.6155 20.1453 30.785 21.5686 32.3682 22.1212C31.2986 27.9494 26.1547 32.3682 19.9702 32.3682C13.0103 32.3682 7.36816 26.7717 7.36816 19.8682C7.36816 12.9646 13.0103 7.36816 19.9702 7.36816Z" fill="white"/>
								<circle cx="16.2368" cy="15.1846" r="1.5" fill="#4672FF"/>
								<circle cx="15.1846" cy="23.6055" r="1.5" fill="#4672FF"/>
								<circle cx="24.6582" cy="24.6577" r="1.5" fill="#4672FF"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Cookie Policy', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'After scanning your site, we’ll be able to generate your customized cookie policy and consent banner.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $cookie_policy_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- TERMS AND CONDITIONS -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="40" height="40" rx="6" fill="#4672FF"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18.0346 23.4862L28.876 11.7944L30.5521 13.3486L18.0793 26.7996L9.46875 18.0025L11.1022 16.4037L18.0346 23.4862Z" fill="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Terms and Conditions', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'Terms and conditions protect your business by preventing inappropriate user behavior, limiting your liability, and protecting your intellectual property.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $terms_and_conditions_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- EULA -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0 6C0 2.68629 2.68629 0 6 0H34C37.3137 0 40 2.68629 40 6V34C40 37.3137 37.3137 40 34 40H6C2.68629 40 0 37.3137 0 34V6Z" fill="#4672FF"/>
								<path d="M9 10C9 9.44772 9.44772 9 10 9H17C17.5523 9 18 9.44772 18 10V17C18 17.5523 17.5523 18 17 18H10C9.44772 18 9 17.5523 9 17V10Z" fill="white"/>
								<path d="M22 10C22 9.44772 22.4477 9 23 9H30C30.5523 9 31 9.44772 31 10V17C31 17.5523 30.5523 18 30 18H23C22.4477 18 22 17.5523 22 17V10Z" fill="white"/>
								<path d="M22 26.5C22 24.0147 24.0147 22 26.5 22C28.9853 22 31 24.0147 31 26.5C31 28.9853 28.9853 31 26.5 31C24.0147 31 22 28.9853 22 26.5Z" fill="white"/>
								<path d="M9 23C9 22.4477 9.44772 22 10 22H17C17.5523 22 18 22.4477 18 23V30C18 30.5523 17.5523 31 17 31H10C9.44772 31 9 30.5523 9 30V23Z" fill="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'EULA', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'An End User License Agreement (EULA) outlines the rules and restrictions for software use. Your users must accept your EULA before downloading and using your app.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $eula_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- RETURN POLICY -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#4672FF"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M27 9H32V11H29V14H27V9Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M16 17.5C16 15.567 17.567 14 19.5 14H20C22.2091 14 24 15.7909 24 18H22C22 16.8954 21.1046 16 20 16H19.5C18.6716 16 18 16.6716 18 17.5C18 18.3284 18.6716 19 19.5 19H20.5C22.433 19 24 20.567 24 22.5C24 24.433 22.433 26 20.5 26H20C17.7909 26 16 24.2091 16 22H18C18 23.1046 18.8954 24 20 24H20.5C21.3284 24 22 23.3284 22 22.5C22 21.6716 21.3284 21 20.5 21H19.5C17.567 21 16 19.433 16 17.5Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M19 15V13H21V15H19Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M19 27V25H21V27H19Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M17.3261 8.30187C10.8653 9.77861 6.82492 16.2133 8.30167 22.6741C9.77841 29.1349 16.2131 33.1752 22.6739 31.6985C29.1346 30.2217 33.175 23.7871 31.6983 17.3263C31.1159 14.7784 29.7642 12.6093 27.9437 11.0046L29.2662 9.50426C31.3906 11.3769 32.9692 13.9107 33.648 16.8807C35.3709 24.4182 30.6571 31.9253 23.1195 33.6482C15.5819 35.3711 8.07481 30.6573 6.35195 23.1197C4.62908 15.5821 9.34285 8.07502 16.8804 6.35215C19.5276 5.74709 22.174 5.93625 24.5664 6.76397L23.9124 8.65404C21.8635 7.94515 19.5979 7.78261 17.3261 8.30187Z" fill="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Return Policy', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'A return policy helps set expectations with your customers by stating how and when goods and services can be returned.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $return_policy_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- DISCLAIMER -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M17.3395 1.65215C18.4426 -0.550718 21.5574 -0.550714 22.6605 1.65215L39.6752 35.63C40.6782 37.6328 39.237 40 37.0147 40H2.98529C0.762994 40 -0.678154 37.6328 0.324793 35.63L17.3395 1.65215Z" fill="#4672FF"/>
								<rect x="19" y="28" width="3" height="3" fill="white"/>
								<rect x="19" y="13" width="3" height="12" fill="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Disclaimer', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'If your business offers advice, products, or services to users, then you should have a disclaimer to protect yourself from legal liability.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $disclaimer_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- SHIPPING POLICY -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="40" height="34" viewBox="0 0 40 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.96395 0.831036C5.04625 0.35095 5.46248 0 5.94957 0H32.8567C33.4765 0 33.9471 0.55806 33.8424 1.16896L29.0788 28.9564C28.9965 29.4365 28.5803 29.7874 28.0932 29.7874H1.18602C0.5662 29.7874 0.0956675 29.2293 0.200394 28.6184L4.96395 0.831036Z" fill="#4672FF"/>
								<rect x="1.70166" y="6.80859" width="14.4682" height="1.70214" rx="0.851069" fill="white"/>
								<rect x="1.70166" y="11.064" width="9.36176" height="1.70214" rx="0.851069" fill="white"/>
								<rect x="3.4043" y="2.55322" width="5.95748" height="1.70214" rx="0.851069" fill="white"/>
								<rect x="0.85083" y="11.064" width="2.55321" height="1.70214" rx="0.851069" fill="#4672FF"/>
								<rect y="6.80859" width="4.25534" height="1.70214" rx="0.851069" fill="#4672FF"/>
								<path d="M27.2344 10.2129L35.3273 10.2129C35.6902 10.2129 36.0247 10.4095 36.2011 10.7266L39.8191 17.2277C39.936 17.4377 39.9733 17.6829 39.9242 17.9182L37.6132 28.9918C37.5165 29.4553 37.1079 29.7875 36.6343 29.7875H23.8301L27.2344 10.2129Z" fill="#4672FF"/>
								<path d="M31.2658 12.7661H34.2093C34.5839 12.7661 34.9271 12.9755 35.0985 13.3085L36.6971 16.4149C37.0396 17.0805 36.5564 17.8725 35.808 17.8725H30.2131L31.2658 12.7661Z" fill="white"/>
								<path d="M10.2129 29.7876C10.2129 31.1977 8.87922 32.3408 7.23411 32.3408C5.589 32.3408 4.25537 31.1977 4.25537 29.7876C4.25537 28.3775 5.589 27.2344 7.23411 27.2344C8.87922 27.2344 10.2129 28.3775 10.2129 29.7876Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.65965 27.8333C6.57823 27.8333 5.70353 28.7093 5.70353 29.7876C5.70353 30.8658 6.57823 31.7419 7.65965 31.7419C8.74106 31.7419 9.61576 30.8658 9.61576 29.7876C9.61576 28.7093 8.74106 27.8333 7.65965 27.8333ZM4.25537 29.7876C4.25537 27.9064 5.7806 26.3833 7.65965 26.3833C9.53869 26.3833 11.0639 27.9064 11.0639 29.7876C11.0639 31.6688 9.53869 33.1918 7.65965 33.1918C5.7806 33.1918 4.25537 31.6688 4.25537 29.7876Z" fill="#4672FF"/>
								<path d="M29.7876 29.7876C29.7876 31.1977 28.4539 32.3408 26.8088 32.3408C25.1637 32.3408 23.8301 31.1977 23.8301 29.7876C23.8301 28.3775 25.1637 27.2344 26.8088 27.2344C28.4539 27.2344 29.7876 28.3775 29.7876 29.7876Z" fill="white"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M27.2344 27.8333C26.1529 27.8333 25.2782 28.7093 25.2782 29.7876C25.2782 30.8658 26.1529 31.7419 27.2344 31.7419C28.3158 31.7419 29.1905 30.8658 29.1905 29.7876C29.1905 28.7093 28.3158 27.8333 27.2344 27.8333ZM23.8301 29.7876C23.8301 27.9064 25.3553 26.3833 27.2344 26.3833C29.1134 26.3833 30.6386 27.9064 30.6386 29.7876C30.6386 31.6688 29.1134 33.1918 27.2344 33.1918C25.3553 33.1918 23.8301 31.6688 23.8301 29.7876Z" fill="#4672FF"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Shipping Policy', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'A shipping policy is essential if your business sells goods online. It outlines important information like shipping fees, methods, and restrictions.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $shipping_policy_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>

				<!-- ACCEPTABLE USE POLICY -->
				<div class="policy-block">
					<div class="policy-left">
						<div class="policy-header-container">
							<svg width="30" height="41" viewBox="0 0 30 41" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M10.2566 12.3077C13.0889 12.3077 15.3848 10.0117 15.3848 7.17949C15.3848 4.34726 13.0889 2.05128 10.2566 2.05128C7.42441 2.05128 5.12843 4.34726 5.12843 7.17949C5.12843 10.0117 7.42441 12.3077 10.2566 12.3077ZM10.2566 14.359C14.2218 14.359 17.4361 11.1446 17.4361 7.17949C17.4361 3.21437 14.2218 0 10.2566 0C6.29151 0 3.07715 3.21437 3.07715 7.17949C3.07715 11.1446 6.29151 14.359 10.2566 14.359Z" fill="#4672FF"/>
								<path d="M26.1236 16.6217C24.6907 16.6217 23.9208 17.107 23.5291 18.4251V17.107C23.5291 15.7234 22.3675 14.6017 20.9346 14.6017C19.5017 14.6017 18.3402 15.7234 18.3402 17.107V16.0951C18.3402 14.7115 17.1786 13.5899 15.7457 13.5899C14.3128 13.5899 13.1512 14.7115 13.1512 16.0951V7.63369C13.1512 6.25007 11.9896 5.12842 10.5568 5.12842C9.12387 5.12842 7.96229 6.25007 7.96229 7.63369V21.9565C7.96229 22.2874 7.54147 22.4458 7.30951 22.2022L4.46145 19.0494C3.49208 18.0315 1.87035 17.9986 0.85769 18.9765C-0.125468 19.9259 -0.287675 21.6095 0.497221 22.7176L5.82797 30.8781C6.94173 32.4506 8.6349 33.5536 10.562 33.9621C10.7183 33.9621 10.845 34.0845 10.845 34.2354V38.4628C10.845 38.7455 11.0823 38.9746 11.375 38.9746H26.5269C26.8196 38.9746 27.0569 38.7455 27.0569 38.4628V34.7619C27.0569 34.4845 27.1108 34.2095 27.2156 33.9513L27.4166 33.4566C28.2449 31.4176 28.6837 29.2516 28.7149 27.063L28.7179 24.4691V19.1269C28.718 17.7433 27.5564 16.6217 26.1236 16.6217Z" fill="#4672FF"/>
								<rect x="9.23096" y="34.8721" width="19.4872" height="5.12821" rx="1" fill="#4672FF" stroke="white"/>
							</svg>
							<h2 class="title"><?php esc_html_e( 'Acceptable Use Policy', 'uk-cookie-consent' ); ?></h2>
						</div>
						<p><?php esc_html_e( 'An acceptable use policy supplements your legal Terms to describe how people must engage with your platform. This policy protects your business and reduces the risk of misuse.', 'uk-cookie-consent' ); ?></p>
					</div>
					<p class="policy-right">
						<a href="<?php echo esc_attr( $acceptable_use_policy_link ); ?>" target="_blank">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.7778 6.5H9C7.34315 6.5 6 7.84315 6 9.5V16.5C6 18.1569 7.34315 19.5 9 19.5H16C17.6569 19.5 19 18.1569 19 16.5V13.8924" stroke="white" stroke-width="2"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18 7.49997H14V5.49997H20V11.5H18V7.49997Z" fill="white"/>
								<path d="M18.8149 6.68585L13.0483 12.4524" stroke="white" stroke-width="2"/>
							</svg>
							<span><?php esc_html_e( 'Manage', 'uk-cookie-consent' ); ?></span>
						</a>
					</p>
				</div>
			</div>

		</div>

		<div class="termly-content-cell termly-right-column">

			<?php require TERMLY_VIEWS . 'consent-toggle-sidebar.php'; ?>
			<?php require TERMLY_VIEWS . 'upgrade-notice-sidebar.php'; ?>

		</div>

	</div>

</div>
