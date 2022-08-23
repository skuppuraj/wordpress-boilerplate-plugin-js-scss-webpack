<?php
/**
 * Main setup
 *
 * @package Main
 * @since   1.0.0
 */
namespace WP_Boilerplate;
use WP_Boilerplate\Base\Singleton;
use WP_Boilerplate\Controllers\AjaxController;
use WP_Boilerplate\Actions\SampleAction;
/**
 * Base class for plugin.
 *
 * @class Main
 */
class Main extends Singleton{

	private $ajax_manager;

	public function run(){
		$this->create_objects();
		$this->configure_objects();
		add_action( 'plugins_loaded', array( $this, 'add_action_hooks' ), 1 );
	}

	public function create_objects(){
		$this->ajax_manager = new AjaxController( $this->get_ajax_actions() );
	}

	private function configure_objects() {
		$this->ajax_manager->load_all();
	}

	public function add_action_hooks(){
		add_action( 'init', array( $this, 'init_hooks' ), 1 );
	}

	public function init_hooks(){
		$this->load_actions();
	}

	public function load_actions(){
        add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ), 11 ); 
	}

	public function load_assets(){
		$min = ( 0 ) ? '.min' : '';

		$front = trailingslashit( WP_BOILERPLATE_PLUGIN_URL );
		$frontURL = $front. 'assets/dist';
		$version = WP_BOILERPLATE_VERSION;
		wp_enqueue_script( WP_BOILERPLATE_JS_HOOK.'-js', "{$frontURL}/js/".WP_BOILERPLATE_JS_FILE_NAME."-{$version}{$min}.js", array(), WP_BOILERPLATE_VERSION, true );

		wp_enqueue_style( WP_BOILERPLATE_CSS_HOOK.'-css', "{$frontURL}/css/".WP_BOILERPLATE_CSS_FILE_NAME."-{$version}{$min}.css", array(), WP_BOILERPLATE_VERSION );


		$variables = array(
		        'ajaxurl' => admin_url( 'admin-ajax.php' ),
		    );
		wp_localize_script(WP_BOILERPLATE_CSS_HOOK.'-js', "wp_boilerplate_object", $variables);
	}

	public function get_ajax_actions() {
		return apply_filters('wp_boilerplate_ajax_actions', array(
            new SampleAction( 'sample_action', true, 'wp_ajax_' ),
		));
	}

	public function activation(){

	}

	public function deactivation(){
		
	}
}