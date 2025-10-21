<?php 
/**
 * Plugin Name: Innermedia WPForms UTM Tracking
 * Plugin URI: https://www.innermedia.co.uk
 * Description: UTM tracking for WPForms
 * Author: Innermedia
 * GitHub Plugin URI: https://github.com/Esme-IM/im-wp-utm-tracking
 * Primary Branch: main
 * Version: 1.0.2
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
