<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script("zt-easytabs-script");

$uniqid = uniqid(rand());
$info_tabs_id = 'info_tabs_id_'.$uniqid;

$output .= '<div id="'.$info_tabs_id.'" class="info_tabs info_tabs_align_'.$info_tabs_alignment.' '.$info_tabs_style.'">';
if($info_tabs_alignment == 'left' || $info_tabs_alignment == 'top'){
$output .= '<ul class="tabs"></ul>';
}

$output .= do_shortcode($content);

if($info_tabs_alignment == 'right' || $info_tabs_alignment == 'bottom'){
$output .= '<ul class="tabs"></ul>';
}

$output .= '</div>';

$output .= '<script type="text/javascript">
          jQuery(document).ready(function($){
            $(".info_tabs").each( function (){
                $( "li.tab" , this ).appendTo( $( ".tabs" , this ) );
            } );
			$(".info_tabs").easytabs({
				  updateHash: false,
				  animationSpeed: "fast",
      			  transitionIn: "fadeIn"
				});
          });</script>';
		  
print $output;

?>

<?php
$shortcode_css = '';

$shortcode_css .= '#'.$info_tabs_id.'.info_tabs .tab,
#'.$info_tabs_id.'.info_tabs.info_tabs_style2 .tab a{background:'.$infotab_bg_color.';}';
$shortcode_css .= '#'.$info_tabs_id.'.info_tabs .tab.active .zolo_info_tab_title,
#'.$info_tabs_id.'.info_tabs .tab.active .zolo_info_tab_content{color:'.$infotab_active_text_color.'!important;}';

if($info_tabs_alignment == 'left' || $info_tabs_alignment == 'right'){
$shortcode_css .= '#'.$info_tabs_id.'.info_tabs .tab.active{background:'.$infotab_active_bg_start_color.';
background: -moz-linear-gradient(0deg, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$infotab_active_bg_start_color.'), color-stop(100%, '.$infotab_active_bg_end_color.'));
background: -webkit-linear-gradient(0deg, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background: -o-linear-gradient(0deg, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background: -ms-linear-gradient(0deg, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background: linear-gradient(90deg, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$infotab_active_bg_start_color.', endColorstr='.$infotab_active_bg_end_color.',GradientType=1 );}';

$shortcode_css .= '#'.$info_tabs_id.'.info_tabs.info_tabs_align_left .tab:after{border-left-color:'.$infotab_active_bg_end_color.';}';
$shortcode_css .= '#'.$info_tabs_id.'.info_tabs.info_tabs_align_right .tab:after{border-right-color:'.$infotab_active_bg_start_color.';}';
}

if($info_tabs_alignment == 'bottom' || $info_tabs_alignment == 'top'){
	
$shortcode_css .= '#'.$info_tabs_id.'.info_tabs.info_tabs_align_top .tab.active,
#'.$info_tabs_id.'.info_tabs.info_tabs_align_bottom .tab.active{background:'.$infotab_active_bg_start_color.';
background:-moz-linear-gradient(top, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background:-webkit-linear-gradient(top, '.$infotab_active_bg_start_color.' 0%,'.$infotab_active_bg_end_color.' 100%);
background:linear-gradient(to bottom, '.$infotab_active_bg_start_color.' 0%,'.$infotab_active_bg_end_color.' 100%);
background:-webkit--moz-linear-gradient(top, '.$infotab_active_bg_start_color.' 0%, '.$infotab_active_bg_end_color.' 100%);
background:-webkit--webkit-linear-gradient(top, '.$infotab_active_bg_start_color.' 0%,'.$infotab_active_bg_end_color.' 100%);
background:-webkit-linear-gradient(to bottom, '.$infotab_active_bg_start_color.' 0%,'.$infotab_active_bg_end_color.' 100%);}';

$shortcode_css .= '#'.$info_tabs_id.'.info_tabs.info_tabs_align_top .tab:after{border-top-color:'.$infotab_active_bg_end_color.';}';
$shortcode_css .= '#'.$info_tabs_id.'.info_tabs.info_tabs_align_bottom .tab:after{border-bottom-color:'.$infotab_active_bg_start_color.';}';
}

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
