<?php 
/**
 * Ajax controller class.
 *
 * This class is base class which extend all ajax action class
 *
 * @class       AjaxController
 * @version     1.0.0
 * @package     WP_Boilerplate\Controllers
 */

namespace WP_Boilerplate\Controllers;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * AjaxController class.
 */
class AjaxController {

	protected $ajax_modules;

	public function __construct( $ajax_modules ) {
		$this->ajax_modules = $ajax_modules;
	}

	public function load_all() {
		foreach ( $this->ajax_modules as $ajax ) {
			$ajax->load();
		}
	}

	public function get_ajax_modules() {
		return $this->ajax_modules;
	}
}
