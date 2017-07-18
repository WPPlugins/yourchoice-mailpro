<?php
/*
 * Adds a dashboard widget to show the count of subscribers.
 */

function yourchoice_mailpro_dashboard() {

	if ( function_exists('current_user_can') && !current_user_can('moderate_comments') ) {
		return;
	}

	$mailpro = new mailpro();
	$options = get_option('ycmp_options');
	$res = $mailpro->getEmailAddresses($options);
	$json_res = json_decode($res);
	if ($json_res->Code > 0) {
		echo '<div class="error">';
		echo '<p>';
		echo '<b>' . __('YourChoice MailPro', 'yourchoice-mailpro') . ':</b> ' . __('API Error! Please check your APIKey and IDClient', 'yourchoice-mailpro');
		echo '</p>';
		echo '</div>';
	} else {
		$email_array = json_decode($res,true);
		$count = count($email_array['EmailList']);
		echo '<p>';
		if ($count == 1) {
			echo __('You have', 'yourchoice-mailpro') . ' ' . $count . ' ' . __('subscriber', 'yourchoice-mailpro');
		}
		else {
			echo __('You have', 'yourchoice-mailpro') . ' ' . $count . ' ' . __('subscribers', 'yourchoice-mailpro');
		}
		echo '</p>';
	}
}

function yourchoice_mailpro_dashboard_setup() {

	if ( function_exists('current_user_can') && !current_user_can('moderate_comments') ) {
		return;
	}

	wp_add_dashboard_widget('yourchoice_mailpro_dashboard', __('YourChoice MailPro (subscribers)', 'yourchoice-mailpro'), 'yourchoice_mailpro_dashboard');
}
add_action('wp_dashboard_setup', 'yourchoice_mailpro_dashboard_setup');

?>
