<?php 
/*-----------------------------------------------------------------------------------*/
/* Countdown
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

	extract(shortcode_atts(array(
		'style' 							=>'style1',
		'counter_date' 						=>'',
		'counter_datetime' 					=>'',
		'counter_scope' 					=>'date_only',
		'class' 							=>'',
		'data_animation'					=>'No Animation',
		'data_delay'						=>'500',
	), $atts));
		
		//Animation
		if($data_animation == 'No Animation'){
				$animatedclass = 'noanimation';
			}else{
				$animatedclass = 'animated hiding';
				}
			$data_animation_value = $data_animation;
		
		$uniqid = uniqid(rand());
		$countdown_id = 'zolo_countdown'.$uniqid;
		
		wp_enqueue_style('ts-extend-font-roboto');
				wp_enqueue_style('ts-extend-font-unica');
				wp_enqueue_style('ts-extend-countdown');
				wp_enqueue_script('ts-extend-countdown');
		
		if ((!empty($counter_date))) {
			
		$string_date					= strtotime($counter_date);
		$string_date_day				= date("j", $string_date);
		$string_date_month				= date("n", $string_date);
		$string_date_year				= date("Y", $string_date);
		$string_reset					= "false";
		
		} else if ((!empty($counter_datetime))) {
	
		$string_time					= strtotime($counter_datetime);
		$string_time_hour				= date("G", $string_time);
		$string_time_minute				= date("i", $string_time);
		$string_time_second				= date("s", $string_time);
		$string_repeat					= "false";
		
		}

		
		
		
		
		
		
		
		echo $string_date_day;
		
		
		//$countdown_data_date				= 'data-day="' . $string_date_day . '" data-month="' . $string_date_month . '" data-year="' . $string_date_year . '"';
				
		//$countdown_data_time				= 'data-hour="' . $string_time_hour . '" data-minute="' . $string_time_minute . '" data-second="' . $string_time_second . '"';
		

$output .= '<div id="' . $countdown_id . '" data-reset="' . $string_reset . '" data-resetrestart="' . $reset_restart . '" ' . $countdown_data_main . ' ' . $countdown_data_reset . ' ' . $countdown_data_date . ' ' . $countdown_data_time . ' ' . $countdown_data_color . ' ' . $countdown_data_strings . ' class="ts-countdown-parent style-0 ' . $el_class . ' ' . $css_class . '">';
	
	
	
	$output .= '<div id="' . $countdown_id . '_countdown" class="ts-countdown">';

			$output .= '<span class="ce-days"></span> <span class="ce-days-label"></span> ';

			$output .= '<span class="ce-hours"></span> <span class="ce-hours-label"></span> ';

			$output .= '<span class="ce-minutes"></span> <span class="ce-minutes-label"></span> ';

			$output .= '<span class="ce-seconds"></span> <span class="ce-seconds-label"></span>';

	$output .= '</div>';

$output .= '</div>';

		
		
echo $output;		
		
		
		
		
		
		
		
		
		?>
		
		
		
		

<?php
$style = '';
$style .= '.zolo_alternate_image_wrap{ width:100%; float:left; text-align:center; line-height:0;}';
apcore_save_plugin_dyn_styles( $style );

			
