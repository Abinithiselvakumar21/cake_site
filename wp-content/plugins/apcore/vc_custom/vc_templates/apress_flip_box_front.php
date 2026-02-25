<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
$css_class = esc_attr( trim( $css_class ) );

$output .= '<div class="apress_flip_box_front apress_flip_box_block '.esc_attr($el_class. ' ' .$css_class).'"><div class="apress_flip_box_inner">';
$output .= do_shortcode($content);
$output .= '</div></div>';

print $output;

/*$style .= '.apress_splitpage_dark #multiscroll-nav li .active span{box-shadow:inset 0 0 0 1px '.$dark_text_color.';}';
$style .= '.apress_splitpage_dark #multiscroll-nav span{box-shadow: 0 0 0 5px '.$dark_text_color.' inset;}';

apcore_save_plugin_dyn_styles( $style );
*/