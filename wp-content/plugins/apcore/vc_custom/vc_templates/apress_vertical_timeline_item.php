<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'icon_family'						=> 'fontawesome',
	'icon_fontawesome'					=> 'fa fa-angle-right',
	'icon_openiconic'					=> 'vc-oi vc-oi-dial',
	'icon_typicons'						=> 'typcn typcn-adjust-brightness',
	'icon_entypo'						=> 'entypo-icon entypo-icon-note',
	'icon_linecons'						=> 'vc_li vc_li-heart',
	'icon_monosocial'					=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'						=> 'icon-basic-heart',
	'vertical_timeline_dateyear'			=> '',
	'vertical_timeline_subheading'			=> '',
	'vertical_timeline_company_name'		=> '',
	'vertical_timeline_jobtitle'			=> '',
	'vertical_timeline_job_duration'		=> '',
	'vertical_timeline_jobdescription'		=> '',
	'vertical_timeline_tags'				=> '',
	'vertical_timeline_iconshowhide'		=> 'on',
	'border_color'						=> '#1769ff',
	'icon_bg_color'						=> '#0a43ac',
	'icon_border_color'					=> '#1769ff',
	'icon_color'						=> '#fff',
	'box_bg_color'						=> '#dfdfdf',
	'box_text_color'					=> '#333',
	'box_padding'						=> 'padding-top:30|padding-bottom:30|padding-left:30|padding-right:30',
	'dateyear_font_options'				=> '',
	'dateyear_google_fonts'				=> '',
	'dateyear_custom_fonts'				=> '',
	'subheading_font_options'				=> '',
	'subheading_google_fonts'				=> '',
	'subheading_custom_fonts'				=> '',
	'companyname_font_options'				=> '',
	'companyname_google_fonts'				=> '',
	'companyname_custom_fonts'				=> '',
	'jobdescription_font_options'			=> '',
	'jobdescription_google_fonts'			=> '',
	'jobdescription_custom_fonts'			=> '',
	'meta_font_options'					=> '',
	'meta_google_fonts'					=> '',
	'meta_custom_fonts'					=> '',
	'companyname_responsive'			=> '',
	'class'								=> '',
	'data_animation'					=> 'No Animation',
	'data_delay'						=> '500',
	
), $atts ) );


//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

if (!empty($vertical_timeline_dateyear)) {
	$dateyear_options = _zolo_parse_text_shortcode_params($dateyear_font_options, '', $dateyear_google_fonts, $dateyear_custom_fonts);
}
if (!empty($vertical_timeline_subheading)) {
	$subheading_options = _zolo_parse_text_shortcode_params($subheading_font_options, '', $subheading_google_fonts, $subheading_custom_fonts);
}
if (!empty($vertical_timeline_company_name)) {
	$companyname_options = _zolo_parse_text_shortcode_params($companyname_font_options, '', $companyname_google_fonts, $companyname_custom_fonts);
}
$meta_options = _zolo_parse_text_shortcode_params($meta_font_options, '', $meta_google_fonts, $meta_custom_fonts);
if (!empty($content)) {
	$jobdescription_options = _zolo_parse_text_shortcode_params($jobdescription_font_options, '', $jobdescription_google_fonts, $jobdescription_custom_fonts);
}

//icon
switch($icon_family) {
	case 'fontawesome':
		$icon = $icon_fontawesome;
		break;
	case 'openiconic':
		$icon = $icon_openiconic;
		break;
	case 'typicons':
		$icon = $icon_typicons;
		break;
	case 'entypo':
		$icon = $icon_entypo;
		break;
	case 'linecons':
		$icon = $icon_linecons;
		break;
	case 'monosocial':
		$icon = $icon_monosocial;
		break;
	case 'linea':
		$icon = $icon_linea;
		break;	
	case 'default_arrow':
		$icon = 'icon-button-arrow';
		break;
	default:
		$icon = '';
		break;
}
if(!empty($icon_family) && $icon_family != 'none') {
	$circle_icon = $icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_family );

//regular(grad) linea
if(!empty($icon_family) && $icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

$uniqid = uniqid(rand());
$apress_id = 'zolo_vertical_timeline_'.$uniqid;

$vertical_timeline_tags_value = str_replace(',', '</li><li>', $vertical_timeline_tags);
?>

<div id="<?php echo $apress_id;?>" class="zolo-cd-timeline-block timeline_icon_<?php echo $vertical_timeline_iconshowhide?> <?php echo $class?> <?php echo $animatedclass?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay;?>">
			<div class="zolo-cd-timeline-img" style="background:<?php echo $icon_bg_color?>">
            <?php if($vertical_timeline_iconshowhide == 'on'){?>
			<i class="<?php echo $icon;?>"></i>
			<?php }?>
			</div>

			<div class="zolo-cd-timeline-content">
            	<?php if($vertical_timeline_dateyear || $vertical_timeline_subheading){?>
                <span class="zolo_vertical_timeline_dateyear_subheading">
				<span class="zolo_vertical_timeline_dateyear" <?php echo $dateyear_options['style'];?>><?php echo $vertical_timeline_dateyear;?></span>
                <span class="zolo_vertical_timeline_subheading" <?php echo $subheading_options['style'];?>><?php echo $vertical_timeline_subheading;?></span>
                </span>
                <?php }?>
                <?php if($vertical_timeline_company_name){
				echo '<'.$companyname_options['tag']. ' class="zolo_vertical_timeline_company_name" '.$companyname_options['style'].'>'.$vertical_timeline_company_name.'</' . $companyname_options['tag'].'>';
				}?>
				
				<?php if($vertical_timeline_jobtitle || $vertical_timeline_job_duration){?>
                <div class="timeline-content-info" <?php echo $meta_options['style'];?>>
				  <?php if($vertical_timeline_jobtitle){?>
                  <span class="timeline-content-info-title">
                    <i class="ap-badge2"></i><?php echo $vertical_timeline_jobtitle;?>
                  </span>
                  <?php }?>
                  <?php if($vertical_timeline_job_duration){?>
                  <span class="timeline-content-info-date">
                    <i class="ap-calendar-full"></i><?php echo $vertical_timeline_job_duration;?>
                  </span>
                  <?php }?>
        		</div>
                <?php }?>
                <?php if($content){?>
				<div class="zolo_vertical_timeline_jobdescription" <?php echo $jobdescription_options['style'];?>><?php echo apply_filters('the_content', $content); ?><?php //echo wpb_js_remove_wpautop($content);?></div>
                <?php }?>
                
				<?php if($vertical_timeline_tags_value){?>
				<ul class="zolo_content_skills" <?php echo $meta_options['style'];?>>
				<li><?php echo $vertical_timeline_tags_value;?></li>
				</ul>
                <?php }?>
			</div>
		</div>


<?php 
$shortcode_css = '';
$shortcode_css .= '#'.$apress_id.' .zolo-cd-timeline-img{border-color:'.$icon_border_color.';color:'.$icon_color.';}';
$shortcode_css .= '#'.$apress_id.' .zolo-cd-timeline-content{background:'.$box_bg_color.';color:'.$box_text_color.';' . esc_js(Zolo_Param_Padding::paddings_css($box_padding)) . '}';
$shortcode_css .= '#'.$apress_id.'.zolo-cd-timeline-block:nth-child(even) .zolo-cd-timeline-content::before{border-right-color:'.$box_bg_color.';}';
$shortcode_css .= '#'.$apress_id.'.zolo-cd-timeline-block:nth-child(odd) .zolo-cd-timeline-content::before{border-left-color:'.$box_bg_color.';}';

$shortcode_css .= '@media (max-width:1170px) {';
$shortcode_css .= '#'.$apress_id.'.zolo-cd-timeline-block:nth-child(odd) .zolo-cd-timeline-content::before{border-right-color:'.$box_bg_color.';border-left-color:transparent;}';

$shortcode_css .= '}';

if(isset($companyname_responsive) && $companyname_responsive != '') {
	$shortcode_css .= Zolo_Resposive_Text_Param::responsive_css($companyname_responsive, '#' . esc_js($apress_id) . ' .zolo-cd-timeline-content .zolo_vertical_timeline_company_name');
	}


apcore_save_plugin_dyn_styles( $shortcode_css );
	
?>