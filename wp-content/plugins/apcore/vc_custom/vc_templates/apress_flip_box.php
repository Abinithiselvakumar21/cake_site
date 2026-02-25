<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 
$output .= '<div class="apress_flip_box_element_wrap '.esc_attr($el_class.' '.$flip_type).'"><div class="apress_flip_box_element">';
$output .= do_shortcode($content);
$output .= '</div></div>';

print $output;


/*$style .= '.apress_splitpage_dark #multiscroll-nav li .active span{box-shadow:inset 0 0 0 1px '.$dark_text_color.';}';
$style .= '.apress_splitpage_dark #multiscroll-nav span{box-shadow: 0 0 0 5px '.$dark_text_color.' inset;}';

apcore_save_plugin_dyn_styles( $style );
*/