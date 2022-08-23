<?php
/**
 * Sample Action
 *
 * Used by core components that need to work with sample component.
 *
 * @package WP_Boilerplate\Actions
 * @version 1.0.0
 */

namespace WP_Boilerplate\Actions;
defined( 'ABSPATH' ) || exit;

/**
 * Sample Action componet class.
 */

use WP_Boilerplate\Core\ActionCore;

class SampleAction extends ActionCore {

	/**
	 * SampleAction constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct( $id, $no_privilege, $action_prefix ) {
		parent::__construct( $id, $no_privilege, $action_prefix );
	}

	/**
	 * Get Post request
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function action() {
		$this->out(
			array("test"=>true)
		);
	}
}
