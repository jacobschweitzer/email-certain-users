<?php
/*
Plugin Name: Email Certain Users
Plugin URI:  http://ijas.me/email-certain-users
Description: The skeleton for an object-oriented/MVC WordPress plugin
Version:     1.0
Author:      Jacob Schweitzer
Author URI:  http://ijas.me/
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

define( 'WPPS_NAME',                 'WordPress Plugin Skeleton' );
/*
 * load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
	require_once( __DIR__ . '/classes/wpps-module.php' );
	require_once( __DIR__ . '/classes/wordpress-plugin-skeleton.php' );
	require_once( __DIR__ . '/includes/admin-notice-helper/admin-notice-helper.php' );
	require_once( __DIR__ . '/classes/wpps-custom-post-type.php' );
	require_once( __DIR__ . '/classes/wpps-cpt-example.php' );
	require_once( __DIR__ . '/classes/wpps-settings.php' );
	require_once( __DIR__ . '/classes/wpps-cron.php' );
	require_once( __DIR__ . '/classes/wpps-instance-class.php' );

	if ( class_exists( 'WordPress_Plugin_Skeleton' ) ) {
		$GLOBALS['wpps'] = WordPress_Plugin_Skeleton::get_instance();
		register_activation_hook(   __FILE__, array( $GLOBALS['wpps'], 'activate' ) );
		register_deactivation_hook( __FILE__, array( $GLOBALS['wpps'], 'deactivate' ) );
	}