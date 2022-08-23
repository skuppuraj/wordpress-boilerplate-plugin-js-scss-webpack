<?php

if(!defined('ABSPATH')){ exit; }

if(file_exists(WP_BOILERPLATE_PATH.'_dev_config.php')){
	@include_once(WP_BOILERPLATE_PATH.'_dev_config.php');
}

class WP_Boilerplate_Constant{

	public static  function init(){
		self::path();
		self::debug();
		self::general();
	}

	private static function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	private static function debug(){

	}

	private static function general(){
		$plugin_slug = basename(dirname(dirname(dirname(__FILE__))));
		self::define( 'WP_BOILERPLATE_PLUGIN_SLUG', $plugin_slug );
		if ( ! defined( 'WP_BOILERPLATE_DEV' ) ) {
			// Dev Mode
			self::define( 'WP_BOILERPLATE_DEV', getenv( 'WP_BOILERPLATE_DEV' ) == 'true' ? true : false );
		}
	}

	private static function path(){
		self::define( 'WP_BOILERPLATE_PLUGIN_URL', plugin_dir_url(WP_BOILERPLATE_MAIN_FILE));
		self::define( 'WP_BOILERPLATE_JS_HOOK', 'wp-boilerplate');
		self::define( 'WP_BOILERPLATE_JS_FILE_NAME', 'app');
		self::define( 'WP_BOILERPLATE_CSS_FILE_NAME', 'app');
		self::define( 'WP_BOILERPLATE_CSS_HOOK', 'wp-boilerplate');
	}
}

WP_Boilerplate_Constant::init();