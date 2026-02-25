<?php 
/*-----------------------------------------------------------------------------------*/
/* Google Map
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

  $api = 'https://maps.googleapis.com/maps/api/js';
  
  global $apress_data;
  $map_key = isset($apress_data["google_api_key"]) ? $apress_data["google_api_key"] : '';

  if($map_key != false) {
	$arr_params = array(
	  'key' => $map_key
	);
	$api = esc_url( add_query_arg( $arr_params, $api ));
  }

  if (isset($apress_data["google_api_key"]) && $apress_data["google_api_key"] != '' ) {
	wp_enqueue_script("googleapis",$api,null,null,false);
  }

// Declare empty vars
$output = $gmap_style_var = $business_data = $content_image = $map_img_array = '';

extract(shortcode_atts(array(
	'map_name' => '',
	'map_latitude' => '',
	'map_longitude' => '',
	'map_zoom' => '',
	'map_style' => '',
	'image_source' => '',
	'map_icon' => '',
	'ext_image' => '',
	'map_height' => '',
	'map_business_panel_settings' => '',
	'map_business_name' => '',
	'map_business_address' => '',
	'map_business_email' => '',
	'map_business_phone' => '',
	'map_business_opening_hours' => '',
	'map_business_schedule' => '',
), $atts));

if ($image_source == 'external_link') {
  $content_image .= $ext_image;
} else {
  $map_img_array = wp_get_attachment_image_src($map_icon, "large");
		$content_image = $map_img_array[0];
}

switch($map_style){
		case 'gmap_style_grayscale':
			$gmap_style_var = 'var featureOpts = [
									{
									  stylers: [
										{ "visibility": "on" },
										{ "weight": 1 },
										{ "saturation": -100 },
										{ "lightness": 2.2 },
										{ "gamma": 2.2 }
									  ]
									}, {
					featureType: "poi",
					stylers: [
					  { visibility: "off" }
					]
				}
								];';
		break;

		case 'gmap_style_normal':
			$gmap_style_var = 'var featureOpts = [
									{
									  stylers: [
										{ "visibility": "on" },
										{ "weight": 1.1 },
										{ "saturation": 1 },
										{ "lightness": 1 },
										{ "gamma": 1 }
									  ]
									}, {
					featureType: "poi",
					stylers: [
					  { visibility: "off" }
					]
				}
								];';
		break;
	}

	$id = "apc".uniqid();

if (isset($apress_data["google_api_key"]) && $apress_data["google_api_key"] != '' ) {
	$output .= '<script>

		function initApcMap_'.$id.'() {
		  var map_'.$id.';
						var gmap_location_'.$id.' = new google.maps.LatLng('.$map_latitude.', '.$map_longitude.');
						var GMAP_MODULE_'.$id.' = "customMap";
						'.$gmap_style_var.'
						var mapOptions = {
							zoom: '.$map_zoom.',
							center: gmap_location_'.$id.',
			scrollwheel: false,
							mapTypeControlOptions: {
								mapTypeIds: [google.maps.MapTypeId.ROADMAP, GMAP_MODULE_'.$id.']
							},
							mapTypeId: GMAP_MODULE_'.$id.'
						};
						map_'.$id.' = new google.maps.Map(document.getElementById("'.$id.'"), mapOptions);
						marker_'.$id.' = new google.maps.Marker({
							map: map_'.$id.',
							draggable: false,
							animation: google.maps.Animation.DROP,
							position: gmap_location_'.$id.',
							icon: "'.$content_image.'"
						  });
						google.maps.event.addListener(marker_'.$id.', "click", function() {
							if (marker_'.$id.'.getAnimation() != null) {
								marker_'.$id.'.setAnimation(null);
							} else {
								marker_'.$id.'.setAnimation(google.maps.Animation.BOUNCE);
							}
						});
						var styledMapOptions = {
							name: "'.$map_name.'"
						};
						var customMapType_'.$id.' = new google.maps.StyledMapType(featureOpts, styledMapOptions);
						map_'.$id.'.mapTypes.set(GMAP_MODULE_'.$id.', customMapType_'.$id.');
		  }
		  jQuery(window).load(function() {
			initApcMap_'.$id.'();
		  });
				</script>';
	  } else {
$output .= '<div class="apc-alertbox apc-contact-alertbox ab_info">
			<div class="ab-message">
			<p>Google maps requires a valid API key in order to work.<br> You can add it in Theme Options > Global Options.<br> You can generate a new API key from https://developers.google.com/maps</p></div>
			</div>';
	  }

$output .= '<div class="contact-map-container '.$map_business_panel_settings.'" '.(!empty($map_height) ? 'style="height: '.$map_height.';"' : '').'>';
	if ($map_business_panel_settings != "hidden_info_panel") {
		$output .= '<div class="business-info-wrapper">
			<div class="business-info-header">';
				if ($map_business_name != '') {
					$output .= '<h4>'.$map_business_name.'</h4>';
				}
				$output .= '<address>';
				  if ($map_business_address != '') {
					  $output .= '<span class="business-address-row"><i class="fa iconsmind-Map-Marker2"></i><span class="address-overflow">'.$map_business_address.'</span></span>';
				  }
				  if ($map_business_phone != '') {
					  $output .= '<span class="business-phone-row"><i class="fa iconsmind-Telephone"></i>'.$map_business_phone.'</span>';
				  }
				  if ($map_business_email != '') {
					  $output .= '<span class="business-email-row"><i class="fa iconsmind-Mail"></i><a href="mailto:'.$map_business_email.'">'.$map_business_email.'</a></span>';
				  }
				$output .= '</address>
			</div>
			<div class="business-info-schedule">
				<h4>'.$map_business_opening_hours.'</h4>';
				$map_business_schedule = json_decode( urldecode( $map_business_schedule ), true );

				if( isset( $map_business_schedule ) ) {
						foreach ( $map_business_schedule as $business_data ){
								$output .= '<div class="business-info-day">';
					  if ( isset( $business_data["map_schedule_day_name"] ) ){
					  $output .= '<span class="business-info-day-name">'.$business_data["map_schedule_day_name"].'</span>';
					  }
					  if ( isset( $business_data["map_schedule_day_hours"] ) ){
					  $output .= '<span class="business-info-day-hours">'.$business_data["map_schedule_day_hours"].'</span>';
					  }
								$output .= '</div>';
						}
					}

			$output .= '</div>
		</div>';
	}
	$output .= '<div id="'.$id.'" class="apc_map" '.(!empty($map_height) ? 'style="height: '.$map_height.';"' : '').'></div>

</div>';

return $output;
