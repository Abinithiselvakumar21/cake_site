<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( !class_exists( 'Apress_Base' ) ) :
/**
* Apress Base
*/
class Apress_Base {

	/**
	 * [add_action description]
	 * @method add_action
	 * @param  [type]     $hook            [description]
	 * @param  [type]     $function_to_add [description]
	 * @param  integer    $priority        [description]
	 * @param  integer    $accepted_args   [description]
	 */
	public function add_action( $hook, $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_action( $hook, array( &$this, $function_to_add ), $priority, $accepted_args );
	}

	/**
	 * [add_filter description]
	 * @method add_filter
	 * @param  [type]     $tag             [description]
	 * @param  [type]     $function_to_add [description]
	 * @param  integer    $priority        [description]
	 * @param  integer    $accepted_args   [description]
	 */
	public function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_filter( $tag, array( &$this, $function_to_add ), $priority, $accepted_args );
	}

}

endif;
if( ! function_exists( 'apress_action' ) ) :
	function apress_action() {

		$args   = func_get_args();

		if( !isset( $args[0] ) || empty( $args[0] ) ) {
			return;
		}

		$action = 'apress_' . $args[0];
		unset( $args[0] );

		do_action_ref_array( $action, $args );
	}
endif;

 
