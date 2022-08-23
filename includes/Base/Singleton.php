<?php 
/**
 * Abstract Data.
 *
 * Handles generic data interaction which is implemented by
 * the main class.
 *
 * @class       Singleton
 * @version     1.0.0
 * @package     WP_Boilerplate\Base
 */

namespace WP_Boilerplate\Base;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Abstract Singleton Class
 *
 * Implemented by main class using the same singleton pattern.
 *
 * @version  1.0.0
 * @package  WooCommerce\Abstracts
 */

abstract class Singleton {

	/**
	 * @access private
	 * @var null
	 */
	protected static $instance = array();

	/**
	 * Singleton constructor. Do not define the construct
	 *
	 * @access private
	 */
	private function __construct() {}

	/**
	 * Returns the class instantiated instance.
	 *
	 * @access public
	 * @return null|static
	 */
	final public static function instance() {
		$class = (string) get_called_class();

		if (!array_key_exists($class, self::$instance)) {
			self::$instance[$class] = new static(...func_get_args());
		}

		return self::$instance[ $class ];
	}
}