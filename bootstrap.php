<?php
/*
Plugin Name: Abeo Survey Reminder
Plugin URI:  http://ijas.me/email-certain-users
Description: Email certain users from the admin section. 
Version:     1.0
Author:      Jacob Schweitzer
Author URI:  http://ijas.me/
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

define( 'WPPS_NAME',                 'Abeo Survey Reminder' );
/*
 * load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
	require_once( __DIR__ . '/classes/ecu-module.php' );
	require_once( __DIR__ . '/classes/email-certain-users.php' );
	require_once( __DIR__ . '/classes/ecu-settings.php' );
	require_once( __DIR__ . '/classes/ecu-cron.php' );
	require_once( __DIR__ . '/classes/ecu-instance-class.php' );

	if ( class_exists( 'Email_Certain_Users' ) ) {
		$GLOBALS['ecu'] = Email_Certain_Users::get_instance();
		register_activation_hook(   __FILE__, array( $GLOBALS['ecu'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['ecu'], 'deactivate' ) );
	}