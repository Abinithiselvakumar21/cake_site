<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('ApcoreMetaBoxSettings')) {
	/**
	 * Metaboxes and options values
	 *
	 *
	 * @class 		ApcoreMetaBoxSettings
	 * @version		1.0
	 * @category	Class
	 * @author 		Apress
	 */
	class ApcoreMetaBoxSettings {
		/**
		 * Returns metabox option.
		 *
		 * @param $name
		 *
		 * @return string|bool
		 */
		public static function get($name) {
			global $post;

			if (isset($post) && !empty($post->ID) && !is_archive() && !is_search()) {
				return get_post_meta($post->ID, $name, true);
			}

			return false;
		}
		/**
		 * Checks if metabox value is defined then checks if param value is defined from theme options.
		 *
		 * @param $name
		 * @param $default
		 *
		 * @return string|bool
		 */
		public static function compared($name, $default = '') {
			global $zolo_native;

			$value = self::get($name);
			if($value || $value != '') {
				return $value;
			} elseif(!$value && isset($zolo_native[$name]) && !empty($zolo_native[$name])) {
				return $zolo_native[$name];
			} else {
				return $default;
			}
		}
	}
}
if(!class_exists('Apcore_Theme_Helpers')) {
	/**
	 * Theme core helpers class
	 *
	 *
	 * @class 		Apcore_Theme_Helpers
	 * @version		1.0
	 * @category	Class
	 * @author 		Apress
	 */
	class Apcore_Theme_Helpers {	
		
		/**
		 * Hold an instance of Liquid_Helper class.
		 * @var Liquid_Helper
		 */
		protected static $instance = null;
	
		/**
		 * Main Liquid_Helper instance.
		 *
		 * @return Liquid_Helper - Main instance.
		 */
		public static function instance() {
	
			if(null == self::$instance) {
				self::$instance = new Apcore_Theme_Helpers();
			}
	
			return self::$instance;
		}
		/**
		 * [html_attributes description]
		 *
		 * @method html_attributes
		 * @param  array           $attributes [description]
		 *
		 * @return [type]                [description]
		 */
		public function html_attributes( $attributes = array(), $prefix = '' ) {
	
			// If empty return false
			if ( empty( $attributes ) ) {
				return false;
			}
	
			$options = false;
			if( isset( $attributes['data-options'] ) ) {
				$options = $attributes['data-options'];
				unset( $attributes['data-options'] );
			}
	
			$out = '';
			foreach ( $attributes as $key => $value ) {
	
				if( ! $value ) {
					continue;
				}
	
				$key = $prefix . $key;
				if( true === $value ) {
					$value = 'true';
				}
	
				if( false === $value ) {
					$value = 'false';
				}
	
				if( is_array( $value ) ) {
					$out .= sprintf( ' %s=\'%s\'', esc_html( $key ), json_encode( $value ) );
				}
				else {
					$out .= sprintf( ' %s="%s"', esc_html( $key ), esc_attr( $value ) );
				}
			}
	
			if( $options ) {
				$out .= sprintf( ' data-options=\'%s\'', $options );
			}
	
			return $out;
		}
	
		public function attr( $context, $attributes = array() ) {
			$atts = $this->get_attr( $context, $attributes );
			echo apply_filters( 'apress_attributes', $atts );
		}
	
		/**
		 * [get_attr description]
		 * @method get_attr
		 * @param  [type] $context    [description]
		 * @param  array  $attributes [description]
		 * @return [type]             [description]
		 */
		public function get_attr( $context, $attributes = array() ) {
	
			$defaults = array(
				'class' => sanitize_html_class( $context )
			);
	
			$attributes = wp_parse_args( $attributes, $defaults );
			$attributes = apply_filters( "apress_attr_{$context}", $attributes, $context );
	
			$output = $this->html_attributes( $attributes );
			$output = apply_filters( "apress_attr_{$context}_output", $output, $attributes, $context );
	
			return trim( $output );
		}
			
		/**
		 * Returns responsive typography VC param options array
		 *
		 * @return array
		 */
		public static function vc_responsive_text_get_params() {
			return array(
				'font_size_desktop' => '',
				'line_height_desktop' => '',
				'letter_spacing_desktop' => '',
				'font_size_tablet' => '',
				'line_height_tablet' => '',
				'letter_spacing_tablet' => '',
				'font_size_mobile' => '',
				'line_height_mobile' => '',
				'letter_spacing_mobile' => '',
			);
		}
		/**
		 * Returns margin VC param options array
		 *
		 * @return array
		 */
		public static function vc_margin_get_params() {
			return array(
				'margin-top' => '',
				'margin-bottom' => '',
				'margin-left' => '',
				'margin-right' => '',
			);
		}
		/**
		 * Returns padding VC param options array
		 *
		 * @return array
		 */
		public static function vc_padding_get_params() {
			return array(
				'padding-top' => '',
				'padding-bottom' => '',
				'padding-left' => '',
				'padding-right' => '',
			);
		}
		/**
		 * Returns box-shadow VC param options array
		 *
		 * @return array
		 */
		public static function vc_box_shadow_get_params() {
			return array(
				'box_shadow_enable' => 'disable',
				'shadow_horizontal' => '0',
				'shadow_vertical' => '15',
				'shadow_blur' => '50',
				'shadow_spread' => '0',
				'box_shadow_color' => 'rgba(0,0,0,.35)',
			);
		}
		/**
		 * Parses custom VC params values
		 *
		 * @param mixed $value
		 * @param string $method
		 *
		 * @return string
		 */
		public static function vc_param_parse_value($value, $method = '') {
			if($method != '' && method_exists('Apcore_Theme_Helpers', $method)) {
				$params = self::$method();
			
				$values = vc_parse_multi_attribute($value, $params);
			}
			
			return $values;
		}
	}
	/**
	 * Main instance of Liquid_Helper.
	 *
	 * Returns the main instance of Liquid_Helper to prevent the need to use globals.
	 *
	 * @return Liquid_Helper
	 */
	function apress_helper() {
		return Apcore_Theme_Helpers::instance();
	}

}
