<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$uniqid = 'apress_vertical_timeline_items_wrap_'.uniqid(rand());

$output .= '<section id="zolo-cd-timeline" class="'.$uniqid.' '.$apress_vertical_timeline_style.' '.$el_class.' zolo-cd-timeline-container">';

$output .= do_shortcode($content);

$output .= '</section>';

print $output;

$shortcode_css = '';

$shortcode_css .= '.'.$uniqid.'.zolo-cd-timeline-container::before{background:'.$border_color.';}';



apcore_save_plugin_dyn_styles( $shortcode_css );

?>
