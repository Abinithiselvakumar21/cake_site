<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Param_Responsive_Hide')) {
	class Zolo_Param_Responsive_Hide extends Zolo_Params_Constructor {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_param_responsive_hide', array($this, 'responsive_hide_param'), APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/additional_param.js' );
			}
		}
		public static function resolutions() {
			return array(
				'desktop' => esc_html__('Screen resolutions from 1280px to 1025px','apcore'),
				'tablet' => esc_html__('Screen resolutions from 1024px to 800px','apcore'),
				'mobile' => esc_html__('Screen resolutions less than 800px','apcore')
			);
		}
		function responsive_hide_param($settings, $value) {
			$values = Apcore_Theme_Helpers::vc_param_parse_value($value, 'vc_responsive_hide_get_param');
			
			$html  = '<div class="zolo-responsive-text-param-container">';

			$resolutions = $this->resolutions();
			
			foreach($resolutions as $res => $title) {
				$wrap_class = '';
				if(substr_count($value, $res) > 0) {
					$wrap_class = 'expanded';
				}
				$html .= '	<div class="inner-wrap '.esc_attr($wrap_class).'">';
					$html .= '	<div class="item">';
						$html .= '	<div class="wpb_element_label">'
										. esc_html($res)
									.'</div>';
						$html .= '	<a href="#" class="zolo-resolution-section-expand" title="'.esc_attr__('Expand / Collapse','apcore').'"><span class="button-animation"></span></a>';
					$html .= '	</div>';
					$elements = array(
						'device_width',
					);
					foreach($elements as $k) {
						$label = str_replace($res, '', $k);
						$label = str_replace('_', ' ', $label);
						$html .= '<div class="item input-cover">'
									. '<div class="wpb_element_label">'.esc_html($label).'</div>'
									. '<div class="crum-number-field-wrap">'.$this->input_number($values[$k.'_'.$res], $k.'_'.$res, '').'</div>'
								. '</div>';
					}
				$html .= '	</div>';
			}
			
			$html .= '	<div class="clear"></div>';
			
			$html .= '</div>';
			
			$html .= '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" />';
			
			return $html;
		}
		public static function responsive_css($value, $class = '') {
			if(!$value || empty($value)) return;
			
			$css = '';
			
			$values = Apcore_Theme_Helpers::vc_param_parse_value($value, 'vc_responsive_hide_get_param');
			
			$resolutions = self::resolutions();
			
			$media_string = array(
				'desktop' => '@media (max-width: 1280px) and (min-width: 1024px)',
				'tablet' => '@media (max-width: 1023px) and (min-width: 800px)',
				'mobile' => '@media (max-width: 799px)',
			);
			
			foreach($resolutions as $res => $title) {
				$single_css = '';
				if(isset($values['device_width_'.$res]) && $values['device_width_'.$res] != '') {
					$single_css .= 'display: none !important;;';
				}
				
				if($single_css != '') {
					$css .= $media_string[$res].'{'.$class.'{'.$single_css.'}}';
				}
			}
			
			return $css;
		}
	}
}
if(class_exists('Zolo_Param_Responsive_Hide')) {
	$Zolo_Param_Responsive_Hide = new Zolo_Param_Responsive_Hide();
}