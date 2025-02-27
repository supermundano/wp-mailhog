<?php
/**
 * @link
 * @since             1.0.0
 * @package           TODO
 *
 * @wordpress-plugin
 * Plugin Name:       Use MailHog
 * Description:       Configure WordPress on Valet to use MailHog
 * Version:           1.0.1
 * Tags: local, email
 */

if( defined( 'WP_ENV' ) && WP_ENV !== 'production' ){
	add_action( 'phpmailer_init', 'supermundano_configMH', 10, 1 );
}

function supermundano_configMH( $phpmailer ) {
	// Define that we are sending with SMTP
	$phpmailer->isSMTP();

	// The hostname of the mailserver
	$phpmailer->Host = 'localhost';

	// Use SMTP authentication (true|false)
	$phpmailer->SMTPAuth = false;

	// SMTP port number
	// Mailhog normally run on port 1025
	$phpmailer->Port = WP_DEBUG ? '1025' : '25';	

	// Username to use for SMTP authentication
	// $phpmailer->Username = 'yourusername';

	// Password to use for SMTP authentication
	// $phpmailer->Password = 'yourpassword';

	// The encryption system to use - ssl (deprecated) or tls
	// $phpmailer->SMTPSecure = 'tls';

	$phpmailer->From = 'site_adm@wp.local';
	$phpmailer->FromName = 'WP DEV';
}