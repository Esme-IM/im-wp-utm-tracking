<?php 
/**
 * Plugin Name: Innermedia Wpforms UTM Plugin
 * Plugin URI: https://www.innermedia.co.uk
 * Requires Plugins: wpforms
 * Description: Save utm as cookies for WP forms by adding a custom smart tag to pull in UTM data via a cookie. {utm_data key="UTM"} will get whatever utm parameter. Supported parameters include 'utm_source', 'utm_medium', 'utm_campaign', 'utm_id', 'utm_term', 'utm_content'.
 * Version: 1.0.1
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
// Plugin Folder Path.
if ( ! defined( 'IM_WPFUTM_PLUGIN_DIR' ) ) {
	define( 'IM_WPFUTM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin Folder URL.
if ( ! defined( 'IM_WPFUTM_PLUGIN_URL' ) ) {
	define( 'IM_WPFUTM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File.
if ( ! defined( 'IM_WPFUTM_PLUGIN_FILE' ) ) {
	define( 'IM_WPFUTM_PLUGIN_FILE', __FILE__ );
}
include_once('inc/utm_fields.php');