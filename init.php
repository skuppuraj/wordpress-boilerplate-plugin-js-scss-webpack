<?php
/**
 * Plugin Name: WordPress Plugin BoilerPlate with Webpack JS and SCSS
 * Plugin URI: https://kuppuraj.dev/
 * Description: This is the test plugin for codable
 * Version: 1.0.0
 * Author: Kuppuraj
 * Author URI: https://kuppuraj.dev/
 * Developer: Kuppuraj
 * Developer URI: https://kuppuraj.dev/
 */

if(!defined( 'ABSPATH' )){ exit;}

define( 'WP_BOILERPLATE_VERSION', '1.0.0' );
define( 'WP_BOILERPLATE_MAIN_FILE', __FILE__ );
define( 'WP_BOILERPLATE_PATH', plugin_dir_path( WP_BOILERPLATE_MAIN_FILE ) );

use WP_Boilerplate\Main;

require_once WP_BOILERPLATE_PATH . 'vendor/autoload.php';
require_once WP_BOILERPLATE_PATH . '/resources/php/constants.php';
require_once WP_BOILERPLATE_PATH . '/resources/php/functions.php';

function wp_boilerplate_init() {

	global $wp_boilerplate_obj;
	$wp_boilerplate_obj = Main::instance();
    $wp_boilerplate_obj->run();
}

function wp_boilerplate_get_main() {
	return Main::instance();
}

wp_boilerplate_init();

// Use the global instance
global $wp_boilerplate_obj;

/**
 * Activation hook
 */
register_activation_hook( __FILE__, array( $wp_boilerplate_obj, 'activation' ) );

/**
 * Deactivation hook
 */
register_deactivation_hook( __FILE__, array( $wp_boilerplate_obj, 'deactivation' ) );